<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once "dbCon.php";

class Suplement{
    //the data base data
    public $SuppID;
    public $Price;
    public $QTY;
    public $Name;
    public $Type;
   
    

    public static function listSuplement(){
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `equipment`";
        $res = $conn->query($sql);

        while($row = $res->fetch_assoc()){
            $product = new User();
            $product->SuppID = $row['SuppID'];
            $product->Price = $row['Price'];
            $product->QTY = $row['QTY'];
            $product->Name = $row['Name'];
            $product->Type = $row['Type'];
           

            array_push($list, $product);
        }

        return $list;
    }

    function updateSuplement($post){
        global $conn;

        $sql = "UPDATE `suplement` SET `Price` = '".$post['Price']
        ."', `QTY` = '".$post['QTY']
        ."', `Name` = '".$post['Name']
        ."', `Type` = '".$post['Type']
        ."' WHERE `suplement`.`SuppID` = '" .$post['SuppID']. "';";
        $conn->query($sql);

       

    }
    function deleteSuplement($post){
        global $conn;

        $sql = "DELETE FROM `suplement` WHERE `Price` = '".$post['Price']."'
        AND `QTY` = '".$post['QTY']."' 
        AND `Name` = '".$post['Name']."'
        AND `Type` = '".$post['Type']."'
        AND  `suplement`.`SuppID` = '".$post['SuppID'] . "';";
        $conn->query($sql);

    }
    function addSuplement($conn, $post) {//does not work 
        $sql = "INSERT INTO `suplement` (`Price`, `QTY`, `Name`, `Type`) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("ssss", $post['Price'], $post['QTY'], $post['Name'], $post['Type']);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error preparing SQL statement: " . $conn->error;
        }
    }
}



?>