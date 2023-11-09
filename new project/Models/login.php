<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once "dbCon.php";
class User{
    //the data base data
    public $userId;
    public $fName;
    public $lName;
    public $Email;
    public $Username;
    public $Password;
    public $Address;
    public $Postal_Code;
    public $Phone_No;
    public $isNew;

    
    function loginUser($post) {
        global $conn;
    
        $username = $post['username'];
        $password = md5($post['pass']);
    
        $sql = "SELECT * FROM user WHERE Username = ? AND Password = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
    
            $result = $stmt->get_result();
            $stmt->close();
    
            if ($result->num_rows == 1) {
                // Login successful
                echo "Login successful"; // Debugging statement
                return true;
            } else {
                // Login failed
             // Debugging statement
                return false;
            }
        } else {
            // Handle prepared statement creation error
            echo "Error: " . $conn->error;
        }
    }
    
    

}

?>