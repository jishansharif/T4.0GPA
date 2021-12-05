<?php
# username
# email
# Passwowrd
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$test = True;
if(isset($_POST['Submit'])){

    $emp_email=trim($_POST["email"]);
    $emp_pass = trim($_POST["pswd"]);
    $emp_pass2 = trim($_POST["pswd2"]);
  //$emp_number=trim($_POST["emp_number"]);
  //$emp_email=trim($_POST["emp_email"]);

  if($emp_email =="") {
    "<span class='error'>Please enter your email.</span>";
    $test = False;
    //$code= "1" ;
  }

  if (!preg_match($regex, $emp_email)) {
    $error_email =  "<span class='error'>Invalid email.</span>";
    $test = False;
  }

  if($emp_pass =="") {
    $error_pswd =  "<span class='error'>Please enter password.</span>";
    $test = False;
    //$code= "1" ;
  }

  if($emp_pass2 =="") {
    $error_pswd2 =  "<span class='error'>Please enter password.</span>";
    $test = False;
    //$code= "1" ;
  }

  // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $emp_pass);
    $lowercase = preg_match('@[a-z]@', $emp_pass);
    $number    = preg_match('@[0-9]@', $emp_pass);

    if(!$uppercase || !$lowercase || !$number || strlen($emp_pass) < 8) {
        $error_pswd =  "<span class='error'>Password should be at least 8 characters in length and should include at least one upper case letter, and one number.</span>";
        $test = False;
}
    if ($emp_pass !== $emp_pass2) {
        $error_pswd2 = "<span class='error'>Passwords do not match</span>";
        $test = False;
    }

    if ($test) {
        //now we add to the database 
        $servername = "localhost";
$username = "root";
$password = "password";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO MyUsers (email, password1)
VALUES ('$emp_email', '$emp_pass')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

    }
}
else {
    echo "<br>";
}
  
?>

