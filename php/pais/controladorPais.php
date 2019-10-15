<?php
 
require_once 'pais_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $pais = new Pais();
		$resultado = $pais->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $pais = new Pais();
		$resultado = $Pais->nuevo($datos);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;
    case 'borrar':
		$pais = new Pais();
		$resultado = $pais->borrar($datos['codigo']);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $pais = new Pais();
        $pais->consultar($datos['codigo']);

        if($pais->getPais_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $pais->getPais_codi(),
                'pais' => $pais->getPais_nomb(),
                'capi' => $pais->getPais_capi(),
                
                'respuesta' =>'existe'
              
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $pais = new Pais();
        $listado = $pais->lista();        
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
}
?>