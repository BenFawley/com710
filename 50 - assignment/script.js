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







    


