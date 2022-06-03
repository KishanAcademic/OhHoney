
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Oh Honey!</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
  </head>

  <body>

  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Hidden brand</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        
      </ul>      
    </div>
  </div>
</nav>

    <div class="container" id="main">
        <div class="main-login">
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="usuarioLogin" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="nombre_usario" placeholder="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="passwordLogin" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="clave"  placeholder="clave" required>
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
                </div>
            </form>
        </div>
      
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

  </body>
</html>
