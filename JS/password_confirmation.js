//Confirming password creation

//retrieving the password from the registration form and assigning it to the variable password 

var password = document.getElementById("password")
  , confirm_pword = document.getElementById("confirm");

//Password confirmation function
function ConfirmPassword(){
  if(password.value != confirm_pword.value) {
    confirm_pword.setCustomValidity("Passwords do not match");
  } else {
    confirm_pword.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_pword

// Confirming password creation

// Retrieving the password from the registration form and assigning it to the variable 'password'
var password = document.getElementById("password");
// Retrieving the confirmation password from the registration form and assigning it to the variable 'confirm_pword'
var confirm_pword = document.getElementById("confirm");

// Password confirmation function
function ConfirmPassword() {
  // Check if the entered password and the confirmed password match.
  if (password.value != confirm_pword.value) {
    // If they don't match, set a custom validation message.
    confirm_pword.setCustomValidity("Passwords do not match");
  } else {
    // If they match, clear any custom validation message.
    confirm_pword.setCustomValidity('');
  }
}

// Attach the 'ConfirmPassword' function to the 'onchange' event of the 'password' input.
password.onchange = ConfirmPassword;
// The 'confirm_pword' input should automatically check for matching passwords because it's associated with 'password' through this function.
