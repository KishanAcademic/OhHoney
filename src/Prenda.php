<?php

namespace ohhoney;

class Prenda{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini');

        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));

    }

    public function registrar($_params){
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

    }
    
    public function actualizar($_params){
        $sql = "UPDATE `prenda` SET `titulo`=:titulo,`descripcion`=:descripcion,`foto`=:foto,`precio`= :precio,`categoria_Id`=:categoria_Id,`fecha`=:fecha WHERE `Id` = :Id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":titulo" => $_params['titulo'],
            ":descripcion" => $_params['descripcion'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
            ":categoria_Id" => $_params['categoria_Id'],
            ":fecha" => $_params['fecha'],
            ":Id" => $_params['Id']
        );
        if($resultado->execute($_array))
            return true;
            
        return false;
    }

    public function eliminar($Id){

        $sql = "DELETE FROM `prenda` WHERE `Id` = :Id";
        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":Id" => $_params['Id']
        );
        if($resultado->execute($_array))
            return true;
            
        return false;
    }

    public function mostrar(){
        $sql = "SELECT prenda.Id, titulo, descripcion, foto, nombre, precio, fecha FROM prenda
        
        INNER JOIN categorias
        ON prenda.categoria_Id = categorias.Id ORDER BY peliculas.Id DESC
        ";
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();
            
        return false;
    }

    public function mostrarPorId($Id){
        $sql = "SELECT * FROM `prenda` WHERE `Id`=:Id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":Id" => $_params['Id']
        );

        if($resultado->execute($_array))
            return $resultado->fetch();
            
        return false;
    }
}