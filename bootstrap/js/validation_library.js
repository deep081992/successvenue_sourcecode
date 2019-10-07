function Validate(element)
{
	var id = element.id;
	let letters= /^[A-Za-z]+$/;

	var errors = {
    lname : 'Enter appropriate Lastname'
   };
if (document.getElementById(id).value === '') 
{
    if (id in errors) 
    {
            if(validating == false)
             {
                 validating = true
           		 alert(errors[id]);
           		 setTimeout(function(){
                document.getElementById(id).focus();
                validating = false;
            }, 1);
            }
    }
}

} 



function required_field(enteredValue)
{
  
  if(enteredValue.value=='')
  {
    alert("Required");
    setTimeout(function()
    {
      document.getElementById(enteredValue.id).focus();
    }, 3);
  }
  else
  {
    let letters= /^[A-Za-z]+$/;
    if(!enteredValue.value.match(letters))
    {

      alert("Please enter valid characters");
      setTimeout(function()
      {
        document.getElementById(enteredValue.id).focus();
      }, 1);
    }
    else
    {
      if(enteredValue.value.length>=15)
      {
        alert("Please enter less than 15 Characters");
        setTimeout(function()
        {
          document.getElementById(enteredValue.id).focus();
        }, 1);
      }
    }
  } 
}