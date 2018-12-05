<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/all.css">
    <title>Login</title>
  </head>
  <body>
    <div class="login_form">
      <div class="container">
        <h1>Iniciar Sesión</h1>
        <?php if(isset($_GET['success'])){ ?>
          <div style="background:#007d0a;color:white">
            <b>Se ha registrado</b>
            <br>
            Ahora puede iniciar sesion
          </div>
        <?php } ?>
        <?php
        if(isset($_GET['error'])){
        ?>
        <div style="background-color:red">
          <b>Error:</b><?php echo $_GET['error'] ?>
        </div>
      <?php
      }
      ?>
        <button class="option boton facebook" type="button" name="Facebook">Facebook</button>
        <button class="option boton google" type="button" name="Google">Google</button>
        <form action="./php/login.php" method="post" class="login">
          <input type="email" name="email" placeholder="Email" class="login_input">
          <br>
          <input type="password" name="pass" placeholder="Password" class="login_input">
          <br>
          <button id="btnlogin" type="submit" class="boton" name="button">Iniciar Sesion</button>
        </form>
        <button id="registrar" class="boton" type="button" name="Registrar" onclick="alerta()">Registrar</button>
      </div>
    </div>
    <div class="img">

    </div>
    <div id="alerta">
      <button type="button" name="button" id="btnCerrar">
        <i class="fas fa-times"></i>
      </button>
      <h2>Registro:</h2>
      <form id="miForm" method="post" action="./php/registro.php">
        <fieldset>
          <label for="name">Nombre:</label>
          <input id="name" type="text" name="name" value="" placeholder="Nombre" onkeydown="quitarBorde(this)">
        </fieldset>
        <fieldset>
          <label for="ap">Apellido:</label>
          <input id="ap" type="text" name="ap" value="" placeholder="Apellidos" onkeydown="quitarBorde(this)">
        </fieldset>
        <fieldset>
          <label for="email">Email:</label>
          <input id="email" type="email" name="email" value="" placeholder="mail" onkeydown="quitarBorde(this)">
        </fieldset>
        <fieldset>
          <label for="pass">Password:</label>
          <input id="pass" type="password" name="pass1" value="" placeholder="Password" onkeydown="quitarBorde(this)">
        </fieldset>
        <fieldset>
          <label for="confirmPass">Confirmar password:</label>
          <input id="confirmPass" type="password" name="pass2" value="" placeholder="Confirmar Password" onkeydown="quitarBorde(this)">
        </fieldset>
        <button id="btnIngresar" type="submit" name="button">Ingresar</button>
      </form>
    </div>
    <script type="text/javascript">
      var x=0;
      var btnCerrar = document.getElementById("btnCerrar");
      function alerta(){
        var divAlerta = document.getElementById("alerta");
        divAlerta.style = "display:block";
      }
      // function cerrarAlerta(){
      //   var divAlerta = document.getElementById("alerta");
      //   divAlerta.style = "display:none";
      // }
      btnCerrar.addEventListener('click', function(){
        document.getElementById("alerta").style = "display:none";
      });
      // btnCerrar.onclick = function(){
      //   divAlerta.style = "display:none";
      // }
      var miForm = document.getElementById('miForm');
      miForm.addEventListener('submit',function(event){
        var n = document.getElementById('name');
        var ap = document.getElementById("ap");
        var email = document.getElementById('email');
        var pass = document.getElementById("pass");
        var confirmPass = document.getElementById("confirmPass");
        if(n.value.trim()==""){
          n.style = "border: 2px red solid";
          event.preventDefault();
        }
        if(ap.value.trim()==""){
          ap.style = "border: 2px red solid";
          event.preventDefault();
        }
        if(email.value.trim()==""){
          email.style = "border: 2px red solid";
          event.preventDefault();
        }
        if(pass.value.trim()==""){
          pass.style = "border: 2px red solid";
          event.preventDefault();
        }
        if(confirmPass.value.trim()==""){
          confirmPass.style = "border: 2px red solid";
          event.preventDefault();
        }
        if(confirmPass.value.trim()!=pass.value.trim()){
          event.preventDefault();
          alert("Las contrase;as no coinciden");
          pass.style = "border: 2px red solid";
          confirmPass.style = "border: 2px red solid";
        }
      });

      function quitarBorde(event){
        event.style = "boder: 1px grey solid";
      }
    </script>
  </body>
</html>
