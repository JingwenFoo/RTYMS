<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/ApplicationLayer/template/libs/database.php';

class registerModel{
    public $servProvID, $spName, $spUsername, $spPassword, $spType, $spEmail, $spAddress, $spPhone, $ssm, $spImage, $target_dir, $target_file, $imageFileType, $extensions_arr, $oldphoto, $runnerID, $runnerName, $runnerUsername, $runnerPassword, $runnerPhone, $vehicleType, $vehiclePlate;

    //register new sp
    function addSP(){

        if(in_array($this->imageFileType,$this->extensions_arr)){

        $sql = "insert into serviceprovider( spName, spUsername, spPassword, spType, spEmail, spAddress, spPhone, ssm, spImage) values(:spName, :spUsername, :spPassword, :spType, :spEmail, :spAddress, :spPhone, :ssm, :spImage)";

        $args = [':spName'=>$this->spName, ':spUsername'=>$this->spUsername, ':spPassword'=>$this->spPassword, ':spType'=>$this->spType, ':spEmail'=>$this->spEmail, ':spAddress'=>$this->spAddress, ':spPhone'=>$this->spPhone, ':ssm'=>$this->ssm,':spImage'=>$this->spImage];

        //Upload file
        move_uploaded_file($_FILES['photoFile']['tmp_name'], $this->target_dir.$this->spImage);
 
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
        }
    }

    //add runner
    function addRunner(){

        $sql = "insert into runner (runnerName, runnerUsername, runnerPassword, runnerPhone, vehicleType, vehiclePlate) values(:runnerName, :runnerUsername, :runnerPassword, :runnerPhone, :vehicleType, :vehiclePlate)";

        $args = [':runnerName'=>$this->runnerName, ':runnerUsername'=>$this->runnerUsername, ':runnerPassword'=>$this->runnerPassword, ':runnerPhone'=>$this->runnerPhone, ':vehicleType'=>$this->vehicleType, ':vehiclePlate'=>$this->vehiclePlate ];

        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    //view all new sp for admin
    function viewallSP(){
        $sql = "SELECT * FROM serviceprovider WHERE approved='0'";
        return DB::run($sql);
    }

    //view all active sp for admin
    function viewallSPs(){
        $sql = "SELECT * FROM serviceprovider WHERE approved='1'";
        return DB::run($sql);
    }
    //view all new runner for admin
    function viewAllRunner(){
        $sql = "SELECT * FROM runner WHERE approved='0'";
        return DB::run($sql);
    }
    //view all active runner for admin
    function viewAllRunners(){
        $sql = "SELECT * FROM runner WHERE approved='1'";
        return DB::run($sql);
    }

    //view specific sp for admin
    function viewSP(){
        $sql = "SELECT * FROM serviceprovider WHERE servProvID=:servProvID";
        $args = [':servProvID'=>$this->servProvID];
        return DB::run($sql,$args);
    }

    //view specific runner for admin
    function viewRunner(){
        $sql = "SELECT * FROM runner";
        return DB::run($sql);
    }

    //view  medical sp profile  
    function viewMedSP(){
        $sql = "SELECT * FROM serviceprovider where spType='Medical'";
        return DB::run($sql);
    }

    //view  pet sp profile  
    function viewPetSP(){
        $sql = "SELECT * FROM serviceprovider where spType='Pet'";
        return DB::run($sql);
    }
    
    //view  food sp profile  
    function viewFoodSP(){
        $sql = "SELECT * FROM serviceprovider where spType='food'";
        return DB::run($sql);
    }
    
    //view  good sp profile  
    function viewGoodSP(){
        $sql = "SELECT * FROM serviceprovider where spType='good'";
        return DB::run($sql);
    }

    //edit sp profile
    function modifySP(){

        if(empty($_FILES['photoFile']['tmp_name'])){
        $sql = "UPDATE serviceprovider SET spName=:spName, spUsername=:spUsername, spPassword=:spPassword, spType=:spType, spEmail=:spEmail, spAddress=:spAddress, spPhone=:spPhone, ssm=:ssm WHERE servProvID=:servProvID";
        $args = [':servProvID'=>$this->servProvID,':spName'=>$this->spName, ':spUsername'=>$this->spUsername, ':spPassword'=>$this->spPassword, ':spType'=>$this->spType, ':spEmail'=>$this->spEmail, ':spAddress'=>$this->spAddress, ':spPhone'=>$this->spPhone, ':ssm'=>$this->ssm];
        }else{
            if(in_array($this->imageFileType, $this->extensions_arr)){
                $sql = "UPDATE serviceprovider SET spName=:spName, spUsername=:spUsername, spPassword=:spPassword, spType=:spType, spEmail=:spEmail, spAddress=:spAddress, spPhone=:spPhone, ssm=:ssm, spImage=:spImage  WHERE servProvID=:servProvID";
                $args = [':servProvID'=>$this->servProvID,':spName'=>$this->spName, ':spUsername'=>$this->spUsername, ':spPassword'=>$this->spPassword, ':spType'=>$this->spType, ':spEmail'=>$this->spEmail, ':spAddress'=>$this->spAddress, ':spPhone'=>$this->spPhone, ':ssm'=>$this->ssm, ':spImage'=>$this->spImage];


                //unlink("../image2wbmp(image)e/".$this->oldphoto);
                unlink("../../../ApplicationLayer/template/image/".$this->oldphoto);

                //Upload file
                move_uploaded_file($_FILES['photoFile']['tmp_name'], $this->target_dir.$this->spImage);
            }
        }

        return DB::run($sql,$args);
    }

    //edit runner profile
    function modifyRunner(){

        $sql = "UPDATE runner SET runnerName=:runnerName, runnerUsername=:runnerUsername, runnerPassword=:runnerPassword, runnerPhone=:runnerPhone, vehicleType=:vehicleType, vehiclePlate=:vehiclePlate  WHERE runnerID=:runnerID";
        $args = [':runnerID'=>$this->runnerID,':runnerName'=>$this->runnerName, ':runnerUsername'=>$this->runnerUsername, ':runnerPassword'=>$this->runnerPassword, ':runnerPhone'=>$this->runnerPhone, ':vehicleType'=>$this->vehicleType, ':vehiclePlate'=>$this->vehiclePlate];
        return DB::run($sql,$args);
    }

    //sp approval by admin
    function spApproved(){

        $sql = "UPDATE serviceprovider SET approved=:approved WHERE servProvID=:servProvID";
        $args = [':servProvID'=>$this->servProvID,':approved'=>$this->approved];
        return DB::run($sql,$args);
    }

    //sp approval by admin
    function runnerApproved(){

        $sql = "UPDATE runner SET approved=:approved WHERE runnerID=:runnerID";
        $args = [':runnerID'=>$this->runnerID,':approved'=>$this->approved];
        return DB::run($sql,$args);
    }


    //delete sp for admin
    function deleteSP(){
        $sql = "DELETE FROM serviceprovider WHERE servProvID=:servProvID";
        $args = [':servProvID'=>$this->servProvID];
        return DB::run($sql,$args);
    }

    //delete runner for admin
    function deleteRunner(){
        $sql = "DELETE FROM runner WHERE runnerID=:runnerID";
        $args = [':runnerID'=>$this->runnerID];
        return DB::run($sql,$args);
    }

}
?>
