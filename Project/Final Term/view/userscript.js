function validateLoginForm() 
{
    var userid = document.getElementById("userid").value;
    var password = document.getElementById("password").value;
    var noFormErr = true;
    if (userid=="") 
    {
        document.getElementById("useridErr").innerHTML = "Enter User ID";
        noFormErr = false;
    }
    if (password=="") 
    {
        document.getElementById("passwordErr").innerHTML = "Enter Password";
        noFormErr = false;
    }
    return noFormErr;
}
function validateRegistrationForm() 
{
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var contact = document.getElementById("contact").value;
    var address = document.getElementById("address").value;
    var userid = document.getElementById("userid").value;
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;
    var noFormErr = true;
    if (name=="") 
    {
        document.getElementById("nameErr").innerHTML = "Enter User name";
        noFormErr = false;
    }
    if (email=="") 
    {
        document.getElementById("emailErr").innerHTML = "Enter User email";
        noFormErr = false;
    }
    if (contact=="") 
    {
        document.getElementById("contactErr").innerHTML = "Enter User contact";
        noFormErr = false;
    }
    if (address=="") 
    {
        document.getElementById("addressErr").innerHTML = "Enter User address";
        noFormErr = false;
    }
    if (userid=="") 
    {
        document.getElementById("useridErr").innerHTML = "Enter User ID";
        noFormErr = false;
    }
    if (password=="") 
    {
        document.getElementById("passwordErr").innerHTML = "Choose password";
        noFormErr = false;
    }
    if (cpassword=="") 
    {
        document.getElementById("cpasswordErr").innerHTML = "Confirm password";
        noFormErr = false;
    }
    return noFormErr;
}