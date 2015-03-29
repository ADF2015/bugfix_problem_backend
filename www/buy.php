<?php
session_start();
require_once ('../config.php');

try {
    $dbh = new PDO(DSN, DBUSER, DBPASSWORD);
} catch(PDOException $e) {
    print ('Error:' . $e->getMessage());
    die();
}

$cartitems = implode(",", $_SESSION['cartitems']);
$sth = $dbh->query("SELECT price, cost FROM items WHERE id IN ($cartitems)");

fcoreach ($sth as $row) {
    $order_price += $row['price'];
    $order_cost += $row['cost'];
}

$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO `orders` (user_id, order_datetime, order_cost, order_price) VALUES ({$_SESSION['user']['id']}, '{$date}', {$order_cost}, {$order_price})";
$dbh->query($sql);

$sql = "SELECT `id` FROM `orders` ORDER BY `id` DESC LIMIT 1";
$query = $dbh->query($sql);
$order_id = $query->fetch(PDO::FETCH_ASSOC);

foreach ($_SESSION['cartitems'] as $item_id) {
    $sql = "INSERT INTO `order_items` (order_id, item_id) VALUES ({$order_id['id']}, {$item_id})";
    $dbh->query($sql);
}

$_SESSION['cartitems'] = null;

header("Location: /index.php");
