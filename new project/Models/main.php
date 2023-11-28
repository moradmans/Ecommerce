<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once "dbCon.php";
class Main {
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

        $sql = "SELECT * FROM user";
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
    
}

?>
