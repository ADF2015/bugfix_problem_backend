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
$_SESSION['cartitems'] = null;
header("Location: /");
