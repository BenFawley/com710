// Get the modal
var logInModal = document.getElementById("logInModal");

// Get the button that opens the modal
var logInBtn = document.getElementById("modalOpenButton");

//Get sign up modal
var signUpModal = document.getElementById("signUpModal");

//Displays the modal when clicked
logInBtn.onclick = function(){
    logInModal.style.display ="block";
}

//Closes modal when x is clicked
document.getElementById("closeButton").onclick = function(){
    logInModal.style.display ="none";
}

//Submitting sign up form
document.getElementById("sign_up_form").addEventListener("submit", addSignUpForm);

function addSignUpForm(e){
    e.preventDefault();

    var data = new FormData();
    data.append("username",document.getElementById("username").value);
    data.append("password",document.getElementById("pswd").value);
    data.append("first_name",document.getElementById("fName").value);
    data.append("last_name",document.getElementById("lName").value);
    data.append("email",document.getElementById("email").value);
    data.append("age",document.getElementById("age").value);
    data.append("gender",document.getElementById("gender").value);
    data.append("street_address",document.getElementById("streetAddress").value);
    data.append("city",document.getElementById("city").value);
    data.append("postcode",document.getElementById("postcode").value);
    data.append("county",document.getElementById("county").value);

    data.append("action", "create");

    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e => {
        alert(e.target.responseText);
        //first check response status is 200 (200 = ok)
        //then display error/success message
    });

    xhttp.open("POST", "users.php", true);
    xhttp.send(data);
}


// Login Request
// document.getElementById("loginForm").addEventListener("submit", login);

// function login(){
//     e.preventDefault();

//     var loginData = new FormData();
    
//     loginData.append("username", document.getElementById("uName").value);
//     loginData.append("password", document.getElementById("pass").value);
    
//     loginData.append("action", "login");

//     var xhttp = new XMLHttpRequest();
//     xhttp.addEventListener("load", e => {
//         alert(e.target.responseText);
//     });

//     xhttp.open("POST", "login.php", true);
//     xhttp.send(loginData);
    
//}







    


