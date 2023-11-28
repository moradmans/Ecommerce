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
    
    function updateUsers($post){
        global $conn;

        $sql = "UPDATE `user` SET `fName` = '".$post['fName']
        ."', `lName` = '".$post['lName']
        ."', `Email` = '".$post['Email']
        ."', `Username` = '".$post['Username']
        ."', `Password` = '".$post['Password']
        ."', `Address` = '".$post['Address']
        ."', `Postal_Code` = '".$post['Postal_Code']
        ."', `Phone_No` = '".$post['Phone_No']
        ."', `isNew` = '".$post['isNew']
        ."' WHERE `user`.`userId` = '" .$post['userID']. "';";
        $conn->query($sql);

       

    }
    function deleteUsers($post){
        global $conn;

        $sql = "DELETE FROM `user` WHERE `fName` = '".$post['fName']."'
        AND `lName` = '".$post['lName']."' 
        AND `Email` = '".$post['Email']."'
        AND `Username` = '".$post['Username']."'
        AND `Password` = '".$post['Password']."'
        AND `Address` = '".$post['Address']."'
        AND `Postal_Code` = '".$post['Postal_Code']."'
        AND `Phone_No` = '".$post['Phone_No']."'
        AND `isNew` = '".$post['isNew']."' AND  `user`.`userID` = '".$post['userID'] . "';";
        $conn->query($sql);

    }
    function addUsers($post) {
        global $conn;
        $isNew = 1;

        $sql = "INSERT INTO user (fName, lName, Email, Username, Password, Address, Postal_Code, Phone_No, isNew) VALUES (?, ?, ?, ?, md5(?), ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssssssssi", $post['fname'], $post['lname'], $post['email'], $post['username'], $post['pass'], $post['address'], $post['postalCode'], $post['phone'], $isNew);

            if ($stmt->execute()) {
                // Registration successful
                // You may want to add a redirect here
            } else {
                // Handle SQL error
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            // Handle prepared statement creation error
            echo "Error: " . $conn->error;
        }
    }
    
}

?>