<?php
  $hola = 10;
  $r = rand(0,100);
  echo $r." ".$hola;
  // die($r);

  $params = explode( "/", $_GET['params'] )
  $numero=$params[0];
  $color1=$params[1];;
  $color2=$params[2];;
  for($i=0;$i<$numero;$i++){
    if($i % 2== 0){
      echo "<button style='color:$color1'> Mi boton $i</button>";
    }else{
      echo "<button style='color:$color2'> Mi boton $i</button>";
    }
  }
?>
