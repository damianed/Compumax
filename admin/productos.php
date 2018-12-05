<?php
  session_start();
  if(!isset($_SESSION['todo'])){
    header("Location: ../login.php?error=acceso denegado");
  }
  $sessionData = $_SESSION['todo'];
  include '../php/connect.php';

  $r = $mysqli->query("Select * from productos") or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Productos</title>
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="../css/all.css">
  </head>
  <body>
    <?php include "./layouts/header.php"; ?>
    <?php include "./layouts/aside.php" ?>
    <main>
      <h2>Lista de productos</h2>
      <div class="col60">
        <table style="width:100%;text-align:left">
          <thead>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>stock</th>
            <th>Descripcion</th>
            <th>Imagen</th>
          </thead>
          <tbody>
            <?php while($row=mysqli_fetch_array($r)){
              $c = $mysqli->query("Select nombre from categorias where id=".$row['id_categorias']) or die($mysqli->error);
              $categoria = mysqli_fetch_array($c)['nombre'];
              echo "<tr>";
              echo "<td>".$row['nombre']."</td>";
              echo "<td>".$row['precio']."</td>";
              echo "<td>$categoria</td>";
              echo "<td>".$row['stock']."</td>";
              echo "<td>".$row['descripcion']."</td>";
              echo '<td><img src="'.$row["imagen"].'" alt="" style="height:30px"></td>';
              echo "</tr>";
            }?>
          </tbody>
        </table>
      </div>
      <div class="col30">
        <h1>Agregar Producto</h1>
        <?php if(isset($_GET['error'])){?>
          <div style="color:red">
            Error: <?php echo $_GET['error']; ?>
          </div>
        <?php } ?>
        <form id="formis" action="../php/insertProduct.php" metod="post" enctype="multipart/form-data" method="post">
          <fieldset>
            <label for="name">Nombre</label>
            <input type="text" name="name" value="" id="name" onkeydown="quitarBorde(this)">
          </fieldset>
          <fieldset>
            <label for="price">Precio</label>
            <input type="number" name="price" id="price" onkeydown="quitarBorde(this)">
          </fieldset>
          <fieldset>
            <label for="img">Imagen</label>
            <input type="file" name="image" value="" id="img" onkeydown="quitarBorde(this)">
          </fieldset>
          <fieldset>
            <label for="stock">Stock</label>
            <input type="number" name="stock" value="" id="stock" onkeydown="quitarBorde(this)">
          </fieldset>
          <fieldset>
            <label for="categoria">Categorias</label>
            <select class="" name="cate" id="categoria">
              <?php $r = $mysqli->query("select * from categorias") or die($mysqli->error);
                while($f=mysqli_fetch_array($r)){
                  echo '<option value="'.$f['id'].'">'.$f['nombre'].'</option>';
                }
              ?>
            </select>
          </fieldset>
          <fieldset>
            <label for="desc">Descripcion</label>
            <textarea id="desc" name="desc" rows="8" cols="80"></textarea>
          </fieldset>
          <fieldset>
            <button type="submit" name="button">Insertar</button>
          </fieldset>
        </form>
      </div>
    </main>
    <script type="text/javascript">
    var n = document.getElementById("name");
    var price = document.getElementById("price");
    var img = document.getElementById("img");
    var stock = document.getElementById("stock");
    var cat = document.getElementById("categoria");
    var desc = document.getElementById("desc");
    var arr = new Array();
    arr.push(n);
    arr.push(price);
    arr.push(img);
    arr.push(stock);
    arr.push(cat);
    arr.push(desc);
    document.getElementById("formis").addEventListener('submit',function(event){
        for(var i=0;i<arr.length;i++){
            if(arr[i].value.trim()==""){
              arr[i].style = "border:1px red solid";
              event.preventDefault();
            }
          }
        });
    function quitarBorde(event){
      event.style = "boder: 1px grey solid";
    }
    </script>
  </body>
</html>
