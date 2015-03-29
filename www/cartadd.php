<?php
session_start();
require_once ('../config.php');

$_SESSION['cartitems'] = array();
if (isset($_POST['ResetItems'])) {
    header("Location: /whatsnew.php");
} 

$_SESSION['cartitems'] = $_POST['cartitems'];
header("Location: /index.php");
