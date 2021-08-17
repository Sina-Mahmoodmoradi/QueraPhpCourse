<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <title>ورود به حساب کاربری · {{ @TITLE }}</title>
  <link href="{{ @BASE }}/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ @BASE }}/assets/css/login.css" rel="stylesheet">
  <link href="{{ @BASE }}/assets/css/vazir-font.css" rel="stylesheet">
</head>
<body class="text-center">
  <form class="form-signin" method="post">
    <h1 class="font-weight-bold">{{ @TITLE }}</h1>
    <h3 class="h3 mb-3">ورود به حساب کاربری</h3>
    <?php if (($flash = Flash::get()) !== null) { ?>
    <div class="alert alert-<?php echo $flash['type']; ?>" role="alert">
      <?php echo $flash['message']; ?>
    </div>
    <?php } ?>
    <form method="post">
      <label class="sr-only" for="username">نام کاربری</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="نام کاربری" required autofocus>
      <label class="sr-only" for="password">رمز عبور</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="رمز عبور" required>
      <div class="checkbox mb-3">
        <label><input type="checkbox" value="remember"> مرا به‌خاطر بسپار</label>
      </div>
      <input class="btn btn-lg btn-dark btn-block" type="submit" value="ورود">
    </form>
  </form>
</body>
</html>