
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

  <nav class="navbar navbar-expand-lg" style="background-color: rgb(32, 22, 12)">
    <div class="nav1">
        <a class="navbar-brand" href="../index.php">
        <img src="../assets/imgs/logo2.png"  width="" height="70">
        </a>
    </div>
</nav>

    <div class="w-100 p-3" id="main">
        <div class="main-login">
            <form action="login.php" method="post" >
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
