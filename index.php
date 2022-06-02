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

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="navbar-brand" href="#">
                        <img src="assets/imgs/logo.png" width="" height="30">
                    </a>
                                       
                </ul>
                <form class="d-flex" id="carritoindex"role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <a href="carrito.php" class="btn btn-outline-success">Carrito<span class="badge"><?php print cantidadPrendas(); ?></span></a>
                </form>
            </div>
        </div>
    </nav>

    <div class="w-100 p-3" id="main">
        <div class="d-flex" id="cajaprendasindex">
            <?php
                require 'vendor/autoload.php';
                $prenda = new ohhoney\Prenda;
                $info_prendas = $prenda->mostrar();
                $cantidad = count($info_prendas);
                if($cantidad>0){
                    for($x=0; $x<$cantidad; $x++){
                        $item = $info_prendas[$x];
            ?>
            <div class="col-md-3">
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
                    <a href="#" class="btn btn-default">$ <?php print $item['precio']?>K</a>
                </div>
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