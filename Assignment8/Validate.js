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
  return "";
}

function validate_NotPreviouslyRegistered()
{
  return "";
}