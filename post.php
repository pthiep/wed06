<?php
	require_once 'init.php';
	
	$countPost = countRow("post");
	$result = getAllStatus();	
	$success = true;
	
	if (!empty($_POST['status'])) { 
		$success = postStatus($currentUser['id'], $_POST['status']);
		
		if ($success)
		{
			header('Location: post.php');
			exit();
		}
	}
?>
<?php include 'header.php'; ?>
<h1>Thêm trạng thái mới</h1>

<form method="POST">
  <textarea class="form-control" rows="3" id="status" name="status" placeholder="Bạn đang nghĩ gì?"></textarea>
  <br>
  <button type="submit" class="btn btn-primary">Đăng</button>
</form>
<br>
<h4>Bài đăng mới !!!</h4>
<div class="container">
	<div class="panel-group">
		<?php  
		for ($i = 0; $i < $countPost; $i++) {
			?>
				<div class="alert alert-primary" role="alert">
					<?php echo getName($result[$i][0]) . " đã đăng : ";?> 
					<br> &ensp;
					<?php echo $result[$i][1]; ?>
				</div>
			<?php
		}
	?>
	</div>
</div>
<?php include 'footer.php' ?>