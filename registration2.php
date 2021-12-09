<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'h_items.inc' ?>
    <script defer src="validate2.js"></script>
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
    <form class="form" id="form" action="check_regist.php" method="get">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="Username" required>
        <label for="email">Email</label>
        <input id="email" name="email" type="email" placeholder="example@example.com" required>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Password" required>
        <label for="cpassword">Confirm Password</label>
        <input id="cpassword" name="cpassword" type="password" placeholder="Confirm Password" required>
        <button type="submit" class="btn btn-success btn-lg btn-block">Create Account</button>
    </form>
</div>

<footer>
    <?php include 'f_items.inc' ?>
</footer>
</body>
</html>