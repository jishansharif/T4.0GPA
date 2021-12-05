<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'h_items.inc' ?>
</head>

<body class="reg-body">

<header>
    <nav class="nav-bar">
        <?php include 'navbar.inc' ?>
    </nav>
</header>


<div class="container-reg">
    <div class="header">
        <h2>Register New Account</h2>
    </div>
    <form class="form" id="form">
        <div class="reg-form">
            <label for="username">Username</label>
            <input type="text" placeholder="Username" id="username">
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error</small>
        </div>
        <div class="reg-form">
            <label for="email">Email</label>
            <input type="email" placeholder="example@example.com" id="email">
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error</small>
        </div>
        <div class="reg-form">
            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password">
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error</small>
        </div>
        <div class="reg-form">
            <label for="cpassword">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" id="cpassword">
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error</small>
        </div>
        <button>Create Account</button>
    </form>
</div>

<script type="text/javascript" src="validate.js"></script>

<footer>
    <?php include 'f_items.inc' ?>
</footer>
</body>
</html>