function ValidateEmail(inputText) {
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (inputText.value.match(mailformat)) {
        alert("Valid email address!");
        document.email.text1.focus();
        return true;
    } else {
        alert("You have entered an invalid email address!");
        document.email.text1.focus();
        return false;
    }
}