<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rate My Shawarma</title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style2.css">        <!-- Importing CSS file -->
    <script defer src="validate.js"></script>
</head>

<body class="reg-body">

<header>
    <nav class="nav-bar">
        <?php include 'navbar.inc' ?>
</header>


<div class="container-reg">
    <div class="header">
        <h2>Register New Account</h2>
    </div>
    <form class="form" id="form" action="check_regist.php" method="post">
        <div class="reg-form">
            <label for="username">Username</label>
            <input type="text" placeholder="Username" id="username" name="username">
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error</small>
        </div>
        <div class="reg-form">
            <label for="email">Email</label>
            <input type="email" placeholder="example@example.com" id="email" name="email">
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error</small>
        </div>
        <div class="reg-form">
            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password">
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error</small>
        </div>
        <div class="reg-form">
            <label for="cpassword">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword">
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error</small>
        </div>
        <button action="submit" class="btn btn-success btn-lg btn-block">Create Account</button>
    </form>
</div>

<footer>
    <a href="#">Privacy Policy</a>
    <a href="#">Terms</a>
    <a href="#">Contact Us</a>
    <a>RateMyShawarma © 2021</a>
</footer>
</body>
</html>