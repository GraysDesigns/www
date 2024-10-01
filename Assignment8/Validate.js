//validate.js
function validate(form)
{
  fail = "";
  fail  = validate_NoMoreThan9CreditHours();
  fail += validate_NotPreviouslyRegistered();

  if (fail == "")
    return true;
  else 
  { 
    alert("Client-side Validation Errors = \n" + fail); 
    return false;
  }
}

function validate_NoMoreThan9CreditHours()
{
  var currentCreditHours = parseInt(document.getElementById("currentCreditHoursElementID").innerText, 10);
  console.log("currentCreditHours = " + currentCreditHours);
  if (currentCreditHours > 8) {
    return "You cannot register for more than 9 credit hours per term";
  }
  else return "";
}

function validate_NotPreviouslyRegistered()
{
  var registeredCourses = document.getElementById("currentCoursesElementID").innerText.split("<br>");
  var selectedCourse = document.getElementById("selectCourseElementID").value;

  for (var i = 0; i < registeredCourses.length; i++) {
    if (registeredCourses[i].trim().startsWith(selectedCourse)) {
      return "You have already registered for " + selectedCourse;
    }
  }
  return "";
}