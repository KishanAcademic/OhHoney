<?php
    require '../../vendor/autoload.php';
    if(isset($_GET['Id']) && is_numeric($_GET['Id'])){
        $Id = $_GET['Id'];

        $prenda = new ohhoney\Prenda;
        $resultado = $prenda->mostrarPorId($Id);
        /*
        print '<pre>';
        print_r($resultado);
        die;*/

        if(!$resultado)
            header('Location: index.php');

    }else{
        header('Location: index.php');

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
                    <li class="active">
                    <a href="index.php" class="btn btn-light" type="button">Prendas</a>
                    </li>
                </div>
                <div class="d-flex">
                    <a href="../pedidos/index.php" class="btn btn-light" role="button">Pedidos</a>
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


    <div class="container" id="main" >
        <div class="d-flex">
            <div class="col-md-12">
                <form method="post" action="../acciones.php" enctype="multipart/form-data">
                    <input type="hidenn" name="Id" value="<?php print $resultado['Id'] ?>">
                    <div class="mb-3">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="titulo" value="<?php print $resultado['titulo'] ?>"  required>
                    </div>
                    <div class="mb-3">
                        <label>Descripcion</label>
                            <textarea class="form-control" name="descripcion" required>
                                <?php print $resultado['descripcion'] ?>
                            </textarea>
                    </div>
                    <div class="mb-3">
                        <label>Categoria</label>
                            <select class="form-control" name="categoria_Id"aria-label="Default select example">
                                <option value="">Seleccionar categoria</option>
                                <?php
                                        require '../../vendor/autoload.php';
                                        $categoria = new ohhoney\Categoria;
                                        $info_categoria = $categoria->mostrar();
                                        $cantidad = count($info_categoria);
                                        for($x=0;$x<$cantidad;$x++){
                                            $item = $info_categoria[$x];
                                    ?>
                                        <option value="<?php print $item['Id'] ?>"><?php print $item['nombre'] ?></option>
                                    <?php
                                        }

                                    ?>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto">
                        <input type="" name="foto_temp" value="<?php print $resultado['foto'] ?>">
                    </div>
                    <div class="mb-3">
                        <label>Precio</label>
                        <input type="text" class="form-control" name="precio" placeholder="$0,00" value="<?php print $resultado['precio'] ?>" required>
                    </div>
                    
                    <input type="submit" class="btn btn-primary" name="accion" value="Actualizar">
                    <a href="index.php" type="submit" class="btn btn-default">cancelar</a>
                </form>

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