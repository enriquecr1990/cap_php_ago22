<?php

include_once 'ConfigDB.php';

class BaseDeDatos
{

    private $mysqli;
    private $errores;

    function __construct()
    {
        try{
            $configDB = ConfigDB::getConfig();
            $this->mysqli = new mysqli(
                $configDB['hostname'],
                $configDB['usuario'],
                $configDB['password'],
                $configDB['bd'],
                $configDB['puerto']
            );
            if($this->mysqli->connect_errno){
                $this->errores = $this->mysqli->error_list;
                echo 'hubo un error en la conexion a la BD';die;
            }else{
                $this->errores = array();
            }
        }catch (Exception $ex){
            $this->errores[] = $ex->getMessage();
            echo 'Hubo un error en el servidor';die;
        }
    }

    public function obtenerCatContacto(){
        try{
            $query = $this->mysqli->query("select * from cat_contacto");
            $cat_contacto = array();
            while($registro = $query->fetch_assoc()){
                $cat_contacto[] = $registro;
            }
            return $cat_contacto;
        }catch (Exception $ex){
            return array();
        }
    }

}