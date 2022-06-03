<?php



    if($_SERVER['REQUEST_METHOD'] ==='POST'){

        $nombre_usario = $_POST['nombre_usario'];
        $clave = $_POST['clave'];

        require '../vendor/autoload.php';
        $usuario = new ohhoney\Usuario;
        $resultado = $usuario->login($nombre_usario, $clave);

        if($resultado){

            session_start();
            $_SESSION['usario_info'] = array(
                'nombre_usario' => $resultado['nombre_usario'],
                'estado' => 1
            );

            header('Location: dashboard.php');

        }else{

            exit(json_encode(array('estado'=>FALSE,'mensaje'=>'error al inicar sesion')));

        }

    }



?>