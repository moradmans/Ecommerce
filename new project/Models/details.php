<?php
   class User {
    

    public function getUserDetails($username) {
        global $conn;

        $sql = "SELECT * FROM user WHERE Username = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();

            if ($result->num_rows === 1) {
                $userData = $result->fetch_assoc();
                return $userData;
            } else {
                return null;
            }
        } else {
            // Handle prepared statement creation error
            echo "Error: " . $conn->error;
        }
    }

    public function updateUserDetails($username, $postData) {
        global $conn;
    
        // Implement the logic to update user details in the database
        // Use the $username to identify the user
        // Use the $postData array to get the updated values from the form
    
        // Example: Update the email address, username, and other fields
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
        } else {
            // If the user is not an admin, update without modifying 'type'
            $sql = "UPDATE user SET Email = ?, Username = ?, Password = ?, fName = ?, lName = ?, Address = ?, Postal_Code = ?, Phone_No = ? WHERE Username = ?";
            $stmt = $conn->prepare($sql);
    
            if ($stmt) {
                $stmt->bind_param("sssssssss", $newEmail, $newUsername, $newPassword, $newFName, $newLName, $newAddress, $newPostalCode, $newPhoneNo, $username);
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