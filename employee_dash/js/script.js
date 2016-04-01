script.js

function checkForm()
{
//fetching values from all input fields and storing them in variables
    var employeeid = document.getElementById("employeeid").value;
    var currentdate = document.getElementById("cdate").value;
    var createdon = document.getElementById("con").value;
    var updatedon = document.getElementById("uon").value;    
    
//Check input Fields Should not be blanks.
    if (employeeid == '' || currentdate == '' || createdon == '' || updatedon == '') 
    {
        alert("Fill All Fields");

    }

    else
    {
    
    //Notifying error fields
    var employeeid = document.getElementById("employeeid");
    var currentdate = document.getElementById("cdate");
    var createdon = document.getElementById("con");
    var updatedon = document.getElementById("uon");
    
    //Check All Values/Informations Filled by User are Valid Or Not.If All Fields Are invalid Then Generate alert.
        if (employeeid < 7 || currentdate =='' || createdon == '') 
        {
            alert("Fill Valid Information");
            return false;
        }
        else 
        {
        //Submit Form When All values are valid.
            document.getElementById("contact-form").submit();
        }
    }
}