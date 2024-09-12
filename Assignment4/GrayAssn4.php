<?php 
require_once 'login.php';

try
{
    //initialize a PDO connecting to mysql without specifying a database 
    $pdo = new PDO("mysql:host=$host;charset=$chrs", $user, $pass, $opts);

    $pdo -> exec("CREATE DATABASE IF NOT EXISTS $data");

    //reconnect to PDO using the new database
    $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e)
{
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$query = "
    CREATE TABLE IF NOT EXISTS mycourses (
        courseCode varchar(10) NOT NULL default '',
        courseTitle varchar(128) DEFAULT NULL,
        creditHours int DEFAULT 3,
        PRIMARY KEY (courseCode),
        KEY courseTitle (courseTitle(20))
    ) ENGINE InnoDB DEFAULT CHARSET=latin1;";

$result = $pdo->query($query);

if (isset($_POST['courseCode']) &&
    isset($_POST['courseTitle']) &&
    isset($_POST['creditHours']))
    {
        $courseCode  = get_post($pdo, 'courseCode');
        $courseTitle = get_post($pdo, 'courseTitle');
        $creditHours = get_post($pdo, 'creditHours');

        $query    = "INSERT INTO mycourses VALUES" . "($courseCode, $courseTitle, $creditHours)";
        $result = $pdo->query($query);
    }

echo <<<_END
    <form action="GrayAssn4.php" method="post">
        <pre>
            Course Code     <input type="text" name="courseCode">
            Course Title    <input type="text" name="courseTitle">
            Credit Hours    <input type="text" name="creditHours">
                            <input type="submit" value="ADD RECORD">
        </pre>
    </form>
_END;

$query = "SELECT * FROM mycourses";
$result = $pdo->query($query);

while ($row = $result->fetch(PDO::FETCH_OBJ))
{
    $r0 = htmlspecialchars($row->courseCode);
    $r1 = htmlspecialchars($row->courseTitle);
    $r2 = htmlspecialchars($row->creditHours);

    echo <<<_END
    <pre>
        Course Code     $r0
        Course Title    $r1
        Credit Hours    $r2
    _END;
}

function get_post($pdo, $var)
{
    return $pdo->quote($_POST[$var]);
}

?>