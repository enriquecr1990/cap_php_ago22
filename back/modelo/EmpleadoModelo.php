<?php

include_once "ModeloBase.php";

class EmpleadoModelo extends ModeloBase
{

    function __construct()
    {
        parent::__construct('empleado');
    }

//    public function obtenerListado(){
//        $db = new BaseDeDatos();
//        return $db->obtenerRegistros('empleado');
//    }

}