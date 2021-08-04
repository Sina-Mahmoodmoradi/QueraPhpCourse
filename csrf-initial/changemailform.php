<?php
session_start();
function checkCsrfToken(){
    if(empty($_SESSION['csrf_token'])){
        $_SESSION['csrf_token']=bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change E-mail address</title>
</head>
<body>
  <form method="post" action="changemail.php">
    <input type="email" id="email" name="email">
    <input type="submit" name="submit" value="Change E-mail address">
    <input type="hidden" name="csrf_token" value="<?php echo checkCsrfToken() ?>">
  </form>
</body>
</html>