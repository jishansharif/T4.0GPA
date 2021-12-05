<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'h_items.inc' ?>
</head>

<body>
    <nav class="nav-bar">
        <?php include 'navbar.inc' ?>
    </nav>

    <div class="container-reg">
        <div class="header">
            <h2>Login</h2> <!-- Set up the login Form here-->
        </div>
        <form class="form" id="form">
            <!-- Set up two input tags: Username and Password. The password will be of type password.-->
            <!-- We use a placeholder to allow users to know what they'll need to enter in each field-->
            <div class="reg-form">
                <label for="username">Username</label>
                <input type="text" placeholder="Username" id="username">
            </div>
            <div class="reg-form">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password">
            </div>
            <button class="button" type="submit">Continue</button>
            <p class="form-text">
                <a href="#" class="forgot-pw">Forgot your password?</a>
            </p>
            <p class="reg-link">
                <a class="reg-url" href="registration.php" id="reg-link">New User? Create an account.</a>
            </p>
        </form>
    </div>

    <footer>
        <?php include 'f_items.inc' ?>
    </footer>

</body>
</html>