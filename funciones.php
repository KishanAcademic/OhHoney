<?php

function agregarPrenda($resultado, $Id, $cantidad = 1){

    $_SESSION['carrito'][$Id] = array(
        'Id' => $resultado['Id'],
        'titulo' => $resultado['titulo'],
        'foto' => $resultado['foto'],
        'precio' => $resultado['precio'],
        'cantidad' => $cantidad
    );

}

function actualizarPrenda($Id,$cantidad = FALSE){

    if($cantidad){
        $_SESSION['carrito'][$Id]['cantidad'] = $cantidad;
    }else{
        $_SESSION['carrito'][$Id]['cantidad'] +=1;
    }

}

function calcularTotal(){

    $total = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
            $total += $value['precio'] * $value['cantidad'];
        }
    }

    return $total;

}

function cantidadPrendas(){

    $cantidad = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
            $cantidad++;
        }
    }

}

?>