<?php
require_once '../classes/connection.php';

$db = new conection();

$conn = $db->getConn();

if ($conn) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error en la conexión a la base de datos.";
}

$db->closeConn();
