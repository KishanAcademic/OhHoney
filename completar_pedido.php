<?php

    print_r($_POST);

    session_start();

    if($_SERVER['REQUEST_METHOD'] ==='POST'){

        require 'funciones.php';

        $cliente = new ohhoney\Cliente;

    }

    /*public function registrar($_params){
        $sql = "INSERT INTO `prenda`(`titulo`, `descripcion`, `foto`, `precio`, `categoria_Id`, `fecha`) VALUES (:titulo, :descripcion, :foto, :precio, :categoria_Id, :fecha)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":titulo" => $_params['titulo'],
            ":descripcion" => $_params['descripcion'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
            ":categoria_Id" => $_params['categoria_Id'],
            ":fecha" => $_params['fecha'],
            
        );
        if($resultado->execute($_array))
            return true;
            
        return false;    

    }*/
?>