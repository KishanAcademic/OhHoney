<?php

namespace ohhoney;

class Pedido{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini');

        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));

    }

    public function registrar($_params){
        $sql = "INSERT INTO `pedidos`(`cliente_Id`, `total`, `fecha`) VALUES (:cliente_Id,:total,:fecha)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":cliente_Id" => $_params['cliente_Id'],
            ":total" => $_params['total'],
            ":fecha" => $_params['fecha'],
            
        );
        if($resultado->execute($_array))
            return $this->cn->lastInsertId();
            
        return false;    

    }

    public function registrarDetalle($_params){
        $sql = "INSERT INTO `detalle_pedidos`(`pedido_Id`, `prenda_Id`, `precio`, `cantidad`) VALUES (:pedido_Id,:prenda_Id,:precio,:cantidad)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":pedido_Id" => $_params['pedido_Id'],
            ":prenda_Id" => $_params['prenda_Id'],
            ":precio" => $_params['precio'],
            ":cantidad" => $_params['cantidad'],
            
        );
        if($resultado->execute($_array))
            return $this->cn->lastInsertId();
            
        return false;    

    }

    public function mostrar(){
        $sql = "SELECT p.Id, nombre, apellidos, email, total, fecha FROM pedidos p
        INNER JOIN clientes c ON p.cliente_Id = c.Id ORDER BY p.Id DESC";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
        return $resultado->fetchAll();

        return false;    
    }

    public function mostrarUltimos(){
        $sql = "SELECT p.Id, nombre, apellidos, email, total, fecha FROM pedidos p
        INNER JOIN clientes c ON p.cliente_Id = c.Id ORDER BY p.Id DESC LIMIT 10";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
        return $resultado->fetchAll();

        return false;    
    }


    public function mostrarPorId($Id){
        $sql = "SELECT p.Id, nombre, apellidos, email, total, fecha FROM pedidos p
        INNER JOIN clientes c ON p.cliente_Id = c.Id WHERE p.Id = :Id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':Id'=>$Id
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

    public function mostrarDetallePorIdPedido($Id){
        $sql = "SELECT 
                dp.Id,
                pr.titulo,
                dp.precio,
                dp.cantidad,
                pr.foto
                FROM detalle_pedidos dp INNER JOIN prenda pr ON pr.Id = dp.prenda_Id WHERE dp.pedido_Id = :Id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':Id'=>$Id
        );

        if($resultado->execute($_array))
        return $resultado->fetchAll();

        return false;    
    }

}
?>