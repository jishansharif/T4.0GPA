const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');
const errorElement = document.getElementById('error');

form.addEventListener('submit', e => {
    let messages = [];
    if (username.value.length < 6 || username.value.length > 16) {
        messages.push('Username length: 6-16 (no sp. characters)');
    }

    if (password.value.length < 8 || password.value.length > 16) {
        messages.push('Password length must be 8-16');
    }

    if (messages.length > 0) {
        e.preventDefault();
        errorElement.innerText = messages.join(', ');
    }
})

function valUname(username) {
    return /^[a-zA-Z0-9_]{6,16}$/.test(username);
}

function validEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function validPw(password) {
    return /^(?=.*[0-9])(?=.*[!@#$%^_&*])[a-zA-Z0-9!@#$%^_&*]{8,16}$/.test(password);
}