<?php
	require_once 'init.php';
	$success = true;
	
	if (!empty($_POST['fullname']) && !empty($_POST['sdt'])) {
		$fullname = $_POST['fullname'];
		$sdt = $_POST['sdt'];
		$id = $currentUser['id'];

		$success = updateUser($id, $fullname, $sdt);
		if ($success)
		{
			header('Location: profile.php');
			exit();
		}
			
	}
?>
<?php include 'header.php'; ?>
<h1>Quản lý thông tin cá nhân</h1>
<?php if (!$success) : ?>
<div class="alert alert-danger" role="alert">
  Cập nhật không thành công!
</div>
<?php endif; ?>
<form method="POST">
  <div class="form-group">
    <label for="fullname">Họ và tên</label>
    <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $currentUser['fullname'] ?>">
  </div>
  <div class="form-group">
    <label for="sdt">Số điện thoại</label>
    <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $currentUser['sdt'] ?>">
  </div>
  
  <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
<?php include 'footer.php' ?>