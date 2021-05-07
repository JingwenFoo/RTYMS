<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/data/registerModel.php';

class registerController{

    //register new sp
    function addSP(){
        $sp = new registerModel();
        $sp->spName  = $_POST['spName'];
        $sp->spUsername = $_POST['spUsername'];
        $sp->spPassword = $_POST['spPassword'];
        $sp->spType = $_POST['spType'];
        $sp->spEmail = $_POST['spEmail'];
        $sp->spAddress = $_POST['spAddress'];
        $sp->spPhone = $_POST['spPhone'];
        $sp->ssm = $_POST['ssm'];
        $sp->spImage = time().$_FILES['photoFile']['name'];

        //file directory to save image
        $sp->target_dir = "../../ApplicationLayer/template/image/";
        //target file to save in directory
        $sp->target_file = $sp->target_dir . basename($_FILES["photoFile"]["name"]);
        // Select file type
        $sp->imageFileType = strtolower(pathinfo($sp->target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $sp->extensions_arr = array("jpg","jpeg","png","gif");

        if($sp->addSP() > 0){
            $message = "Successfully registered as our service provider!";
		echo "<script type='text/javascript'>alert('$message');
		      window.location = '../../ApplicationLayer/home/login.php'; 
                </script>"; 
        }
    }

    //register new runner 
    function addRunner(){
        $sp = new registerModel();
        $sp->runnerName  = $_POST['runnerName'];
        $sp->runnerUsername = $_POST['runnerUsername'];
        $sp->runnerPassword = $_POST['runnerPassword'];
        $sp->runnerPhone = $_POST['runnerPhone'];
        $sp->vehicleType = $_POST['vehicleType'];
        $sp->vehiclePlate = $_POST['vehiclePlate'];

        if($sp->addRunner() > 0){
            $message = "Successfully registered as our runner!";
        echo "<script type='text/javascript'>alert('$message');
              window.location = '../../ApplicationLayer/home/login.php'; 
                </script>"; 
        }
    }

    //view all new sp for admin
    function viewAllSP(){
        $sp = new registerModel();
        return $sp->viewallSP();
    }

    //view all active sp for admin
    function viewAllSPs(){
        $sp = new registerModel();
        return $sp->viewallSPs();
    }

     //view all new runner for admin
    function viewAllRunner(){
        $runner = new registerModel();
        return $runner->viewAllRunner();
    }

    //view all active runner for admin
    function viewAllRunners(){
        $sp = new registerModel();
        return $sp->viewAllRunners();
    }

    //view specific sp for admin
    function viewSPs($servProvID){
        $sp = new registerModel();
        $sp->servProvID = $servProvID;
        return $sp->viewSP();
    }

    //view specific runner
    function viewRunners($runnerID){
        $runner = new registerModel();
        $runner->runnerID = $runnerID;
        return $runner->viewRunner();
    }

    //view med sp profile
    function viewMedSP(){
        $sp = new registerModel();
        return $sp->viewMedSP();
    }

    //view pet sp profile
    function viewPetSP(){
        $sp = new registerModel();
        return $sp->viewPetSP();
    }

    //view food sp profile
    function viewFoodSP(){
        $sp = new registerModel();
        return $sp->viewFoodSP();
    }

    //view good sp profile
    function viewGoodSP(){
        $sp = new registerModel();
        return $sp->viewGoodSP();
    }

    //view runner profile
    function viewRunner(){
        $runner = new registerModel();
        return $runner->viewRunner();
    }    

    //edit med sp profile
    function editMedSP(){
        $sp = new registerModel();
        list($sp->servProvID, $sp->oldphoto) = explode("+", $_POST['data'], 3);
        $sp->servProvID = $_POST['servProvID'];
        $sp->spName  = $_POST['spName'];
        $sp->spUsername = $_POST['spUsername'];
        $sp->spPassword = $_POST['spPassword'];
        $sp->spType = $_POST['spType'];
        $sp->spEmail = $_POST['spEmail'];
        $sp->spAddress = $_POST['spAddress'];
        $sp->spPhone = $_POST['spPhone'];
        $sp->ssm = $_POST['ssm'];
        $sp->spImage = time().$_FILES['photoFile']['name'];
        


        //file directory to save image
        $sp->target_dir = "../../../ApplicationLayer/template/image/";
        //target file to save in directory
        $sp->target_file = $sp->target_dir . basename($_FILES["photoFile"]["name"]);
        // Select file type
        $sp->imageFileType = strtolower(pathinfo($sp->target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $sp->extensions_arr = array("jpg","jpeg","png","gif");

        if($sp->modifySP()){
            $message = "Update Successful!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../../ApplicationLayer/serviceProvider/medical/medViewProfile.php?servProvID=".$_POST['servProvID']."';</script>";
        }
    }

    //edit pet sp profile
    function editPetSP(){
        $sp = new registerModel();
        list($sp->servProvID, $sp->oldphoto) = explode("+", $_POST['data'], 3);
        $sp->servProvID = $_POST['servProvID'];
        $sp->spName  = $_POST['spName'];
        $sp->spUsername = $_POST['spUsername'];
        $sp->spPassword = $_POST['spPassword'];
        $sp->spType = $_POST['spType'];
        $sp->spEmail = $_POST['spEmail'];
        $sp->spAddress = $_POST['spAddress'];
        $sp->spPhone = $_POST['spPhone'];
        $sp->ssm = $_POST['ssm'];
        $sp->spImage = time().$_FILES['photoFile']['name'];
        


        //file directory to save image
        $sp->target_dir = "../../../ApplicationLayer/template/image/";
        //target file to save in directory
        $sp->target_file = $sp->target_dir . basename($_FILES["photoFile"]["name"]);
        // Select file type
        $sp->imageFileType = strtolower(pathinfo($sp->target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $sp->extensions_arr = array("jpg","jpeg","png","gif");

        if($sp->modifySP()){
            $message = "Update Successful!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../../ApplicationLayer/serviceProvider/pet/petViewProfile.php?servProvID=".$_POST['servProvID']."';</script>";
        }
    }

    //edit good sp profile
    function editGoodSP(){
        $sp = new registerModel();
        list($sp->servProvID, $sp->oldphoto) = explode("+", $_POST['data'], 3);
        $sp->servProvID = $_POST['servProvID'];
        $sp->spName  = $_POST['spName'];
        $sp->spUsername = $_POST['spUsername'];
        $sp->spPassword = $_POST['spPassword'];
        $sp->spType = $_POST['spType'];
        $sp->spEmail = $_POST['spEmail'];
        $sp->spAddress = $_POST['spAddress'];
        $sp->spPhone = $_POST['spPhone'];
        $sp->ssm = $_POST['ssm'];
        $sp->spImage = time().$_FILES['photoFile']['name'];
        


        //file directory to save image
        $sp->target_dir = "../../../ApplicationLayer/template/image/";
        //target file to save in directory
        $sp->target_file = $sp->target_dir . basename($_FILES["photoFile"]["name"]);
        // Select file type
        $sp->imageFileType = strtolower(pathinfo($sp->target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $sp->extensions_arr = array("jpg","jpeg","png","gif");

        if($sp->modifySP()){
            $message = "Update Successful!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../../ApplicationLayer/serviceProvider/good/goodViewProfile.php?servProvID=".$_POST['servProvID']."';</script>";
        }
    }

    //edit food sp profile
    function editFoodSP(){
        $sp = new registerModel();
        list($sp->servProvID, $sp->oldphoto) = explode("+", $_POST['data'], 3);
        $sp->servProvID = $_POST['servProvID'];
        $sp->spName  = $_POST['spName'];
        $sp->spUsername = $_POST['spUsername'];
        $sp->spPassword = $_POST['spPassword'];
        $sp->spType = $_POST['spType'];
        $sp->spEmail = $_POST['spEmail'];
        $sp->spAddress = $_POST['spAddress'];
        $sp->spPhone = $_POST['spPhone'];
        $sp->ssm = $_POST['ssm'];
        $sp->spImage = time().$_FILES['photoFile']['name'];
        


        //file directory to save image
        $sp->target_dir = "../../../ApplicationLayer/template/image/";
        //target file to save in directory
        $sp->target_file = $sp->target_dir . basename($_FILES["photoFile"]["name"]);
        // Select file type
        $sp->imageFileType = strtolower(pathinfo($sp->target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $sp->extensions_arr = array("jpg","jpeg","png","gif");

        if($sp->modifySP()){
            $message = "Update Successful!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../../ApplicationLayer/serviceProvider/food/foodViewProfile.php?servProvID=".$_POST['servProvID']."';</script>";
        }
    }

     //edit runner profile
    function editRunner(){
        $runner = new registerModel();
        $runner->runnerID = $_POST['runnerID'];
        $runner->runnerName  = $_POST['runnerName'];
        $runner->runnerUsername = $_POST['runnerUsername'];
        $runner->runnerPassword = $_POST['runnerPassword'];
        $runner->runnerPhone = $_POST['runnerPhone'];
        $runner->vehicleType = $_POST['vehicleType'];
        $runner->vehiclePlate = $_POST['vehiclePlate'];
         if($runner->modifyRunner()){
            $message = "Update Successful!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/runner/runnerViewProfile.php?runnerID=".$_POST['runnerID']."';</script>";
        }
    }

      //approve sp
    function spApproved(){
        $sp = new registerModel();
        $sp->servProvID = $_POST['servProvID'];
        $sp->approved = '1';
         if($sp->spApproved()){
            $message = "Service Provider approved!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/admin/adminMain.php?';</script>";
        }
    }

      //approve runner
    function runnnerApproved(){
        $runner = new registerModel();
        $runner->runnerID = $_POST['runnerID'];
        $runner->approved = '1';
         if($runner->runnerApproved()){
            $message = "Runner approved!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/admin/adminMain2.php?';</script>";
        }
    }

    //delete sp for admin
    function deleteSPs(){
        $sp = new registerModel();
        $sp->servProvID = $_POST['servProvID'];
        if($sp->deleteSP()){
            $message = "Application Rejected!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../../ApplicationLayer/admin/adminMain.php?';</script>";  
        }
    }

        //delete runner for admin
    function deleteRunner(){
        $runner = new registerModel();
        $runner->runnerID = $_POST['runnerID'];
        if($runner->deleteRunner()){
            $message = "Application Rejected!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/admin/adminMain2.php?';</script>";   
        }
    }
}
?>
