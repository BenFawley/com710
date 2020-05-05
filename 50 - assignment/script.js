// Get the modal
var logInModal = document.getElementById("logInModal");

// Get the button that opens the modal
var logInBtn = document.getElementById("modalOpenButton");

//Get sign up modal
var signUpModal = document.getElementById("signUpModal");

//Get the button that opens modal
var signUpBtn = document.getElementById("modalSignInButton");

//Displays the modal when clicked
logInBtn.onclick = function(){
    logInModal.style.display ="block";
}

//Closes modal when x is clicked
document.getElementById("closeButton").onclick = function(){
    logInModal.style.display ="none";
}

//display sign up modal
signUpBtn.onclick = function(){
    signUpBtn.style.display="block";
}

//Submitting sign up form
document.getElementById("sign_up_form").addEventListener("submit", addSignUpForm);

function addSignUpForm(){
    var username = document.getElementById("username").Value;
    var password = document.getElementById("pswd").Value;
    var first_name = document.getElementById("fName").Value;
    var last_name = document.getElementById("lName").Value;
    var email = document.getElementById("email").Value;
    var age = document.getElementById("age").Value;
    var gender = document.getElementById("gender").Value;
    var street_address = document.getElementById("streetAddress").Value;
    var city = document.getElementById("city").Value;
    var postcode = document.getElementById("postcode").Value;
    var county = document.getElementById("county").Value;

    Xhttp.open("POST", "assignment/users.php", true);
    xhttp.setRequestHeader("")
    xhttp.send()
}








    


