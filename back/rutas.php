<?php

/**
 * el archivo de rutas es el que va a controlar las peticiones que llegan al back
 * y este va a responder en un JSON (status: t/f, [msg], opcionalmente: data) y el codigo: 200,201, 404, 500
 * control paramentros GET, datos de formulario: paramentros POST
 */

$respuesta_back = array(
    'status' => false,
    'msg' => array(
        'Error, no encontre la peticion solicitada'
    )
);

$parametrosGet = $_GET;

$rutas = new Rutas();
//var_dump($parametrosGet);exit;

if(isset($parametrosGet['peticion']) && $parametrosGet['peticion'] != ''
    && isset($parametrosGet['funcion']) && $parametrosGet['funcion'] != ''){
    //se recibio el parametro peticion y podemos avanzar
    switch ($parametrosGet['peticion']){
        case 'catalogos':
            switch ($parametrosGet['funcion']){
                case 'cat_contacto':
                    $respuesta_back['status'] = true;
                    $respuesta_back['msg'] = array(
                        'se obtuvo el catalogo correctamente'
                    );
                    $respuesta_back['data'] = array(
                        'cat_contacto' => array(
                            ['id' => 1,'nombre' => 'Celular'],
                            ['id' => 2,'nombre' => 'Telefono casa'],
                        )
                    );
                    $rutas->peticion(200,$respuesta_back);
                    break;
                default:
                    $respuesta_back['status'] = false;
                    $respuesta_back['msg'] = array(
                        'No se encontro la funcion del catalogo solicitado'
                    );
                    $rutas->peticion(404,$respuesta_back);
                    break;
            }
            break;
        case 'contacto':
            /**
             * preparar todas las funciones posibles del API rest: consultar registro, agregar registro, modificar y eliminar
             */
            switch ($parametrosGet['funcion']){
                default:
                    $respuesta_back['status'] = false;
                    $respuesta_back['msg'] = array(
                        'No se encontro la funcion del contacto solicitado'
                    );
                    $rutas->peticion(404,$respuesta_back);
                    break;
            }
            break;
            break;
        default:
            $respuesta_back['status'] = false;
            $respuesta_back['msg'] = array(
                'No se encontro la peticion o la funcion solicitada en el GET'
            );
            $rutas->peticion(404,$respuesta_back);
            break;
    }

}else{
    $respuesta_back['status'] = false;
    $respuesta_back['msg'] = array(
        'Error, falta el parametro peticionnnn en la ruta'
    );
    $rutas->peticion(400,$respuesta_back);
}

class Rutas{

    public function peticion($codigoRespuesta,$respuesta){
        http_response_code($codigoRespuesta);
        echo json_encode($respuesta);
    }

}