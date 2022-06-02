<?php

    session_start();
    
    if(!isset($_GET['Id']) OR !is_numeric($_GET['Id']))
        header('Location: carrito.php');
    
    $Id = $_GET['Id'];

    if(isset($_SESSION['carrito'])){
        unset($_SESSION['carrito'][$Id]);
        header('Location: carrito.php');

    }else{
        header('Location: index.php');
    }


?>