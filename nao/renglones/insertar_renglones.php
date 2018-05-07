<?php
require_once 'Renglones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);
    $cot=  Renglones::obtenerUltimoCot();
    $retorno = Renglones::insert(
        $cot['idCotizacion'],
        $body['idProducto'],
        $body['valorUnitario'],
        $body['cantidad'],
        $body['valorTotal']);
    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));
		echo $json_string;
    }
}
?>