<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Oh Honey!</title>

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="../dashboard.php">Hidden brand</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="../prenda/index.php" class="btn btn-light" type="button">Prendas</a>
                </div>
                <div class="d-flex">
                    <li class="active">
                    <a href="index.php" class="btn btn-light" role="button">Pedidos</a>
                    </li>
                </div>
                <div class="d-flex">
                    <div class="collapse navbar-collapse d-flex" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>

        </div>
    </nav>


    <div class="container" id="main">
    <div class="d-flex">
            <div class="col-md-12">
                <fieldset>
                    <?php
                        require '../../vendor/autoload.php';
                        $Id = $_GET['Id'];
                        $pedido = new ohhoney\Pedido;

                        $info_pedido = $pedido->mostrarPorId($Id);
                        $info_detalle_pedido = $pedido->mostrarDetallePorIdPedido($Id);
                    ?>
                    <legend>Informacion de la compra</legend>
                    <div class="form-control">
                        <label>Nombre</label>
                        <input value="<?php print $info_pedido['nombre']?>" type="text" class="form-control">
                        <label>Apellidos</label>
                        <input value="<?php print $info_pedido['apellidos']?>" type="text" class="form-control">
                        <label>Email</label>
                        <input value="<?php print $info_pedido['email']?>" type="text" class="form-control">
                        <label>Fecha</label>
                        <input value="<?php print $info_pedido['fecha']?>" type="text" class="form-control">
                        
                    </div>
                    <hr>Productos comprados</hr>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                            
                                $cantidad = count($info_detalle_pedido);
                                if($cantidad>0){
                                    $c=0;
                                    for($x=0;$x<$cantidad;$x++){
                                        $c++;
                                        $item = $info_detalle_pedido[$x];
                                        $total = $item['precio'] * $item['cantidad']

                            ?>
                   
                            <tr>
                                <th scope="row"><?php print $c?></th>
                                <td><?php print $item['titulo']?></td>
                                <td><?php $foto = '../../upload/'.$item['foto'];
                                if(file_exists($foto)){
                                    ?>
                                    <img src="<?php print $foto;?>" width=50>
                                    <?php }?></td>
                                <td><?php print $item['precio']?></td>
                                <td><?php print $item['cantidad']?></td>
                                <td><?php print $total?></td>
                            </tr>
                            <tr></tr>
                            <?php
                                    }
                                }else{
                            ?>
                            
                            <tr>
                                <td colspan="6">
                                    NO HAY REGISTROS
                                </td>
                            </tr>
                            <?php }?>

                        </tbody>
                    </table>
                    <label>Total de la compra</label>
                        <input value="<?php print $info_pedido['total']?>" type="text" class="form-control">
                </fieldset>
                <br>
                    <div>
                        <a href="index.php" class="btn btn-primary">volver</a>
                        <a href="javascript:;" id="btnImprimir" class="btn btn-danger">imprimir</a>
                    </div>
                </br>                
            </div>


        </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#btnImprimir').on('click',function(){

            window.print();

            return false;

        })
    </script>
</body>

</html>