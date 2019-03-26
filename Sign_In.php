<?php
    include_once("Navbar.html");
?>
<br> <br><br>

<link rel="stylesheet" type="text/css" href="css/signin.css">
<div class="container">
<body class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="img/Logo.png" alt="" width="200" height="20%">    
      <h1 class="h3 mb-3 font-weight-normal">Ingresar</h1>
      <label for="inputEmail" class="sr-only">Correo</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Correo electrónico" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recuerdame
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
    </form>
</div>

<?php
    include_once("Footer.html");
?>