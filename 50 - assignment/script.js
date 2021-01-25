// Get the modal
const logInModal = document.getElementById("logInModal");

// Get the button that opens the modal
const logInBtn = document.getElementById("modalOpenButton");

//Get sign up modal
const signUpModal = document.getElementById("signUpModal");

const username = document.getElementById("username");
const password = document.getElementById("pswd");
const sign_up_form = document.getElementById("sign_up_form");
const firstName = document.getElementById("fName");
const lastName = document.getElementById("lName");
const email = document.getElementById("email");
const age = document.getElementById("age");
const gender = document.getElementById("gender");
const address = document.getElementById("streetAddress");
const city = document.getElementById("city");
const pc = document.getElementById("postcode");
const county = document.getElementById("county");
const update_details_form = document.getElementById("updateDetailsForm");


//Displays the modal when clicked
logInBtn.onclick = () => {
    logInModal.style.display = "block";
}

//Closes modal when x is clicked
document.getElementById("closeButton").onclick = function () {
    logInModal.style.display = "none";
}

// -------- Form Validation ---------



function validateSignUpForm(e) {
    const usernameValue = username.value;
    const passwordValue = password.value;
    const firstNameValue = firstName.value;
    const lastNameValue = lastName.value;
    const emailValue = email.value;
    const ageValue = age.value;
    const genderValue = gender.value;
    const addressValue = address.value;
    const cityValue = city.value;
    const postcodeValue = pc.value;
    const countyValue = county.value;


    if (usernameValue == "") {
        setErrorMessageFor(username, "Username cannot be blank");
    } else {
        setSuccessMessageFor(username);
    }

    if (passwordValue == "") {
        setErrorMessageFor(password, "Password cannot be blank");
    } else {
        setSuccessMessageFor(password);
    }

    if (firstNameValue == "") {
        setErrorMessageFor(firstName, "First name cannot be blank");
    } else {
        setSuccessMessageFor(firstName);
    }

    if (lastNameValue == "") {
        setErrorMessageFor(lastName, "Last name cannot be blank");
    } else {
        setSuccessMessageFor(lastName);
    }

    if (emailValue == "") {
        setErrorMessageFor(email, "Email cannot be blank");
    } else {
        setSuccessMessageFor(email);
    }

    if (ageValue == "") {
        setErrorMessageFor(age, "Age cannot be blank");
    } else {
        setSuccessMessageFor(age);
    }

    if (genderValue == "") {
        setErrorMessageFor(gender, "Gender cannot be blank");
    } else {
        setSuccessMessageFor(gender);
    }

    if (addressValue == "") {
        setErrorMessageFor(address, "Address cannot be blank");
    } else {
        setSuccessMessageFor(address);
    }

    if (cityValue == "") {
        setErrorMessageFor(city, "City cannot be blank");
    } else {
        setSuccessMessageFor(city);
    }

    if (postcodeValue == "") {
        setErrorMessageFor(pc, "Postcode cannot be blank");
    } else {
        setSuccessMessageFor(pc);
    }

    if (countyValue == "") {
        setErrorMessageFor(county, "County cannot be blank");
    } else {
        setSuccessMessageFor(county);
    }

    if (usernameValue == "" || passwordValue == "" || firstNameValue == "" || lastNameValue == "" || emailValue == "" || ageValue == "" || genderValue == "" || addressValue == "" || cityValue == "" || postcodeValue == "" || countyValue == "") {
        alert("Please fill in all of the fields");
        return false;
    } else {
        return true;
    }

}

if (sign_up_form) {
    sign_up_form.addEventListener("submit", (e) => {
        e.preventDefault();
        if (validateSignUpForm(e)){
            addSignUpForm(e);
        }
    });
}


function setErrorMessageFor(input, message) {
    const formInput = input.parentElement;
    const small = formInput.querySelector("small");

    small.innerText = message;

    formInput.className = "formInput error";
}

function setSuccessMessageFor(input) {
    const formInput = input.parentElement;
    formInput.className = "formInput success";
}

//  -----------------------------




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

function addSignUpForm(e) {
    e.preventDefault();

    var data = new FormData();
    data.append("username", username.value);
    data.append("pswd", password.value);
    data.append("first_name", firstName.value);
    data.append("last_name", lastName.value);
    data.append("email", email.value);
    data.append("age", age.value);
    data.append("gender", gender.value);
    data.append("street_address", address.value);
    data.append("city", city.value);
    data.append("postcode", pc.value);
    data.append("county", county.value);

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
            logInModal.style.display = "none";
            location.reload();
        }
    });
    xhttp.open("POST", "login.php", true);
    xhttp.send(data);
}


function loadUser(){

    let action = new FormData();
    action.append("action", "retrieve");

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("userDetails").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "users.php", true);
    xhttp.send(action);
    console.log(action);
  }

  // UPDATE USER

// if (document.getElementById("updateDetailsForm") != null) {
//     document.getElementById("updateDetailsForm").addEventListener("submit", updateUser);
// }

if (update_details_form){
    update_details_form.addEventListener("submit", (e) => {
        e.preventDefault();
        if (validateSignUpForm(e)){
            updateUser(e);
        }
    });
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

//Google Maps API

let map;

let markers = [
    {
        LatLng: { lat: 50.9020220, lng: -1.4046430 },
        content: "<p>Solent Fitness, 176-178 High St, SO14 2BY</p>"
    },
    {
        LatLng: { lat: 50.9193, lng: -1.4309 },
        content: "<p>Solent Fitness, 366-368 Shirley Rd, SO15 3HY </p>"
    },
    {
        LatLng: { lat: 50.9066, lng: -1.3390 },
        content: "<p>Solent Fitness, Antelope Park, Bursledon Rd, SO19 8NE </p>"
    },
];

function initMap() {

    //creating map
    let center = new google.maps.LatLng(50.9097, -1.4044);
    map = new google.maps.Map(document.getElementById("map"), {
        center: center,
        zoom: 11,
    });

    for (let i = 0; i < markers.length; i++){
        addMarker(markers[i]);
    }
}

//adding markers
function addMarker(properties) {
    let marker = new google.maps.Marker({
        position: properties.LatLng,
        map: map
    });

    if (properties.content) {
        let infoWindow = new google.maps.InfoWindow({
            content: properties.content,
        });

        marker.addListener('click', () => {
            infoWindow.open(map, marker);
        })
    }
}


















