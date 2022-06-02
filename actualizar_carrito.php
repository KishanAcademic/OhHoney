<?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] ==='POST'){
        require 'funciones.php';
        $Id = $_POST['Id'];
        $cantidad = $_POST['cantidad'];

        if(is_numeric($cantidad)){

            if(array_key_exists($Id, $_SESSION['carrito'])){
                actualizarPrenda($Id, $cantidad);

                print '<pre>';
                print_r($_POST);
            }
        }
        header('Location: carrito.php');
    }


?>