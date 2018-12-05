<?php
  $usuario = "root";
  $pass = "1234";
  $servidor = "localhost";
  $bd= "ComputerStore";

  $mysqli = mysqli_connect($servidor, $usuario, $pass, $bd);
  if(mysqli_connect_error()){
    die("No se pudo conectar ". mysqli_connect_error());
  }
  ?>
