<?php
/*
    print '<pre>';
    print_r($_POST);
    print_r($_FILES);*/
    
    require '../vendor/autoload.php';
    $prenda = new ohhoney\Prenda;


    if($_SERVER['REQUEST_METHOD'] ==='POST'){

        if ($_POST['accion'] ==='Registrar'){

            if(empty($_POST['titulo']))
                exit('Completar titulo');
            
            if(empty($_POST['descripcion']))
                exit('Completar titulo');

            if(empty($_POST['categoria_Id']))
                exit('Seleccionar una Categoria');

            if(!is_numeric($_POST['categoria_Id']))
                exit('Seleccionar una Categoria válida');

            
            $_params = array(
                'titulo'=>$_POST['titulo'],
                'descripcion'=>$_POST['descripcion'],
                'foto'=> subirFoto(),
                'precio'=>$_POST['precio'],
                'categoria_Id'=>$_POST['categoria_Id'],
                'fecha'=> date('Y-m-d')
            );

            $rpt = $prenda->registrar($_params);
            if($rpt)
                header('Location:prenda/index.php');
            else
                print 'error al registrar pelicula';

        }

    }

    
    function subirFoto() {

        $carpeta = __DIR__.'/../upload/';

        $archivo = $carpeta.$_FILES['foto']['name'];

        move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);

        return $_FILES['foto']['name'];


    }

?>





