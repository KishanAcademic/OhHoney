<?php

    session_start();
    require 'funciones.php';

    if(isset($_GET['Id']) && is_numeric($_GET['Id'])){
        $Id = $_GET['Id']; 
        require 'vendor/autoload.php';
        $prenda = new ohhoney\Prenda;
        $resultado = $prenda->mostrarPorId($Id);
        
        if(!$resultado)
            header('Location: index.php');


        if(isset($_SESSION['carrito'])){//si el carrito existe
            //si existe la prenda
            if(array_key_exists($Id, $_SESSION['carrito'])){
                actualizarPrenda($Id);
            }else{
                //si la prenda no existe
                agregarPrenda($resultado, $Id);    
            }

        }else{
            //si el carrito no existe
            agregarPrenda($resultado, $Id);
        } 

        
    }
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
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/imgs/logo.png" width="" height="30">
                    </a>
                                       
                </ul>
                <form class="d-flex" id="carritoindex"role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Carrito<ul class="badge"><?php print cantidadPrendas(); ?></ul></button>
                </form>
            </div>
        </div>
    </nav>

    <div class="w-100 p-3" id="main">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prenda</th>
                <th scope="col">Foto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                    $c=0;
                    foreach($_SESSION['carrito'] as $indice => $value){
                        $c++;
                        $total = $value['precio'] *  $value['cantidad']
               
            ?>
                <tr>
                    <form action="actualizar_carrito.php" method="post">
                        <td><?php print $c ?></td>
                        <td><?php print $value['titulo'] ?></td>
                        <td><?php $foto = 'upload/'.$value['foto'];
                                    if(file_exists($foto)){
                                        ?>
                                        <img src="<?php print $foto;?>" class="img responsive" width="50">
                            <?php }else{?>
                            <img src="assets/imgs/not_found.jpg" class="img-responsive" width="50">
                            <?php }?>
                        </td>
                        <td><?php print $value['precio'] ?></td>
                        <td>
                            <input type="hidden" name="Id" class="form-control u-size-100" value="<?php print $value['Id'] ?>">
                            <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad'] ?>">
                        </td>
                        <td>
                            <?php print $total ?>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success btn-xs">Refresh</button>
                            <a href="eliminar_carrito.php?Id=<?php print $value['Id']?>" class="btn btn-danger btn-xs">Eliminar</a>
                        </td>
                    </form>
                </tr>

            <?php }
            }else{
            ?> 
                <tr>
                    <td colspan="7">NO HAY PRODUCTOS EN EL CARRITO</td>
                </tr>
            <?php }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <td colspan="4" class="align-right">Total de la compra</td>
                    <td><?php print calcularTotal(); ?></td>
                </td>
            </tr>
        </tfoot>
        </table>
        <hr>
            <?php
                if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
            ?>
            <div class="container" id="desicioncarrito">
                <a href="index.php" type="button" class="btn btn-dark">Seguir comprando</a>
                <a href="finalizar.php" type="button" class="btn btn-primary">Finalizar compra</a>
            </div>


            <?php
                }

            ?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>