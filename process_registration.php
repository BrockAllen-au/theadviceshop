<?php include("dbconnect.php"); ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>The Advice Shop - Registered</title>
    <link href="styles/mainstyles.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<?php include("inc_header.php");
include("inc_nav.php"); ?>
<?php

$username = trim($_REQUEST['username']);
$password = trim($_REQUEST['password']);

try {
    $checkUserSQL = "SELECT COUNT(*) FROM users WHERE username = :username";
    $checkStmt = $dbh->prepare($checkUserSQL);
    $checkStmt->execute([':username' => $username]);
    $userExists = $checkStmt->fetchColumn();

    if ($userExists > 0) {
        echo "<h2>User already exists! Please choose another</h2>";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

        $stmt = $dbh->prepare($sql);
        $stmt->execute([':username' => $username, ':password' => $password]);

        echo "<h2>Thank you for registering $username!</h2>";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<div id="content">

    <p>Your on going support is greatly appreciated!</p>
</div>
<?php include("inc_footer.php"); ?>
</body>
</html>
