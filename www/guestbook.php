<?php
session_start();
require_once('../config.php');
print_header();
?>

<h1>メッセージを残す</h1>
<hr>
<p>ぜひ、ゲストブックにメッセージを残していって下さい！サイトについて、買った所品やサイトの完成など何でも構いません。</p>
<hr>

<form class="form-horizontal" method="post" action="/doguestbook.php">
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">Your Name</label>
    <div class="col-sm-10">
<?php 
if (isset($_SESSION['user'])) {
    echo '<input type="text" name="name" class="form-control" id="inputName" placeholder="' . $_SESSION['user']['fullname'] . '" disabled>';
} else {
    echo '<input type="text" name="name" class="form-control" id="inputName" placeholder="Your Name">';
}
 ?>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
<?php 
if (isset($_SESSION['user'])) {
    echo '<input type="email" name="email" class="form-control" id="inputEmail" placeholder="' . $_SESSION['user']['email'] . '" disabled>';
} else {
    echo '<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">';
}
 ?>
    </div>
  </div>
  <div class="form-group">
    <label for="inputComment" class="col-sm-2 control-label">Comment:</label>
    <div class="col-sm-10">
    <textarea class="form-control" name="comment" row="4"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="投稿する">
    </div>
  </div>
</form>

<?php 
print_footer();
