<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once "dbCon.php";

class Product{
    //the data base data
    public $ProductID;
    public $Price;
    public $QTY;
    public $Size;
    public $Type;
    public $Name;
    

    public static function listClothing(){
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `clothing`";
        $res = $conn->query($sql);

        while($row = $res->fetch_assoc()){
            $product = new User();
            $product->ProductID = $row['ProductID'];
            $product->Price = $row['Price'];
            $product->QTY = $row['QTY'];
            $product->Size = $row['Size'];
            $product->Type = $row['Type'];
            $product->Name = $row['Name'];

            array_push($list, $product);
        }

        return $list;
    }

    function updateClothing($post){
        global $conn;

        $sql = "UPDATE `clothing` SET `Price` = '".$post['Price']
        ."', `QTY` = '".$post['QTY']
        ."', `Size` = '".$post['Size']
        ."', `Type` = '".$post['Type']
        ."', `Name` = '".$post['Name']
        ."' WHERE `clothing`.`ProductID` = '" .$post['ProductID']. "';";
        $conn->query($sql);

       

    }
    function deleteClothing($post){
        global $conn;

        $sql = "DELETE FROM `clothing` WHERE `Price` = '".$post['Price']."'
        AND `QTY` = '".$post['QTY']."' 
        AND `Size` = '".$post['Size']."'
        AND `Type` = '".$post['Type']."'
        AND `Name` = '".$post['Name']."'
        AND  `clothing`.`ProductID` = '".$post['ProductID'] . "';";
        $conn->query($sql);

    }
    function addClothing($conn, $post) {//does not work 
        $sql = "INSERT INTO `clothing` (`Price`, `QTY`, `Size`, `Type`, `Name`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("ssssss", $post['Price'], $post['QTY'], $post['Size'], $post['Type'], $post['Name']);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error preparing SQL statement: " . $conn->error;
        }
    }
}



?>