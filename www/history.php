<?php
session_start();
require_once ('../config.php');
if (!isset($_SESSION['user'])) {
    header("Location: /login_register.php");
    die();
}

print_header();
?>

<h1>今までに購入した商品一覧</h1>
<hr>
<table class="table table-bordered">
<tr>
    <th>ItemNum</th>
    <th>Item</th>
    <th>Description</th>
    <th>Price</th>
    <th>Image</th>
</tr>
<?php
try {
    $dbh = new PDO(DSN, DBUSER, DBPASSWORD);
}
catch(PDOException $e) {
    print ('Error:' . $e->getMessage());
    die();
}

$sql = <<<EOT
SELECT * FROM `items` WHERE `id` IN (
    SELECT `order_items`.`item_id`
    FROM `order_items`
    INNER JOIN `orders`
    ON `order_items`.`order_id` = `orders`.`id`
    WHERE `user_id` = {$_SESSION['user']['id']}
);
EOT;


foreach ($dbh->query($sql) as $row) {
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td align="center"><img src="/images/<?php echo $row[0]; ?>.jpg"></td>
</tr>
<?php
}
?>
</table>
<?php 
print_footer();
