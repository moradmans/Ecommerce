<?php
include_once "Models/information.php";
include_once "dbCon.php";

// information.php (Model)
class InformationModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllUsers() {
        $query = "SELECT * FROM user";
        $result = $this->conn->query($query);

        if ($result === false) {
            // Handle the error (e.g., log it or return an empty array)
            return [];
        }

        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }

    public function updateUser($userID, $fName, $lName, $email, $username, $password, $address, $postalCode, $phoneNo, $isNew, $type) {
        // Implement the logic to update a user in the database
        // You need to sanitize input and use prepared statements to prevent SQL injection
        // This is just a basic example, and you should enhance it for security
        $query = "UPDATE user SET fName=?, lName=?, Email=?, Username=?, Password=?, Address=?, Postal_Code=?, Phone_No=?, isNew=?, type=? WHERE userID=?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            // Handle the error
            return false;
        }

        $stmt->bind_param("ssssssssisi", $fName, $lName, $email, $username, $password, $address, $postalCode, $phoneNo, $isNew, $type, $userID);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
}

?>
