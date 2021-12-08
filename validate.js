const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');

form.addEventListener('submit', e => {
    const unameVal = username.value.trim();
    const emailVal = email.value.trim();
    const pwVal = password.value.trim();
    const cpwVal = cpassword.value.trim();

    var counter = 0;
    if (unameVal === '') {
        error(username, 'Username cannot be blank');
    } else if (!valUname(unameVal)) {
        error(username, 'Length: 6-16 (no special characters except _)')
    } else {
        success(username);
        counter++;
    }

    if (emailVal === '') {
        error(email, 'Email cannot be blank');
    } else if (!validEmail(emailVal)) {
        error(email, 'Please enter a valid email address')
    } else{
        success(email);
        counter++;
    }

    if (pwVal === '') {
        error(password, 'Password cannot be blank');
    } else if (!validPw(pwVal)) {
        error(password, 'Length: 8-16 (1 number and 1 sp. character)')
    } else {
        success(password);
        counter++;
    }

    if (cpwVal === '' || cpwVal != pwVal) {
        error(cpassword, 'Passwords must be both be valid and matching!');
    } else {
        success(cpassword);
        counter++;
    }

    if (counter === 4) {
        return;
    } else {
        e.preventDefault();
    }
})

function error(input, message) {
    const regForm = input.parentElement;     // This references the reg-form class
    const small = regForm.querySelector('small');   // This selects the 'small' tag
    regForm.className = `reg-form error`;
    small.innerText = message;
}

function success(input) {
    const regForm = input.parentElement;
    regForm.className = 'reg-form success';
}

function valUname(username) {
    return /^[a-zA-Z0-9_]{6,16}$/.test(username);
}

function validEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function validPw(password) {
    return /^(?=.*[0-9])(?=.*[!@#$%^_&*])[a-zA-Z0-9!@#$%^_&*]{8,16}$/.test(password);
}