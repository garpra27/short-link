<?php

class ShortModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllShorts($idUser)
    {
        $query = "SELECT * FROM shorts WHERE id_user=" . $idUser;
        $stmt = $this->db->connect()->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>