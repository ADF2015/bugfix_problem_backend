<?php
session_start();
require_once('../config.php');
print_header();
?>
<h2>ログイン・登録</h2>
<?php
echo $_SESSION['loginregister_error'];
$_SESSION['loginregister_error'] = '';
?>
<hr>
<h3>登録</h3>
<form class="form-horizontal" method="post" action="register.php" >
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">Full Name</label>
    <div class="col-sm-10">
      <input type="text" name="fullname" class="form-control" id="inputName" placeholder="Your Name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="register" value="登録">
    </div>
  </div>
</form>

<hr>
<h3>ログイン</h3>
<form class="form-horizontal" method="get" action="login.php" >
  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="login" value="ログイン">
    </div>
  </div>
</form>
<?php 
print_footer();
