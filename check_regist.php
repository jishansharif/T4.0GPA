<?php

$username = $_POST["username"];
$email = $_POST["email"];
$pw = $_POST["password"];
$cpw = $_POST["cpassword"];
$regex_uname = '/^[-a-zA-Z0-9_]+$/';
$regex_email = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$regex_pw = '/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+*!=]).*$/';
$errors = array();
if (empty($errors)) {
}
if (empty($username)) {
    $name_error = 'Username must not be empty';
    array_push($errors, $name_error);
} elseif (strlen($username) < 6 || strlen($username) > 16) {
    $name_error = 'Username must consist of 6-16 characters';
    array_push($errors, $name_error);
} elseif (!preg_match($regex_uname, $username)) {
    $name_error = 'No special characters allowed for username (except _)';
    array_push($errors, $name_error);
}

if (empty($email)) {
    $email_error = 'Email must not be empty';
    array_push($errors, $email_error);
} elseif (!preg_match($regex_email, $email)) {
    $email_error = 'Email must be of correct format';
    array_push($errors, $email_error);
}

if (empty($pw)) {
    $password_error = 'Password must not be empty';
    array_push($errors, $password_error);
} elseif (strlen($pw) < 8 || strlen($pw) > 16) {
    $password_error = 'Password consist of 8-16 characters';
    array_push($errors, $password_error);
} elseif (!preg_match($regex_pw, $pw)) {
    $password_error = 'Password must contain at least 1 uppercase and 1 special character';
    array_push($errors, $password_error);
} elseif (!($pw === $cpw)) {
    $password_error = 'The two passwords must match';
    array_push($errors, $password_error);
}
if (empty($errors)) {
    include "connect_db.inc";
    $statement = $pdo->query("SELECT * FROM `users` WHERE (`username` = '$username')");
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (empty($rows)) {
        $sql = "INSERT INTO `users` (`username`, `password`, `email`) VALUES ('$username', '$pw', '$email')";
        $pdo->exec($sql);
        $message = "Successful!";
    } else {
        $message = "Username already exists. Please try a different username.";
    }
} else {
    foreach ($errors as $error) {
        echo "$error".";";
    }
}
?>

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
        <?php echo $message."<br>"; ?>
        <a href='login.php'>Login<br></a>
        <a href='registration.php'>Back to registration form</a>
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

