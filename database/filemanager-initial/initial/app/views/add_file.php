<?php
$path = $_GET['path'];
$path = trim($path, '/.\/');
if (empty($path)) {
  $path = '/';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <title>فایل جدید · {{ @TITLE }}</title>
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
          <a class="nav-link" href="{{ @BASE }}/change_password"><i class="fa fa-key"></i> تغییر رمز عبور</a>
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
    <h1 class="font-weight-bold"><i class="fa fa-plus"></i> فایل جدید در <span dir="ltr"><?php echo '/' . trim($path, '/'); ?></span></h1>
    <form method="post">
      <div class="form-group">
        <label for="name">نام فایل</label>
        <input type="text" dir="ltr" class="form-control" name="name" id="name" placeholder="نام فایل" required autofocus>
      </div>
      <div class="form-group">
          <label for="content">محتوا</label>
        <textarea dir="ltr" class="form-control" name="content" id="content" rows="10"><?php echo '{{ @content }}'; ?></textarea>
      </div>
      <input type="submit" class="btn btn-dark" value="افزودن">
    </form>
  </main>
  <script src="{{ @BASE }}/assets/js/jquery-3.5.1.slim.min.js"></script>
  <script src="{{ @BASE }}/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>