<?php 
require_once 'init.php';

$success = true;
$code= '';
$pass= '';
if (!empty($_POST['passnew'])) {
	$code = $_GET['code'];
	$pass = $_POST['passnew'];
	resetpass($code, $pass);
}
?>
<?php include 'header.php' ?>
  <?php if (!$success) : ?>
   <div class="alert alert-success" role="alert">
	Đã cập nhật mật khẩu mới !!!
  </div>
  <?php endif; ?>
	<h1>Cài đặt mật khẩu mới</h1>
	<form method="POST">
	  <div class="form-group">
		<label for="passnew">Mật khẩu</label>
		<input type="password" class="form-control" id="passnew" name="passnew " placeholder="Điền mật khẩu vào đây" value="">
	  </div>
	  <button type="submit" class="btn btn-primary">Cài lại mật khẩu</button>
	</form>
<?php include 'footer.php' ?>