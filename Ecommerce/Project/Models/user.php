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
    

    public static function listUsers(){
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `user`";
        $res = $conn->query($sql);

        while($row = $res->fetch_assoc()){
            $product = new User();
            $product->userId = $row['userID'];
            $product->fName = $row['fName'];
            $product->lName = $row['lName'];
            $product->Email = $row['Email'];
            $product->Username = $row['Username'];
            $product->Password = $row['Password'];
            $product->Address = $row['Address'];
            $product->Postal_Code = $row['Postal_Code'];
            $product->Phone_No = $row['Phone_No'];
            $product->isNew = $row['isNew'];

            array_push($list, $product);
        }

        return $list;
    }

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
    function addUsers($conn, $post) {//does not work 
        $sql = "INSERT INTO `user` (`fName`, `lName`, `Email`, `Username`, `Password`, `Address`, `Postal_Code`, `Phone_No`, `isNew`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("sssssssss", $post['fName'], $post['lName'], $post['Email'], $post['Username'], $post['Password'], $post['Address'], $post['Postal_Code'], $post['Phone_No'], $post['isNew']);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error preparing SQL statement: " . $conn->error;
        }
    }
}



?>