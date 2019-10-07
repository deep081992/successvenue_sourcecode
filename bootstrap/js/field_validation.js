


var validating = false; //<-- IMPORTANT

function rfiel(enteredValue)
{
  
  if(enteredValue.value=='')
  {
  	if(validating==false)
  	{
  		validating=true;
    	alert("Field Required");
    	setTimeout(function()
   		 {
      		document.getElementById(enteredValue.id).focus();
    	 }, 3);
    }
  }
 }