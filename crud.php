<?php
include 'connection.php';
if(isset($_POST['insert'])){
          $name=$_POST['name'];
          $email=$_POST['email'];
          $phone=$_POST['phone'];
          $dob=$_POST['dob'];
          $Sex=$_POST['Sex'];
          $date_created=time();

    $ins=mysqli_query($con,"INSERT INTO mUsers values(DEFAULT,'$name', '$email', '$phone', '$dob', '$Sex', '$date_created', '')");
    
    if ($ins) {
	         echo json_encode(array("statusCode"=>100));
            
          }  
     else {
      
     echo json_encode(array("statusCode"=>101));
     $con->close();
  }
}
if(isset($_POST['update'])){
        $userid=$_POST['userid'];
        $name=$_POST['name'];
          $email=$_POST['email'];
          $phone=$_POST['phone'];
          $dob=$_POST['dob'];
            $Sex=$_POST['Sex'];
      
      $modified=time();
      $upd=mysqli_query($con,"UPDATE  mUsers SET Name='$name', Email='$email', Phone='$phone',
       DOB='$dob', Sex='$Sex', ModifiedDate='$modified' where UserID = '$userid'");
     if ($upd) {
             echo json_encode(array("statusCode"=>100));
              
            }  
       else {
        
       echo json_encode(array("statusCode"=>101));
       $con->close();
    }
  }
      if(isset($_POST['deleteid'])){
      $id = $_POST['deleteid'];
        $del=mysqli_query($con,"DELETE FROM  mUsers where  UserID = '$id'");
        if ($del) {
          echo json_encode(array("statusCode"=>100));
          
        }  
    else {
    
    echo json_encode(array("statusCode"=>101));
    $con->close();
    }

    }

        
		
	
  



    
    
    
    
?>