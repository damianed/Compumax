<?php
  include "./connect.php";
  if(!empty($_POST['name']) && !empty($_POST['ap']) && !empty($_POST['email']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])){
    $nombre=$_POST['name'];
    $ap = $_POST['ap'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    if($pass1==$pass2){
      $mysqli->query("insert into usuarios values(0, '$nombre', '$ap', '$email', '".sha1($pass1)."', 'default.jpg', 0)") or die($mysqli->error);
      header("Location: ../login.php?success");
    }else{
      header("Location: ../login.php?error=las contrasenias no son iguales");
    }
  }else{
    header("Location: ../login.php?error=los campos no fueron completados");
  }
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
    Gracias por registrarte: <?php echo $nombre; ?>
  </body>
</html>
