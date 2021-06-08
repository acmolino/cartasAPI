<?php
header('Content-type: Application/JSON');
require_once "../api/logica/mazo.php";
require_once "../api/logica/carta.php";


try {
  	$_SESSION['mazoNuevo'] = new Mazo();
    $_SESSION['mazoNuevo']->armarMazo();
    http_response_code(200);
    echo '{"Message" : "Mazo iniciado con exito"}';
 } catch (\Exception $e) {
    http_response_code(500);
    echo '{"Message" : "Error, no se pudo obtener mazo"}';
 }


?>