<?php
session_start();
require_once ('../config.php');

$hashed_password = md5($_GET['password']);

try {
    $dbh = new PDO(DSN, DBUSER, DBPASSWORD);
}
catch(PDOException $e) {
    print ('Error:' . $e->getMessage());
    die();
}

$sql = "SELECT * FROM users WHERE email = '" . $_GET['email'] . "' AND password = '" . $hashed_password . "'";
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result) {
    $_SESSION['user'] = $result;
    header("Location: /index.php");
} 
else {
    header("Location: /login_register.php");
    $_SESSION['loginregister_error'] = '<font size="5" color="#ff0000"><b>*login faild</b></font>';
}
