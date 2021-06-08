<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header('Content-type: Application/JSON');
//LAs rutas internas
require_once "logica/mazo.php";
require_once "logica/carta.php";
//La clase para el routeo
require_once 'config/router/autoload.php';

//Inicio el enrutador
$router = new AltoRouter();

//Mi directorio base
$router->setBasePath('/');
session_start();

/**
*
*
*
*/
$router->map('GET', 'iniciarMazo', function() {
  try {
  	$_SESSION['mazoNuevo'] = new Mazo();
    $_SESSION['mazoNuevo']->armarMazo();
    http_response_code(200);
    echo '{"Message" : "Mazo iniciado con exito", "ID" : '.session_id().'}';
  } catch (\Exception $e) {
    http_response_code(500);
    echo '{"Message" : "Error, no se pudo obtener mazo"}';
  }
});

/**
*
*
*
*/
$router->map('GET', 'darCarta', function() { 
  try {
    echo json_encode($_SESSION['mazoNuevo']->mostrarDatos(), JSON_PRETTY_PRINT);
    http_response_code(200);
  } catch (\Exception $e) {
    http_response_code(500);
    echo '{"Message" : "Error al dar la carta"}';
  }
});


/**
*Necesario para el routeo
*
*
*/
$match = $router->match();
if( is_array($match) && is_callable( $match['target'] ) ) {
  call_user_func_array( $match['target'], $match['params'] );
} else {
  // no route was matched
  header( $_SERVER["SERVER_PROTOCOL"] . ' 403 No deberias estar aqui');
}

?>
