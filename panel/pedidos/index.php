<?php
    session_start();

    if(!isset($_SESSION['usario_info']) OR empty($_SESSION['usario_info'])){
        header('Location: ../index.php');
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
                                    <?php print $_SESSION['usario_info']['nombre_usario']?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="cerrar_session.php">Salir</a></li>
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
                    <legend>Listado de Pedidos</legend>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">#Pedido</th>
                            <th scope="col">total</th>
                            <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require '../../vendor/autoload.php';
                                $pedido = new ohhoney\Pedido;
                                $info_pedido = $pedido->mostrar();

                                $cantidad = count($info_pedido);
                                if($cantidad>0){
                                    $c=0;
                                    for($x=0;$x<$cantidad;$x++){
                                        $c++;
                                        $item = $info_pedido[$x];

                            ?>
                   
                            <tr>
                                <th scope="row"><?php print $c?></th>
                                <td><?php print $item['nombre'].'  '.$item['apellidos']?></td>
                                <td><?php print $item['Id']?></td>
                                <td><?php print $item['total']?></td>
                                <td><?php print $item['fecha']?></td>
                                <td>
                                    <a href="ver.php?Id=<?php print $item['Id'] ?>" class="btn btn-primary btn-sm">ver</a>
                                    
                                </td>
                            </tr>
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
                </fieldset>
            </div>

        </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>