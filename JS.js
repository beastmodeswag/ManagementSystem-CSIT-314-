const loginForm = document.getElementById("login-form");
const logoutForm = document.getElementById("logout-form");
const loginButton = document.getElementById("login-form-submit");
const loginErrorMsg = document.getElementById("login-error-msg");
const logoutButton = document.getElementById('.form-logout');

// When the login button is clicked, the following code is executed
loginButton.addEventListener("click", (e) => {
    // Prevent the default submission of the form
    e.preventDefault();
    // Get the values input by the user in the form fields
    const username = loginForm.username.value;
    const password = loginForm.password.value;

    if (username === "admin" && password === "admin") {
        // If the credentials are valid, load the system admin page
		window.location.href = "System Admin.html";
	
	}else if (username === "conferencechair" && password === "conferencechair") {
        // If the credentials are valid, load the conference chair page
		window.location.href = "conference chair.html";
		
	}else if (username === "reviewer" && password === "reviewer") {
        // If the credentials are valid, load the reviewer page
		window.location.href = "reviewer.html";
		
	}else if (username === "author" && password === "author") {
        // If the credentials are valid, load the author page
		window.location.href = "author.html";
		
	} else {
        // Otherwise, make the login error message show (change its oppacity)
        loginErrorMsg.style.opacity = 1;
    }
	    
})

var myselect = document.getElementById('sl');

function createOption() {
    var currentText = document.getElementById('username-field').value;
    var objOption = document.createElement("option");
    objOption.text = currentText;
    objOption.value = currentText;

    //myselect.add(objOption);
    myselect.options.add(objOption);
}

document.getElementById('login-form-submit').onclick = createOption;

myselect.onchange = function() {
    var mytextfield1 = document.getElementById('username-field');
    if (myselect.value == 'none'){
        mytextfield1.value = '';
        mytextfield1.disabled = true;
    }else {
        mytextfield1.value = myselect.value;
        mytextfield1.disabled = false;
    }
	
	var mytextfield2 = document.getElementById('password-field');
    if (myselect.value == 'none'){
        mytextfield2.value = '';
        mytextfield2.disabled = true;
    }else {
        mytextfield2.value = myselect.value;
        mytextfield2.disabled = false;
    }
}