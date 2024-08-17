<?php

class posts{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getPostsByUser($intUserId){
        $sql = "SELECT * FROM publicaciones WHERE autor_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $intUserId);
        $stmt->execute();
        $result = $stmt->get_result();

        $posts = array();
        while($row = $result->fetch_assoc()){
            $posts[] = $row;
        }
        return $posts;
    }
}