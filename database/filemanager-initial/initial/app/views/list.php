<?php
if ((!isset($_GET['path']) || empty(trim($_GET['path'], '/\/.'))) && $files[0] == '..') {
    array_shift($files);
}
$path = $_GET['path'] ?? '/';
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
  <title>لیست فایل‌ها · {{ @TITLE }}</title>
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
    <h1 class="font-weight-bold">محتویات <span dir="ltr"><?php echo (strpos($path, '/') !== 0 ? '/' : '') . urldecode($path); ?></span></h1>
    <?php if (($flash = Flash::get()) !== null) { ?>
    <div class="alert alert-<?php echo $flash['type']; ?>" role="alert">
      <?php echo $flash['message']; ?>
    </div>
    <?php } ?>
    <div class="mt-4">
      <a href="{{ @BASE }}/add_file?path=<?php echo '/' . trim($path, '/'); ?>" class="btn btn-dark"><i class="fa fa-plus"></i> فایل جدید</a>
      <a href="{{ @BASE }}/add_directory?path=<?php echo '/' . trim($path, '/'); ?>" class="btn btn-dark"><i class="fa fa-plus"></i> دایرکتوری جدید</a>
    </div>
    <table class="table mt-5 mb-5">
      <thead>
        <tr>
          <th scope="col">نام</th>
          <th scope="col">حجم</th>
          <th scope="col">عملیات</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($files as $file) {
          $file = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'] ?? '/', '/') . '/' . $file;
        ?>
        <tr>
          <td><i class="<?php echo IconHelper::getIconClass($file); ?>"></i> <a dir="ltr" href="<?php
          if (basename($file) == '..') {
            $back_dir = explode('/', '/' . ltrim($path, '/'));
            if (!empty($back_dir)) {
              array_pop($back_dir);
            }
            $back_dir = implode('/', $back_dir);
            if (empty($back_dir)) {
              $back_dir = '/';
            }
            echo '{{ @BASE }}/?path=/' .  trim($back_dir, '/');
          } else {
            echo is_file($file) ? (rtrim($_GET['path'] ?? '/', '/') . '/' . basename($file)) :  '{{ @BASE }}/?path=/' . trim($path, '/') . (!empty(trim($path, '/')) ? '/' : '') . basename($file);
          }
          ?>" class="text-dark"><?php echo basename($file); ?></a></td>
          <td dir="ltr"><?php echo is_file($file) ? FileHelper::formatBytes(filesize($file)) : '—'; ?></td>
          <td>
            <?php if (basename($file) != '..') { ?>
            <a href="{{ @BASE }}/delete_<?php echo is_file($file) ? 'file' : 'directory' ?>?path=<?php echo trim($path, '/'); ?>/<?php echo basename($file); ?>" class="text-dark"><i class="fa fa-trash"></i></a>
            <a href="{{ @BASE }}/copy_<?php echo is_file($file) ? 'file' : 'directory' ?>?path=<?php echo !empty(trim($path, '/')) ? '/' . trim($path, '/') : ''; ?>/<?php echo basename($file); ?>" class="text-dark"> <i class="fa fa-copy"></i></a>
            <a href="{{ @BASE }}/move_<?php echo is_file($file) ? 'file' : 'directory' ?>?path=<?php echo !empty(trim($path, '/')) ? '/' . trim($path, '/') : ''; ?>/<?php echo basename($file); ?>" class="text-dark"> <i class="fa fa-arrow-right"></i></a>
            <?php if (is_file($file)) { ?>
            <a href="{{ @BASE }}/edit_file?path=<?php echo !empty(trim($path, '/')) ? '/' . trim($path, '/') : ''; ?>/<?php echo basename($file); ?>" class="text-dark"> <i class="fa fa-edit"></i></a>
            <?php } ?>
          <?php } else { ?>
            —
          <?php } ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>
  <script src="{{ @BASE }}/assets/js/jquery-3.5.1.slim.min.js"></script>
  <script src="{{ @BASE }}/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>