<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BTCN06</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">BTCN06</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo ($page == 'index') ? 'active' : '' ?>">
              <a class="nav-link" href="index.php">Trang chủ<span class="sr-only">(current)</span></a>
            </li>
            <?php if (!$currentUser) : ?>
            <li class="nav-item <?php echo ($page == 'register') ? 'active' : '' ?>">
              <a class="nav-link" href="register.php">Đăng ký</a>
            </li>
            <?php endif; ?>
            <?php if (!$currentUser) : ?>
            <li class="nav-item  <?php echo ($page == 'login') ? 'active' : '' ?>">
              <a class="nav-link" href="login.php">Đăng nhập</a>
            </li>
            <?php endif; ?>
            <?php if ($currentUser) : ?>
			<li class="nav-item <?php echo ($page == 'post') ? 'active' : '' ?>">
				<a class="nav-link" href="post.php">
					<?php echo "Đăng trạng thái"?>
				</a>
            </li>
            <li class="nav-item <?php echo ($page == 'profile') ? 'active' : '' ?>">
              <a class="nav-link" href="profile.php">
                <?php echo $currentUser['fullname']?>
              </a>
            </li>
			<li class="nav-item <?php echo ($page == 'change-password') ? 'active' : '' ?>">
				<a class="nav-link" href="change-password.php">
					<?php echo "Đổi mật khẩu"?>
				</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="logout.php">Đăng xuất</a>
            </li>
            <?php endif; ?>
            <?php if (!$currentUser) : ?>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">
                Khách
              </a>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </nav>
      <div>