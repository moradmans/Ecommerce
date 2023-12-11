<?php
include_once "dbCon.php";

class ClothingModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function displayItems() {
        $query = "SELECT * FROM clothing";
        $result = $this->conn->query($query);

        if ($result === false) {
            // Handle the error (e.g., log it or return an empty array)
            return [];
        }

        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }
}

?>
