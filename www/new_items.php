<?php
session_start();
require_once ('../config.php');
print_header();
?>
<div class="container" style="padding:20px 0">
<form method="post" action="/cartadd.php">
<h1>最新の商品一覧です！</h1>
<hr>
<table class="table table-bordered">
<tr>
	<th></th>
    <th>商品ID</th>
    <th>商品名</th>
    <th>説明</th>
    <th>価格</th>
    <th>画像</th>
    <th>カートへの追加</th>
</tr>
<?php
try {
    $dbh = new PDO(DSN, DBUSER, DBPASSWORD);
}
catch(PDOException $e) {
    print ('Error:' . $e->getMessage());
    die();
}

if (isset($_SESSION['user'])) {
    $sql = <<<EOT
SELECT * FROM `items` WHERE `isnew` = '{$_GET['isNew']}' AND NOT `id` IN (
    SELECT `order_items`.`item_id`
    FROM `order_items`
    INNER JOIN `orders`
    ON `order_items`.`order_id` = `orders`.`id`
    WHERE `user_id` = {$_SESSION['user']['id']}
);
EOT;
} else {
    $sql = "SELECT id, name, description, price FROM items WHERE isnew = '" . $_GET['isNew'] . "'";
}

foreach ($dbh->query($sql) as $row) {
    $items[] = $row;
} 


$counter = 0;
while (true) {
?>

<tr>
    <td><?php echo $counter; ?></td>
    <td><?php echo $items[$counter]['id']; ?></td>
    <td><?php echo $items[$counter]['name']; ?></td>
    <td><?php echo $items[$counter]['description']; ?></td>
    <td><?php echo $items[$counter]['price']; ?></td>
    <td align="center"><img src="/images/<?php echo $items[$counter][0]; ?>.jpg"></td>
    <td align="center"><input type="checkbox" name="cartitems[]" value="<?php echo $items[$counter]['id']; ?>"></td>
</tr>
<?php
$counter++;
if ($counter == count($items)) {
break;
}
}
?>
</table>
<center>
	<input type="submit" name="add items to cart" value="商品を追加する">   
</center>
</form>
</div>

<?php 
print_footer();

