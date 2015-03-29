<?php 
define('__ROOT__', dirname(__FILE__)); 
define("DSN", "mysql:host=localhost;dbname=badstore2015");
define("DBUSER", "root");
define("DBPASSWORD", "");


function print_header()
{
    if (isset($_SESSION['user']['fullname'])) {
        $fullname = $_SESSION['user']['fullname'];
    } else {
        $fullname = 'ゲスト';
    }

    if (isset($_SESSION['cartitems'])) {
        $items = count($_SESSION['cartitems']);
    } else {
        $items = 0;
    } 

    try {
        $dbh = new PDO(DSN, DBUSER, DBPASSWORD);
    } catch(PDOException $e) {
        print ('Error:' . $e->getMessage());
        die();
    }

    $cartitems = implode(",", $_SESSION['cartitems']);
    $sth = $dbh->query("SELECT price FROM items WHERE id IN ($cartitems)");
    foreach ($sth as $row) {
        $total_price += $row['price'];
        $item_count++;
    }


  echo <<<EOT
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to BadStore2015!</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
  <div class="navbar navbar-default">
    <div class="navbar-header">
      <a href="#" class="navbar-brand">BadStore2015</a>
    </div>
    <ul class="nav nav-pills">
      <li role="presentation"><a href="/index.php">ホーム</a></li>
      <li role="presentation"><a href="/new_items.php?isNew=Y">新しい品物！</a></li>
      <li role="presentation"><a href="/guestbook.php">メッセージを残す</a></li>
      <li role="presentation"><a href="/history.php">購入履歴</a></li>
      <li role="presentation"><a href="/login_register.php">ログイン・登録</a></li>
      <li role="presentation"><a href="/logout.php">ログアウト</a></li>
    </ul>
  </div>
  <div class="container">

  <div class="panel panel-default">
    <div class="panel-heading">情報</div>
    <div class="panel-body">
    ようこそ、{$fullname}さん カート内に{$item_count}点の品物　計{$total_price}ドル
    <br>
    <a href="/cartview.php"><i class="glyphicon glyphicon-shopping-cart"></i>カートを見る</a>
    
    </div>
  </div>
EOT;
}


function print_footer()
{
  echo <<<EOT
</div>

  <center><font size="2", face="Times">BadStore 2015 - Copyright &#169; 2015 ADF</font></center>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
EOT;
}
