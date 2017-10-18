<?php
	require_once 'init.php';
	$checkoldpass = true;
	$checknewpass = true;
	$checknewpassdup = true;
	
	$success = false;
	
	if (!empty($_POST['matkhaucu']) && !empty($_POST['matkhaumoi']) && !empty($_POST['matkhaumoi-dup'])) { 
		
		if (password_verify($_POST['matkhaucu'], $currentUser['password'])) {
			$checkoldpass = true;		
		} else {
		  $checkoldpass = false;
		}
		
		if ($_POST['matkhaumoi-dup'] == $_POST['matkhaumoi']) {
			$checknewpassdup = true;	
		} else {
			$checknewpassdup = false;
		}		
		
		if ($_POST['matkhaumoi'] != $_POST['matkhaucu']) {
			$checknewpass = true;
		} else {
			$checknewpass = false;
		}		
		
		$hash_pw = password_hash($_POST['matkhaumoi'], PASSWORD_DEFAULT);
		$success = changePassword($currentUser['id'], $hash_pw);
		
		if ($success)
		{
			header('Location: change-password.php');
			exit();
		}
	}
	
?>
<?php include 'header.php'; ?>
<h1>Đổi mật khẩu</h1>
<?php if (!$checkoldpass) {?>
<div class="alert alert-danger" role="alert">
  Mật khẩu cũ không đúng!
</div>
<?php }if (!$checknewpass) { ?>
<div class="alert alert-danger" role="alert">
  Mật khẩu mới trùng mật khẩu cũ!
</div>
<?php }if (!$checknewpassdup) { ?>
<div class="alert alert-danger" role="alert">
  Nhập mật khẩu mới nhập lại không trùng nhau!
</div>
<?php }?>

<form method="POST">
  <div class="form-group">
    <label for="matkhaucu">Mật khẩu cũ</label>
    <input type="password" class="form-control" id="matkhaucu" name="matkhaucu" placeholder="Nhập mật khẩu cũ vào đây" value="">
  </div>
  <div class="form-group">
    <label for="matkhaumoi">Mật khẩu mới</label>
    <input type="password" class="form-control" id="matkhaumoi" name="matkhaumoi" placeholder="Nhập mật khẩu mới vào đây" value="">
  </div>
  <div class="form-group">
    <label for="matkhaumoi-dup">Mật khẩu mới (nhập lại)</label>
    <input type="password" class="form-control" id="matkhaumoi-dup" name="matkhaumoi-dup" placeholder="Nhập mật khẩu mới vào đây lần nữa" value="">
  </div>
  <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
</form>
<?php include 'footer.php' ?>