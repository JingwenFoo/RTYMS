<?php
require_once '../libs/database.php';

class studentModel{
    public $studname, $ic, $phone, $class, $image, $size, $type, $fName, $mName, $fIC, $mIC, $eName, $ePhone, $eRel, $target_dir, $target_file, $imageFileType, $extensions_arr, $oldphoto;

    function addStud(){

        if(in_array($this->imageFileType,$this->extensions_arr)){

        $sql = "insert into student(studname, ic, phone, gender, class, image, fName, fIC, mName, mIC, eName, eRel, ePhone) values(:studname, :ic, :phone, :gender, :class, :image, :fName, :fIC, :mName,  :mIC, :eName, :eRel, :ePhone )";
        $args = [':studname'=>$this->studname, ':ic'=>$this->ic, ':phone'=>$this->phone, ':gender'=>$this->gender, ':class'=>$this->class, ':image'=>$this->image, ':fName'=>$this->fName, ':fIC' =>$this->fIC, ':mName'=>$this->mName, ':mIC' =>$this->mIC, ':eName'=>$this->eName, ':eRel' =>$this->eRel, ':ePhone' =>$this->ePhone];

        //Upload file
        move_uploaded_file($_FILES['photoFile']['tmp_name'], $this->target_dir.$this->image);

        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
        }
    }

    function viewallStud(){
        $sql = "select * from student";
        return DB::run($sql);
    }

    function viewStud(){
        $sql = "select * from student where ic=:ic";
        $args = [':ic'=>$this->ic];
        return DB::run($sql,$args);
    }

    function modifyStud(){

        if(empty($_FILES['photoFile']['tmp_name'])){
        $sql = "update student set phone=:phone, gender=:gender, class=:class, eName=:eName, eRel=:eRel, ePhone=:ePhone where ic=:ic";
        $args = [':ic'=>$this->ic, ':phone'=>$this->phone, ':gender'=>$this->gender, ':class'=>$this->class, ':eName'=>$this->eName, ':eRel' =>$this->eRel, ':ePhone' =>$this->ePhone];
        }else{
            if(in_array($this->imageFileType, $this->extensions_arr)){
                $sql = "update student set phone=:phone, gender=:gender, class=:class, image=:image, eName=:eName, eRel=:eRel, ePhone=:ePhone where ic=:ic";
                $args = [':ic'=>$this->ic, ':phone'=>$this->phone, ':gender'=>$this->gender, ':class'=>$this->class, ':image'=>$this->image, ':eName'=>$this->eName, ':eRel' =>$this->eRel, ':ePhone' =>$this->ePhone];


                unlink("../image/".$this->oldphoto);

                //Upload file
                move_uploaded_file($_FILES['photoFile']['tmp_name'], $this->target_dir.$this->image);
            }
        }

        return DB::run($sql,$args);
    }

    function deleteStud(){
        $sql = "delete from student where ic=:ic";
        $args = [':ic'=>$this->ic];
        return DB::run($sql,$args);
    }
}
?>
