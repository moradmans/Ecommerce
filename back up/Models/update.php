<?php
class Update{
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

    function updateUserDetails($post){
        global $conn;
    
        $newEmail = $postData['email'];
        $newUsername = $postData['username'];
        $newPassword = md5($postData['password']); // Ensure proper security measures for handling passwords
        $newFName = $postData['fName'];
        $newLName = $postData['lName'];
        $newAddress = $postData['address'];
        $newPostalCode = $postData['postalCode'];
        $newPhoneNo = $postData['phoneNo'];
    
        // If the user is an admin, update the 'type' field
        if (isset($postData['type'])) {
            $newType = $postData['type'];
            $sql = "UPDATE user SET Email = ?, Username = ?, Password = ?, fName = ?, lName = ?, Address = ?, Postal_Code = ?, Phone_No = ?, type = ? WHERE Username = ?";
            $stmt = $conn->prepare($sql);
    
            if ($stmt) {
                $stmt->bind_param("ssssssssss", $newEmail, $newUsername, $newPassword, $newFName, $newLName, $newAddress, $newPostalCode, $newPhoneNo, $newType, $username);
                $result = $stmt->execute();
                $stmt->close();
    
                return $result;
            } else {
                // Handle prepared statement creation error
                echo "Error: " . $conn->error;
                return false;
            }
        }
    }
}

?>