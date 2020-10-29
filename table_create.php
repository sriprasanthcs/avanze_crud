<?php
include 'connection.php';


$sql = "CREATE TABLE mUsers(UserID INT(6) AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30), Email VARCHAR(30), Phone VARCHAR(20), DOB VARCHAR(20),
   Sex VARCHAR(20), CreatedDate VARCHAR(20), ModifiedDate VARCHAR(20) )";
    
    if ($con->query($sql) === TRUE) {
      echo "mUsers Table created successfully";
    } else {
      echo "Error creating table: " . $con->error;
    }
    
    $con->close();
?>