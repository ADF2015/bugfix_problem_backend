<?php
session_start();
require_once ('../config.php');

try {
    $dbh = new PDO(DSN, DBUSER, DBPASSWORD);
}
catch(PDOException $e) {
    print ('Error:' . $e->getMessage());
    die();
}

$sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'";
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result) {
    header("Location: /login_register.php");
    $_SESSION['loginregister_error'] = '<font size="5" color="#ff0000"><b>*Email is already taken</b></font>';
    die();
}

$md5_password = md5($_POST['password']);

$stmt = $dbh->query("INSERT INTO users (email, password, fullname) VALUES ('" . $_POST['email'] . "', '" . $md5_password . "', '" . $_POST['fullname'] . "')");
header("Location: /index.php");
