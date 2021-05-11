<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/ApplicationLayer/template/libs/database.php';

class itemModel{
    public $itemID, $servProvID, $itemName,  $itemPrice, $itemDesc, $itemQty, $itemType, $image, $target_dir, $target_file, $imageFileType, $extensions_arr, $oldphoto;

    //add item
    function addItem(){

        if(in_array($this->imageFileType,$this->extensions_arr)){

        $sql = "insert into item( servProvID, itemName, itemPrice,  itemQty, itemType, itemDesc, image) values(:servProvID, :itemName, :itemPrice, :itemQty, :itemType, :itemDesc, :image)";
        $args = [':servProvID'=>$this->servProvID, ':itemName'=>$this->itemName, ':itemPrice'=>$this->itemPrice, ':itemQty'=>$this->itemQty, ':itemType'=>$this->itemType,':itemDesc'=>$this->itemDesc, ':image'=>$this->image];

        //Upload file
        move_uploaded_file($_FILES['photoFile']['tmp_name'], $this->target_dir.$this->image);

        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
        }
    }

    //view for medical
    function viewallMedItem(){
        $sql = "SELECT * FROM item WHERE itemType='Medical'";
        return DB::run($sql);
    }

    //view for pet
    function viewallPetItem(){
        $sql = "SELECT * FROM item WHERE itemType='Pet'";
        return DB::run($sql);
    }

    //view for food
    function viewallFoodItem(){
        $sql = "SELECT * FROM item WHERE itemType='Food'";
        return DB::run($sql);
    }

    //view for good
    function viewallGoodItem(){
        $sql = "SELECT * FROM item WHERE itemType='Good'";
        return DB::run($sql);
    }

    //view for specific item
    function viewItem(){
        $sql = "SELECT * FROM item WHERE itemID=:itemID";
        $args = [':itemID'=>$this->itemID];
        return DB::run($sql,$args);
    }

     //view for item detail for customer
    function viewItemDetail(){
        $sql = "SELECT * FROM item LEFT JOIN serviceprovider ON item.servProvID = serviceprovider.servProvID WHERE itemID = :itemID";
        $args = [':itemID'=>$this->itemID];
        return DB::run($sql,$args);
    }

    //view all item for customer
    function viewAll(){
        $sql = "SELECT * FROM item"; 
        return DB::run($sql);
    }
//comment
    //edit item
    function modifyItem(){

        if(empty($_FILES['photoFile']['tmp_name'])){
        $sql = "UPDATE item SET itemName=:itemName, itemPrice=:itemPrice, itemDesc=:itemDesc, itemQty=:itemQty WHERE itemID=:itemID";
        $args = [':itemID'=>$this->itemID,':itemName'=>$this->itemName, ':itemPrice'=>$this->itemPrice, ':itemDesc'=>$this->itemDesc, ':itemQty'=>$this->itemQty];
        }else{
            if(in_array($this->imageFileType, $this->extensions_arr)){
                $sql = "UPDATE item SET itemName=:itemName, itemPrice=:itemPrice, itemQty=:itemQty, itemDesc=:itemDesc, image=:image  WHERE itemID=:itemID";
               // $args = [':itemID'=>$this->itemID,':itemName'=>$this->itemName, ':itemPrice'=>$this->itemPrice, ':itemDesc'=>$this->itemDesc, ':itemQty'=>$this->itemQty, ':image'=>$this->image];

                $args = [':itemID'=>$this->itemID,':itemName'=>$this->itemName, ':itemPrice'=>$this->itemPrice, ':itemQty'=>$this->itemQty, ':itemDesc'=>$this->itemDesc, ':image'=>$this->image];
                unlink("../../../ApplicationLayer/template/image/".$this->oldphoto);

                //Upload file
                move_uploaded_file($_FILES['photoFile']['tmp_name'], $this->target_dir.$this->image);
            }
        }

        return DB::run($sql,$args);
    }

    //delete item
    function deleteItem(){
        $sql = "DELETE FROM item WHERE itemID=:itemID";
        $args = [':itemID'=>$this->itemID];
        return DB::run($sql,$args);
    }
}
?>
