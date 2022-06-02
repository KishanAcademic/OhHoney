<?php
    
    print_r($_POST);
    
    session_start();

    if($_SERVER['REQUEST_METHOD'] ==='POST'){

        require 'funciones.php';
        require 'vendor/autoload.php';

        if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){

            $cliente = new ohhoney\Cliente;
            $_params = array(
                'nombre'=> $_POST['nombre'],
                'apellidos'=> $_POST['apellidos'],
                'email'=> $_POST['email'],
                'telefono'=> $_POST['telefono'],
            );
            $cliente_Id = $cliente->registrar($_params);

            $pedido = new ohhoney\Pedido;
            
            $_params = array(
                'cliente_Id' => $cliente_Id,
                'total' => calcularTotal(),
                'fecha' => date('Y-m-d'),
            );

            $pedido_Id = $pedido->registrar($_params);

            foreach($_SESSION['carrito'] as $indice => $value){
                $_params = array(
                    "pedido_Id" => $pedido_Id,
                    "prenda_Id" => $value['Id'],
                    "precio" => $value['precio'],
                    "cantidad" => $value['cantidad'],
                    
                );

                $pedido->registrarDetalle($_params);
            }

            $_SESSION['carrito'] = array();
            header('Location: gracias.php');

        }   
    }

    
?>