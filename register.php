<?php include("dbconnect.php"); ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>The Advice Shop - Register</title>
    <link href="styles/mainstyles.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<?php include("inc_header.php");
include("inc_nav.php"); ?>
<h2>Register your account!</h2>
<div id="content">
    <form action="process_registration.php" method="get">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="text" name="password" id="password" required>
        </p>
        <p>
            <input type="submit" name="user_submit" id="user_submit" value="Register">
        </p>
    </form>
    <p>Thanks for registering!</p>
</div>
<?php include("inc_footer.php"); ?>
</body>
</html>