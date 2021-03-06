<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <title>تغییر رمز عبور · {{ @TITLE }}</title>
  <link href="{{ @BASE }}/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ @BASE }}/assets/css/vazir-font.css" rel="stylesheet">
  <link href="{{ @BASE }}/assets/css/font-awesome.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{ @BASE }}"><i class="fa fa-folder"></i> {{ @TITLE }}</a> <button aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbar" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ @BASE }}/add_user"><i class="fa fa-plus"></i> افزودن کاربر جدید</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ @BASE }}/change_password"><i class="fa fa-key"></i> تغییر رمز عبور</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ @BASE }}/logout"><i class="fa fa-sign-out"></i> خروج</a>
        </li>
      </ul>
    </div>
    <form class="form-inline my-2 my-lg-0" method="post" action="{{ @BASE }}/search?path=<?php echo '/' . trim($path, '/'); ?>">
      <input class="form-control mr-sm-2" type="search" name="keyword" id="keyword" placeholder="جست‌وجو" aria-label="جست‌وجو" required>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </nav>
  <main class="container" style="margin-top: 100px">
    <h1 class="font-weight-bold"><i class="fa fa-key"></i> تغییر رمز عبور</h1>
    <?php if (($flash = Flash::get()) !== null) { ?>
    <div class="alert alert-<?php echo $flash['type']; ?>" role="alert">
      <?php echo $flash['message']; ?>
    </div>
    <?php } ?>
    <form method="post">
      <div class="form-group">
        <label for="password">رمز عبور جدید</label>
        <input type="password" dir="ltr" class="form-control" name="password" id="password" placeholder="رمز عبور جدید" required autofocus>
      </div>
      <div class="form-group">
        <label for="password_confirm">تکرار رمز عبور جدید</label>
        <input type="password" dir="ltr" class="form-control" name="password_confirm" id="password_confirm" placeholder="تکرار رمز عبور جدید" required>
      </div>
      <input type="submit" class="btn btn-dark" value="ثبت">
    </form>
  </main>
  <script src="{{ @BASE }}/assets/js/jquery-3.5.1.slim.min.js"></script>
  <script src="{{ @BASE }}/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>