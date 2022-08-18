<?php

include_once "modelo/BaseDeDatos.php";

class CatalogosControlador
{

    private $codigoRespuesta;

    function __construct()
    {
        $this->codigoRespuesta = 400;
    }

    public function obtenerCatContacto(){
        try{
            $respuesta['status'] = true;
            $respuesta['msg'] = array(
                'se obtuvo el catalogo correctamente'
            );
            $baseDeDatos = new BaseDeDatos();
            $respuesta['data']['cat_contacto'] = $baseDeDatos->obtenerCatContacto();
            $this->codigoRespuesta = 200;
        }catch (Exception $ex){
            $respuesta['status'] = false;
            $respuesta['msg'] = array('Ocurrio un error en el servidor, favor de intentar mas tarde');
            $respuesta['msg'][] = $ex->getMessage();
            $this->codigoRespuesta = 500;
        }
        return $respuesta;
    }

    public function getCodigoRespuesta(){
        return $this->codigoRespuesta;
    }

}