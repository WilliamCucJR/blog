<?php
require_once '../classes/connection.php'; // Asegúrate de que la ruta sea correcta

// Crear una nueva instancia de la clase de conexión
$db = new conection();

// Obtener la conexión
$conn = $db->getConn();

// Verificar si la conexión se estableció
if ($conn) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error en la conexión a la base de datos.";
}

// Cerrar la conexión
$db->closeConn();
?>