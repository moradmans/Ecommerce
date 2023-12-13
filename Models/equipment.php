<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once "dbCon.php";

class Equipment{
    //the data base data
    public $EquipmentID;
    public $Price;
    public $QTY;
    public $Name;
    public $Type;
   
    

    public static function listEquipment(){
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `equipment`";
        $res = $conn->query($sql);

        while($row = $res->fetch_assoc()){
            $product = new User();
            $product->EquipmentID = $row['EquipmentID'];
            $product->Price = $row['Price'];
            $product->QTY = $row['QTY'];
            $product->Name = $row['Name'];
            $product->Type = $row['Type'];
           

            array_push($list, $product);
        }

        return $list;
    }

    function updateEquipment($post){
        global $conn;

        $sql = "UPDATE `equipment` SET `Price` = '".$post['Price']
        ."', `QTY` = '".$post['QTY']
        ."', `Name` = '".$post['Name']
        ."', `Type` = '".$post['Type']
        ."' WHERE `equipment`.`EquipmentID` = '" .$post['EquipmentID']. "';";
        $conn->query($sql);

       

    }
    function deleteEquipment($post){
        global $conn;

        $sql = "DELETE FROM `equipment` WHERE `Price` = '".$post['Price']."'
        AND `QTY` = '".$post['QTY']."' 
        AND `Name` = '".$post['Name']."'
        AND `Type` = '".$post['Type']."'
        AND  `equipment`.`EquipmentID` = '".$post['EquipmentID'] . "';";
        $conn->query($sql);

    }
    function addEquipment($conn, $post) {//does not work 
        $sql = "INSERT INTO `equipment` (`Price`, `QTY`, `Name`, `Type`) VALUES (?, ?, ?, ?)";
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