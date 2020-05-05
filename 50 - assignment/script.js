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

    var data = new FormData();
    data.append("username",document.getElementById("username").Value);
    data.append("password",document.getElementById("pswd").Value);
    data.append("first_name",document.getElementById("fName").Value);
    data.append("last_name",document.getElementById("lName").Value);
    data.append("email",document.getElementById("email").Value);
    data.append("age",document.getElementById("age").Value);
    data.append("gender",document.getElementById("gender").Value);
    data.append("street_address",document.getElementById("streetAddress").Value);
    data.append("city",document.getElementById("city").Value);
    data.append("postcode",document.getElementById("postcode").Value);
    data.append("county",document.getElementById("county").Value);

    data.append("action", "create");

    var xhttp = new XMLHttpRequest();
    xhhtp.addEventListener("load", e => {
        //first check response status is 200 (200 = ok)
        //then display error/success message
    });

    Xhttp.open("POST", "assignment/user.php", true);
    xhttp.send(data)
}
//-----------------
document.getElementById('loadData').onclick = function () {
    
    var data = new FormData();
    data.append("name", "Prins");

    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e => {
        document.getElementById("content").innerHTML = e.target.responseText;
        document.getElementById("status").innerHTML = e.target.status;
    });
    xhttp.open("POST", "process.php");
    xhttp.send(data);
};







    


