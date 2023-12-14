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
    public function addService($fName, $lName, $Username, $Email,$Job,$Price){
        global $conn;
    
        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO staff (fName, lName, Username, Email, Job, Price) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);

        
        $stmt->bind_param('sssssi', $fName, $lName, $Username, $Email, $Job, $Price);
    
        $result = $stmt->execute();
    
        // Check if the execution was successful
        if ($result) {
            $stmt->close();
            return true; // Assuming you want to return a boolean indicating success
        } else {
            // Handle the error if needed
            echo "Error: " . $stmt->error;
            $stmt->close();
            return false; // Failed to delete gym
        }
        
    }
}
?>