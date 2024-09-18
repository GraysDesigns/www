<?php
require_once 'login.php';
require_once 'Course.php';
require_once 'Validate.php';

try
{
  $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e)
{
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// this if statement is executed only if the user selected a course before submitting
if (isset($_POST['selectCourseElementName'])) 
{

  $fail ="";
  $selectCourseElementName = fix_string($_POST['selectCourseElementName']);
  //echo $selectCourseElementName . "<br>";

  $query  = "SELECT * FROM w8_avail_Reg_Courses;";
  $result = $pdo->query($query);

  $avail_Reg_Courses = array();
  $i = 0;
  while ($row = $result->fetch())
  {
    $avail_Reg_Courses[$i] = 
    new Course($row['code'], $row['title'], $row['creditHours'], $row['registered']);
    $i++;
  }

  $fail  = validate_NoMoreThan9CreditHours($avail_Reg_Courses);

  $fail  .= validate_NotPreviouslyRegistered($avail_Reg_Courses, $selectCourseElementName);

  //if validation is OK, set registered to true (course is registered for)
  if ($fail == "") 
  {
    $query  = "UPDATE w8_avail_Reg_Courses SET registered = TRUE WHERE code = '$selectCourseElementName';";
    $result = $pdo->query($query);

  } 
  else
  {
    echo "<span style='color:red'>Server-side Validation Errors = <br>$fail</span><br>";
  }
}

// This code is executed every time this php file is requested
// get a fresh list of available courses and a fresh list of registered courses
$query  = "SELECT * FROM w8_avail_Reg_Courses;";
$result = $pdo->query($query);

$avail_Reg_Courses = array();
$i = 0;
while ($row = $result->fetch())
{
$avail_Reg_Courses[$i] = 
new Course($row['code'], $row['title'], $row['creditHours'], $row['registered']);
$i++;
}

echo <<<_END

<!-- The HTML/JavaScript section -->

<script src="Validate.js">

</script>
</head>
<body>
    <h2>Register for Next Term Courses Form</h2>
    <p></p>
    <p>
    Select a course from these available courses for registration:
    </p>
    <form method="post" action="Register-for-Courses.php" 
      onSubmit="return validate(this)">
    <select id="selectCourseElementID" name="selectCourseElementName" size="5">
_END;

$currentRegisterdCourses = "";
$currentCreditHours = 0;
foreach ($avail_Reg_Courses as $course) 
{
    $code = $course->getCode();
    $title = $course->getTitle();
    $creditHours = $course->getCreditHours();
    $registered = $course->getRegistered();

    echo "<option value='$code'>$code $title</option>";

    if($registered == true) 
    {
    $currentRegisterdCourses = $currentRegisterdCourses . $code . " " . $title . "<br>";
    $currentCreditHours = $currentCreditHours + $creditHours;
    }

}

echo <<<_END
    </select>
        <p></p>
        <p></p>
        <td><input style='background-color:orange; border-radius: 8px; width:430; height: 70; border:0;' type="submit"
        value="                          Register for the Selected Course                          "></td></tr>
    </form>
    <p></p>
    These are the course you registered for thus far:
        <table>
        <tr style='background-color:yellow;' id="currentCoursesElementID">
          <td>
          $currentRegisterdCourses
          </td>
        </tr>
        </table>
        <p></p>
        Total credit hours thus far:<br>
        <span style='background-color:yellow;'id="currentCreditHoursElementID">$currentCreditHours</span>
    </table>
</body>
</html>

_END;


function fix_string($string)
{
  if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities ($string);
}

?>