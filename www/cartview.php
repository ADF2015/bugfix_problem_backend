<?php
session_start();
require_once ('../config.php');
print_header();

if (!isset($_SESSION['cartitems']) || count($_SESSION['cartitems']) < 1) {
    echo '<h2>現在カートの中身は空です!</h2>';
} else {

try {
    $dbh = new PDO(DSN, DBUSER, DBPASSWORD);
} catch(PDOException $e) {
    print ('Error:' . $e->getMessage());
    die();
}

$cartitems = implode(",", $_SESSION['cartitems']);
$sth = $dbh->query("SELECT id, name, description, price FROM items WHERE id IN ($cartitems)");
?>

<h1>カート内の商品</h1><hr>
<table class="table table-bordered">
    <tr>
        <th>商品ID</th>
        <th>商品名</th>
        <th>説明</th>
        <th>価格</th>
        <th>画像</th>       
    </tr>

<?php
foreach ($sth as $row) {
?>
    <tr>
    	<td><?php echo $row['id']; ?></td>
    	<td><?php echo $row['name']; ?></td>
    	<td><?php echo $row['description']; ?></td>
    	<td><?php echo $row['price']; ?></td>
    	<td align="center">
    	<img src="/images/<?php echo $row['id']; ?>.jpg"></img></td>
    </tr>


<?php
}
?>
</table>

<center>
<?php 
if (isset($_SESSION['user'])) {
?>
    <form method="post" action="/buy.php">
        <input class="btn btn-primary" type="submit" value="購入">
    </form>
<?php    
} else {
?>
<div class="alert alert-warning">
購入前に<a href="/login_register.php">ログイン</a>してください
</div>
<?php 
}
?>
    <form method="post" action="/reset.php">
        <input class="btn btn-danger" type="submit" value="カートをリセットする">
    </form>
</center>
<?php
}
print_footer();
