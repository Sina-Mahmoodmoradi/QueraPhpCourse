<?php

if(isset($_POST['name'])){
    $name=$_POST['name'];

    preg_match('/[a-z A-Z]{3,}/',$name,$reg);
    $check=true;
    if(!isset($reg[0])){
        $reg[0]='';
        $check=false;
    }
    if($check && strlen($name)==strlen($reg[0])){?>
        <!DOCTYPE html>
        <html>
          <head>
            <meta charset="utf-8">
            <title>Say HI</title>
          </head>
          <body>
              <h1>Say my name!</h1>
              Hello <?php echo "$name" ?>
          </body>
        </html>
    <?php }

    else{
        echo '<!DOCTYPE html>
            <html>
              <head>
                <meta charset="utf-8">
                <title>Say HI</title>
              </head>
              <body>
                  <h1>Say my name!</h1>
                  <form method="post" action="form.php">
                      <input type="text" name="name">
                      <span style="color: red">invalid name</span>
                      <input type="submit" value="Say it!">
                  </form>
              </body>
            </html>';
    }
}
else{
    echo '<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Say HI</title>
  </head>
  <body>
      <h1>Say my name!</h1>
      <form method="post" action="form.php">
          <input type="text" name="name">
          <input type="submit" value="Say it!">
      </form>
  </body>
</html>';
}
?>
<!--
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Say HI</title>
</head>
<body>
<h1>Say my name!</h1>
<?php
if (isset($_POST['name'])) {
    if (preg_match('/^[a-zA-Z ]{3,}$/', $_POST['name'])) {
        echo 'Hello '.$_POST['name'];
    } else { ?>
        <form method="POST" action="submit.php">
            <input type="text" name="name">
            <span style="color: red">invalid name</span>
            <input type="submit" value="Say it!">
        </form>
    <?php }
} else { ?>
    <form method="POST" action="submit.php">
        <input type="text" name="name">
        <input type="submit" value="Say it!">
    </form>
<?php }
?>
</body>
</html>
