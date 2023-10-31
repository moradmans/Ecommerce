<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once "dbCon.php";

class User{
    //the data base data
    public $StaffID;
    public $fName;
    public $lName;
    public $Username;
    public $Password;
    public $Email;
    public $Permission;
    

    public static function listStaff(){
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `staff`";
        $res = $conn->query($sql);

        while($row = $res->fetch_assoc()){
            $product = new User();
            $product->userId = $row['StaffID'];
            $product->fName = $row['fName'];
            $product->lName = $row['lName'];
            $product->Username = $row['Username'];
            $product->Password = $row['Password'];
            $product->Email = $row['Email'];
            $product->Permission = $row['Permission'];

            array_push($list, $product);
        }

        return $list;
    }

    function updateStaff($post){
        global $conn;

        $sql = "UPDATE `staff` SET `fName` = '".$post['fName']
        ."', `lName` = '".$post['lName']
        ."', `Username` = '".$post['Username']
        ."', `Password` = '".$post['Email']
        ."', `Email` = '".$post['Email']
        ."', `Permission` = '".$post['Permission']
        ."' WHERE `staff`.`StaffID` = '" .$post['StaffID']. "';";
        $conn->query($sql);

       

    }
    function deleteStaff($post){
        global $conn;

        $sql = "DELETE FROM `staff` WHERE `fName` = '".$post['fName']."'
        AND `lName` = '".$post['lName']."' 
        AND `Username` = '".$post['Username']."'
        AND `Password` = '".$post['Password']."'
        AND `Email` = '".$post['Email']."'
        AND `Permission` = '".$post['Permission']."'
        AND  `staff`.`StaffID` = '".$post['StaffID'] . "';";
        $conn->query($sql);

    }
    function addStaff($conn, $post) {//does not work 
        $sql = "INSERT INTO `staff` (`fName`, `lName`, `Username`, `Password`, `Email`, `Permission`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("ssssss", $post['fName'], $post['lName'], $post['Username'], $post['Password'], $post['Email'], $post['Permission']);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error preparing SQL statement: " . $conn->error;
        }
    }
}



?>