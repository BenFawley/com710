// Get the modal
var logInModal = document.getElementById("logInModal");

// Get the button that opens the modal
var logInBtn = document.getElementById("modalOpenButton");

//Get sign up modal
var signUpModal = document.getElementById("signUpModal");


//Displays the modal when clicked
logInBtn.onclick = function () {
    logInModal.style.display = "block";
}

//Closes modal when x is clicked
document.getElementById("closeButton").onclick = function () {
    logInModal.style.display = "none";
}

// function validateSignUpForm(){
//     const un = document.getElementById("username").value;
//     if (un.value == null || un.value == ""){
//         un.classlist.add("red");
//         return false;
//     }
//     const pw = document.getElementById("pswd").value;
//     const fn = document.getElementById("fName").value;
//     const ln = document.getElementById("lName").value;
//     const mail = document.getElementById("email").value;
//     const age = document.getElementById("age").value;
//     const gen = document.getElementById("gender").value;
//     const address = document.getElementById("streetAddress").value;
//     const city = document.getElementById("city").value;
//     const pc = document.getElementById("postcode").value;
//     const county = document.getElementById("county").value;

    
// }

// logout button functionality
document.getElementById("logoutButton").onclick = function () {

    var logout = new FormData();

    logout.append("action", "logout");

    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e => {
        alert(e.target.responseText);

        location.reload();
    });

    xhttp.open("POST", "logout.php", true);
    xhttp.send(logout);
}

//Submitting sign up form
const sign_up_form = document.getElementById("sign_up_form");
if (sign_up_form) {
    sign_up_form.addEventListener("submit", addSignUpForm);
}

function addSignUpForm(e) {
    e.preventDefault();

    var data = new FormData();
    data.append("username", document.getElementById("username").value);
    data.append("pswd", document.getElementById("pswd").value);
    data.append("first_name", document.getElementById("fName").value);
    data.append("last_name", document.getElementById("lName").value);
    data.append("email", document.getElementById("email").value);
    data.append("age", document.getElementById("age").value);
    data.append("gender", document.getElementById("gender").value);
    data.append("street_address", document.getElementById("streetAddress").value);
    data.append("city", document.getElementById("city").value);
    data.append("postcode", document.getElementById("postcode").value);
    data.append("county", document.getElementById("county").value);

    data.append("action", "create");

    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e => {
        alert(e.target.responseText);
        if (e.target.status == 200) {
            sign_up_form.reset();
        }
    });

    xhttp.open("POST", "users.php", true);
    xhttp.send(data);
}


// Login Request
document.getElementById("loginForm").addEventListener("submit", login);

function login(e) {
    e.preventDefault();
    var data = new FormData();

    let loginForm = document.getElementById("loginForm");
    data.append("username", loginForm.uName.value);
    data.append("password", loginForm.pass.value);

    data.append("action", "login");

    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e => {
        if (e.target.status == 200) {
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
if (document.getElementById("loadUser") != null) {
    document.getElementById("loadUser").onclick = function (e) {
        e.preventDefault();

        var loadData = new FormData();

        loadData.append("action", "retrieve");

        var xhttp = new XMLHttpRequest();
        xhttp.addEventListener("load", e => {
            if (e.target.status == 200) {
                document.getElementById("userDetails").innerHTML = e.target.responseText;
                document.getElementById("loadUser").style.display = "none";
                document.getElementById("updateUser").style.display = "block";
                document.getElementById("deleteUser").style.display = "block";
            }
        });
        xhttp.open("POST", "users.php", true);
        xhttp.send(loadData);


    };
}

//Update User 

// const updateDetailsForm = document.getElementById("updateDetailsForm");
// if (updateDetailsForm) {
//     updateDetailsForm.addEventListener("submit", updateUser);
// }

if(document.getElementById("updateDetailsForm") != null){
    document.getElementById("updateDetailsForm").addEventListener("submit", updateUser);
}

function updateUser(e) {
    e.preventDefault();

    var data = new FormData();

    data.append("first_name", document.getElementById("uFName").value);
    data.append("last_name", document.getElementById("uLName").value);
    data.append("email", document.getElementById("uEmail").value);
    data.append("age", document.getElementById("uAge").value);
    data.append("gender", document.getElementById("uGender").value);
    data.append("street_address", document.getElementById("uStreetAddress").value);
    data.append("city", document.getElementById("uCity").value);
    data.append("postcode", document.getElementById("uPostcode").value);
    data.append("county", document.getElementById("uCounty").value);

    data.append("action", "update");

    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e => {
        if (e.target.status == 200) {
            alert(e.target.responseText);
            window.location.replace("profile.php");
        }
    });

    xhttp.open("POST", "users.php", true);
    xhttp.send(data);
}

// delete profile confirmation box
if (document.getElementById("deleteUser") != null) {
    document.getElementById("deleteUser").onclick = function (e) {
        e.preventDefault();

        var confirmDelete = confirm("Are you sure you want to delete your profile?");
        if (confirmDelete == true) {
            var deleteUser = new FormData();

            deleteUser.append("action", "delete");

            var xhttp = new XMLHttpRequest();
            xhttp.addEventListener("load", e => {
                if (e.target.status == 200) {
                    alert(e.target.responseText);
                    window.location.replace("index.php");
                }
            });
            xhttp.open("POST", "users.php", true);
            xhttp.send(deleteUser);


        };
    }

}

















