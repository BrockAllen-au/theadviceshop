<?php include("dbconnect.php"); ?>
<?php
error_reporting(E_ALL);
session_start();


$username = trim($_REQUEST['username']);
$password = trim($_REQUEST['password']);

try {
    $checkUserSQL = "SELECT password FROM users WHERE username = :username";
    $checkStmt = $dbh->prepare($checkUserSQL);
    $checkStmt->execute([':username' => $username]);
    $storedPassword = $checkStmt->fetchColumn();

    if ($storedPassword === $password) {
        $_SESSION['username'] = $username;
    } else {
        echo "<p>Wrong username or password</p>";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}


//echo $_GET['page'];
header("Location: ".$_GET['page'].".php");
exit();