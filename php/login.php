<?php
session_start();
include './connect.php';
if(!empty($_POST['email']) && !empty($_POST['pass'])){
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $r = $mysqli->query("Select * from usuarios where email = '$email' and pass = '".sha1($pass)."'") or die($mysqli->error);
  if(mysqli_num_rows($r)>0){
    while($f=mysqli_fetch_array($r)){
      echo 'Bienvenido '.$f['nombre'].' '.$f['ap'];
      $_SESSION['todo'] = array('Id'=>$f['id'],
                                'Nombre'=>$f['nombre'],
                                'Ap'=>$f['ap'],
                                'Email'=>$f['email'],
                                'Img_perfil'=>$f['img_perfil'],
                                'Nivel'=>$f['nivel']);
    }
    header("Location: ../admin/");
  }else{
    header("Location: ../login.php?error=usuario y/o password invalida");
  }
}else{
  header("location: ../login.php?error=favor de llenar los campos");
}
?>
