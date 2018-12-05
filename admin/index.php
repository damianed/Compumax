<?php
  session_start();
  if(!isset($_SESSION['todo'])){
    header("Location: ../login.php?error=acceso denegado");
  }
  $sessionData = $_SESSION['todo'];
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="../css/all.css">
  </head>
  <body>
    <?php include "./layouts/header.php"; ?>
    <?php include "./layouts/aside.php" ?>
    <main>
      <h2>Bienvenido <?php echo $sessionData['Nombre']." ".$sessionData['Ap'] ?></h2>

    </main>
  </body>
</html>
