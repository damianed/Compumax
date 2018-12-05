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
      <h2>Lista de oferta</h2>
      <div class="col60">

      </div>
      <div class="col30">
        <h1>Agregar Oferta</h1>
        <form id="formis">
          <fieldset>
            <label for="product">Producto</label>
            <select class="" name="" id="product">
              <option value="">Product1</option>
            </select>
          </fieldset>
          <fieldset>
            <label for="price">Nuevo Precio</label>
            <input type="number" name="" id="price" onkeydown="quitarBorde(this)">
          </fieldset>
          <fieldset>
            <label for="img">Imagen</label>
            <input type="file" name="" value="" id="img" onkeydown="quitarBorde(this)">
          </fieldset>
          <fieldset>
            <label for="desc">Descripcion</label>
            <textarea id="desc" name="name" rows="8" cols="80"></textarea>
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
    // function quitarBorde(event){
    //   event.style = "boder: 1px grey solid";
    // }
    </script>
  </body>
</html>
