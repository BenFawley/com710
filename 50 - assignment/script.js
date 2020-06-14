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

// logout button functionality
document.getElementById("logoutButton").onclick = function(){

    var logout = new FormData();

    logout.append("action", "logout" );

    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e => {
        alert(e.target.responseText);
        // document.getElementById("loginOrOut").innerHTML = "\
        //     <ul class = 'nav navbar-nav'>\
        //         <li class='nav-item'>\
        //             <a href='join.php' class='nav-link'><span class='fas fa-user-plus'></span> Sign Up</a>\
        //         </li>\
        //         <li class='nav-item'>\
        //             <a href='#' data-toggle='modal' id='modalOpenButton' class='nav-link'><span class='fas fa-sign-in-alt'></span> Login</a>\
        //         </li>\
        //     </ul>";

        location.reload();
    });

    xhttp.open("POST", "logout.php", true);
    xhttp.send(logout);
}

//Submitting sign up form
const sign_up_form = document.getElementById("sign_up_form");
if (sign_up_form){
    sign_up_form.addEventListener("submit", addSignUpForm);
}

function addSignUpForm(e){
    e.preventDefault();

    var data = new FormData();
    data.append("username",document.getElementById("username").value);
    data.append("pswd",document.getElementById("pswd").value);
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
document.getElementById("loginForm").addEventListener("submit", login);

function login(e){
    e.preventDefault();
    var data = new FormData();
    
    let loginForm = document.getElementById("loginForm");
    data.append("username", loginForm.uName.value); 
    data.append("password", loginForm.pass.value);
    
    data.append("action", "login");

    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e => {
        if (e.target.status == 200){
            // document.getElementById("loginOrOut").innerHTML = "<button id='logoutButton' class='btn btn-primary' type='submit' name='logout'>Logout</button>";
            // alert(e.target.responseText);
            logInModal.style.display = "none";

            location.reload();
        }
    });


    xhttp.open("POST", "login.php", true);
    xhttp.send(data);
    
    
}




// Retrieve user AJAX

document.getElementById("loadUser").onclick = function (e){
    e.preventDefault();

    var loadData = new FormData();

    
    loadData.append("action", "retrieve");

    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e =>{
        if (e.target.status == 200){
            document.getElementById("userDetails").innerHTML = e.target.responseText; 
        }
    });
xhttp.open("POST", "users.php", true);
xhttp.send(loadData);


};









    


