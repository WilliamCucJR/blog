<?php
header('Content-Type: application/json');
include_once '../classes/connection.php';
include_once '../classes/posts.php';

$database = new conection();
$conn = $database->getConn();

$posts = new posts($conn);
$postByUser = $posts->getPostsByUser(1);

echo json_encode($postByUser);

$database->closeConn();

?>