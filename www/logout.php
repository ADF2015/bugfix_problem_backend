<?php
session_start();
require_once ('../config.php');
$_SESSION['user'] = null;

header("Location: /index.php");
