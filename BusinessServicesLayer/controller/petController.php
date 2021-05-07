<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/data/itemModel.php';

class petController{

    //add item
    function addItem(){
        $item = new itemModel();
        $item->servProvID =  $_POST['servProvID']; 
        $item->itemName = $_POST['itemName'];
        $item->itemPrice = $_POST['itemPrice'];
        $item->itemQty = $_POST['itemQty'];
        $item->itemType = 'Pet';
        $item->itemDesc = $_POST['itemDesc'];        
        $item->image = time().$_FILES['photoFile']['name'];

        //file directory to save image
        $item->target_dir = "../../../ApplicationLayer/template/image/";
        //target file to save in directory
        $item->target_file = $item->target_dir . basename($_FILES["photoFile"]["name"]);
        // Select file type
        $item->imageFileType = strtolower(pathinfo($item->target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $item->extensions_arr = array("jpg","jpeg","png","gif");

        if($item->addItem() > 0){
            $message = "Successfully Add!";
		echo "<script type='text/javascript'>alert('$message');
		      window.location = '../../../ApplicationLayer/serviceProvider/pet/petSPMain.php'; 
                </script>"; 
        }
    }

    //view all item based on pet
    function viewAll(){
        $item = new itemModel();
        return $item->viewallPetItem();
    }

    //view specific item
    function viewItems($itemID){
        $item = new itemModel();
        $item->itemID = $itemID;
        return $item->viewItem();
    }

    //view item detail for customer
    function viewItemDetail($itemID){
        $item = new itemModel();
        $item->itemID = $itemID;
        return $item->viewItem();
    }


    //edit item
    function editItem(){
        $item = new itemModel();
        list($item->itemID, $item->oldphoto) = explode("+", $_POST['data'], 3);
        $item->itemID = $_POST['itemID'];
        $item->itemName = $_POST['itemName'];
        $item->itemPrice = $_POST['itemPrice'];
        $item->itemQty = $_POST['itemQty'];
        $item->itemDesc = $_POST['itemDesc'];
        $item->image = time().$_FILES['photoFile']['name'];
        


        //file directory to save image
        $item->target_dir = "../../../ApplicationLayer/template/image/";
        //target file to save in directory
        $item->target_file = $item->target_dir . basename($_FILES["photoFile"]["name"]);
        // Select file type
        $item->imageFileType = strtolower(pathinfo($item->target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $item->extensions_arr = array("jpg","jpeg","png","gif");

        if($item->modifyItem()){
            $message = "Update Successful!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../../ApplicationLayer/serviceProvider/pet/petViewItem.php?itemID=".$_POST['itemID']."';</script>";

        }
    }

    //delete specific item
    function deleteItem(){
        $item = new itemModel();
        $item->itemID = $_POST['itemID'];   
        if($item->deleteItem()){
            $message = "Delete successful!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = ''../../../ApplicationLayer/serviceProvider/pet/petSPMain.php?';</script>";    //?servProvID=".$_POST['servProvID']."
        }
    }
}
?>
