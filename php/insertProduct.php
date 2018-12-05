<?php
include '../php/connect.php';
if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['stock']) && !empty($_POST['cate']) && !empty($_POST['desc'])){
  $temp = explode(".",$_FILES['image']['name']);
  $ext = end($temp);
  $mime = $_FILES['image']['type'];
  if($mime=="image/jpeg" || $mime=="image/pjpeg" || $mime=="image/png" || $mime=="image/x-png" || $mime=="image/gif"){
    if(!is_dir('../img/productos')){
      mkdir('../img/productos');
    }
    $random1=rand(1,99999999);
    $random2=rand(1,99999999);
    $fecha=date("Y_m_d_H_i_s");
    $nombreFinal=$random1.'_'.$random2."_".$fecha.".".$ext;
    if(move_uploaded_file($_FILES['image']['tmp_name'], "../img/productos/$nombreFinal")){
      $insert = $mysqli->query("insert into productos values(0, '".$_POST['name']."',". $_POST['price'] .", '../img/productos/$nombreFinal',".$_POST['cate'].",'".$_POST['desc']."', ".$_POST['stock'].")") or die($mysqli->error);
      if($insert){
        header("Location: ../admin/productos.php?sucess");
      }
    }else{
      header("Location: ../admin/productos.php?error=error al subir imagen");
    }
  }else{
    echo "Error de formato";
  }
}else{
  header("Location: ../admin/productos.php?error=campos no esta completos");
}
 ?>
