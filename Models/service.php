<?php
include_once 'dbCon.php';

class ServiceModel {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function getAllStaffMembers() {
        $query = "SELECT * FROM staff";
        $result = $this->conn->query($query);

        $staffMembers = [];
        while ($row = $result->fetch_assoc()) {
            $staffMembers[] = $row;
        }

        return $staffMembers;
    }

}
?>