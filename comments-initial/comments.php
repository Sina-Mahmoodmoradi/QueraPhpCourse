<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>دیدگاه‌ها</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h1 class="title">دیدگاه‌ها</h1>
  <?php
  foreach (json_decode(file_get_contents(__DIR__ . '/comments.json'), true) as $comment) { ?>
    <div class="box">
    <div class="box-body">
      <div class="message">
        <p><?php echo htmlentities($comment,ENT_HTML5|ENT_QUOTES,'UTF-8') ?></p>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
</body>
</html>
