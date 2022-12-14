<?php

include_once "BaseDeDatos.php";

class ModeloBase extends BaseDeDatos
{

    private $tabla;

    function __construct($nombreTabla)
    {
        parent::__construct();
        $this->tabla = $nombreTabla;
    }

    public function obtenerListado(){
        return $this->obtenerRegistros($this->tabla);
    }

    public function insertar($campos){
        return $this->insertarRegistro($this->tabla,$campos);
    }

    public function actualizar(){

    }

    public function eliminar(){

    }

}