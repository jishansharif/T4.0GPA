<?php

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$test = True;
if(isset($_POST['Submit'])) {

    $emp_uname = trim($_POST["username"]);
    $emp_email = trim($_POST["email"]);
    $emp_pass = trim($_POST["password"]);
    $emp_pass2 = trim($_POST["cpassword"]);


    if ($emp_email == "") {
        "<span class='error'>Please enter your email.</span>";
        $test = False;
        //$code= "1" ;
    }

    if (!preg_match($regex, $emp_email)) {
        $error_email = "<span class='error'>Invalid email.</span>";
        $test = False;
    }

    if ($emp_pass == "") {
        $error_pswd = "<span class='error'>Please enter password.</span>";
        $test = False;
        //$code= "1" ;
    }

    if ($emp_pass2 == "") {
        $error_pswd2 = "<span class='error'>Please enter password.</span>";
        $test = False;
        //$code= "1" ;
    }

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $emp_pass);
    $lowercase = preg_match('@[a-z]@', $emp_pass);
    $number = preg_match('@[0-9]@', $emp_pass);

    if (!$uppercase || !$lowercase || !$number || strlen($emp_pass) < 8) {
        $error_pswd = "<span class='error'>Password should be at least 8 characters in length and should include at least one upper case letter, and one number.</span>";
        $test = False;
    }
    if ($emp_pass !== $emp_pass2) {
        $error_pswd2 = "<span class='error'>Passwords do not match</span>";
        $test = False;
    }

    $host = "localhost"; // Website IP address
    $db = "ratemyshawarma";
    $user = "root";
    $password = "";

// Create connection
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);

    $sql = "INSERT INTO MyUsers (email, password1)
VALUES ('$emp_email', '$emp_pass')";

    if ($pdo->query($sql) === TRUE) {
        echo "Account created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $pdo->error;
    }

    $pdo->close();
}
?>