// Validation for registarion form!
function reg() {
    let username = document.getElementById('username').value;
    let fname = document.getElementById('fname').value;
    let lname = document.getElementById('lname').value;
    let password = document.getElementById('password').value;
    let file = document.getElementById('file').files.length > 0;
    
    if (username == "" || password == "" || fname == "" || lname == "") {
        alert("Fill in all the inputs!");
        return false;
    } else if (password.length < 6) {
        alert("Password must be more than 6 letters and/or numbers!");
        return false;
    } else if (fname.length == 0 || lname.length == 0) {
        alert("Incorrect first name or last name, make sure to fill in the blanks!");
        return false;
    } else if (!file) {
        alert("Choose an image for your profile!");
        return false;
    } else {
        return true;
    }
}

// Validation for log in form!
function log() {
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    if (username == "" || password == "") {
        alert("Fill in all the inputs!");
        return false;
    } else {
        return true;
    }
}

// Validation for blog in form!
function blog() {
    let title = document.getElementById('title').value;
    let desc = document.getElementById('desc').value;

    if (title == "") {
        alert("Choose a title!");
        return false;
    } else if (desc == "") {
        alert("Choose a description!");
        return false;
    } else {
        return true;
    }
}

// Edit profile
function edit() {
    let editUsername = document.getElementById('username').value;
    let editImg = document.getElementById('file').files.length > 0;

    if (editUsername == "" && !editImg) {
        alert("You have not made any chnages!");
        return false;
    } else {
        return true;
    }
}