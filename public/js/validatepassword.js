var myInput = document.getElementById("passw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
function show_message() {
  document.getElementById("message").style.display = "block";
};

// When the user clicks outside of the password field, hide the message box
  function hide_message() {
  document.getElementById("message").style.display = "none";
};

// When the user starts to type something inside the password field
function validate_password() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if (myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("password_invalid");
    letter.classList.add("password_valid");
  } else {
    letter.classList.remove("password_valid");
    letter.classList.add("password_invalid");
  }

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if (myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("password_invalid");
    capital.classList.add("password_valid");
  } else {
    capital.classList.remove("password_valid");
    capital.classList.add("password_invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if (myInput.value.match(numbers)) {
    number.classList.remove("password_invalid");
    number.classList.add("password_valid");
  } else {
    number.classList.remove("password_valid");
    number.classList.add("password_invalid");
  }

  // Validate length
  if (myInput.value.length >= 8 && myInput.value.length <= 20) {
    length.classList.remove("password_invalid");
    length.classList.add("password_valid");
  } else {
    length.classList.remove("password_valid");
    length.classList.add("password_nvalid");
  }
};