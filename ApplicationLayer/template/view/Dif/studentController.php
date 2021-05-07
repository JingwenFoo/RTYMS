<?php
require_once '../model/studentModel.php';

class studentController{

    function add(){
        $student = new studentModel();
        $student->studname = $_POST['studname'];
        $student->ic = $_POST['ic'];
        $student->phone = $_POST['phone'];
        $student->gender = $_POST['gender'];
        $student->class = $_POST['class'];
        $student->image = time().$_FILES['photoFile']['name'];
        $student->fName = $_POST['fName'];
        $student->fIC = $_POST['fIC'];
        $student->mName = $_POST['mName'];
        $student->mIC = $_POST['mIC'];
        $student->eName = $_POST['eName'];
        $student->eRel = $_POST['eRel'];
        $student->ePhone = $_POST['ePhone'];

        //file directory to save image
        $student->target_dir = "../image/";
        //target file to save in directory
        $student->target_file = $student->target_dir . basename($_FILES["photoFile"]["name"]);
        // Select file type
        $student->imageFileType = strtolower(pathinfo($student->target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $student->extensions_arr = array("jpg","jpeg","png","gif");

        if($student->addStud() > 0){
            $message = "Successfully Insert!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../view/index.php';
    </script>";
        }
    }

    function viewAll(){
        $student = new studentModel();
        return $student->viewallStud();
    }

    function viewUser($ic){
        $student = new studentModel();
        $student->ic = $ic;
        return $student->viewStud();
    }



    function editUser(){
        $student = new studentModel();
        list($student->ic, $student->oldphoto) = explode("+", $_POST['data'], 2);
        $student->ic = $_POST['ic'];
        $student->phone = $_POST['phone'];
        $student->gender = $_POST['gender'];
        $student->class = $_POST['class'];
        $student->image = time().$_FILES['photoFile']['name'];
        $student->eName = $_POST['eName'];
        $student->eRel = $_POST['eRel'];
        $student->ePhone = $_POST['ePhone'];


        //file directory to save image
        $student->target_dir = "../image/";
        //target file to save in directory
        $student->target_file = $student->target_dir . basename($_FILES["photoFile"]["name"]);
        // Select file type
        $student->imageFileType = strtolower(pathinfo($student->target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $student->extensions_arr = array("jpg","jpeg","png","gif");

        if($student->modifyStud()){
            $message = "Update Successful!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../view/view.php?ic=".$_POST['ic']."';</script>";
        }
    }

    function delete(){
        $student = new studentModel();
        $student->ic = $_POST['ic'];
        if($student->deleteStud()){
            $message = "Delete successful!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../view/index.php?';</script>";
        }
    }
}
?>
