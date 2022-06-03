<?php

    session_start();
    require 'funciones.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Oh Honey!</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
    
<nav class="navbar bg-light">
    <div class="nav1">
        <a class="navbar-brand" href="index.php">
        <img src="assets/imgs/logo.png" alt="" width="" height="70">
        </a>
    </div>
    <div class="nav2">
        <a href="carrito.php" class="btn btn-outline-success">Carrito<span class="badge"><?php print cantidadPrendas(); ?></span></a>
        <a href="panel/index.php" class="btn btn-outline-success">Login</a>
    </div>
</nav>
    

    <div class="w-100 p-3" id="main">
        <div class="container-fluid" id="cajaprendasindex">
            <?php
                require 'vendor/autoload.php';
                $prenda = new ohhoney\Prenda;
                $info_prendas = $prenda->mostrar();
                $cantidad = count($info_prendas);
                if($cantidad>0){
                    for($x=0; $x<$cantidad; $x++){
                        $item = $info_prendas[$x];
            ?>
                <div class="card" style="width: 18rem;">
                    <?php $foto = 'upload/'.$item['foto'];
                                if(file_exists($foto)){
                                    ?>
                                    <img src="<?php print $foto;?>" class="img responsive" height="300">
                     <?php }else{?>
                        <img src="assets/imgs/not_found.png" class="img-responsive">
                        <?php }?>
                    <div class="card-body">
                    <h5 class="card-title"><?php print $item['titulo']?></h5>
                    <p class="card-text"><?php print $item['descripcion']?></p>
                    <a href="carrito.php?Id=<?php print $item['Id']?>" class="btn btn-primary"></span> Añadir</a>
                    <a class="btn btn-default">$ <?php print $item['precio']?>K</a>
                    </div>
                </div>


            <?php }
            } else{?>
                
            <?php }?>
            

        </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>