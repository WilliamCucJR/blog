<?php

class posts
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getPostsByUser($intUserId)
    {
        $sql = "SELECT a.*, b.*, DATE_FORMAT(a.creado_en, '%d-%m-%Y') as creado_en 
                FROM publicaciones a
                INNER JOIN usuarios b ON b.id = a.autor_id 
                WHERE a.autor_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $intUserId);
        $stmt->execute();
        $result = $stmt->get_result();

        $posts = array();
        while ($row = $result->fetch_assoc()) {
            $row['contenido'] = html_entity_decode($row['contenido']);
            $posts[] = $row;
        }
        return $posts;
    }
}
