<?php
 $file = $_FILES["file"];
 $filename = $_FILES["file"]["name"];
 $tempname = $_FILES["file"]["tmp_name"];


   $conn = new mysqli('localhost','root','','issam_database');
   if($conn->connect_error){
      echo "$conn->connect_error";
      die("Connection Failed : ". $conn->connect_error);
   } else {
      $stmt = $conn->prepare("insert into issam_table(file) values(?)");
      $stmt->bind_param("s", $filename);
      $execval = $stmt->execute();
      echo $execval;
      echo "Registration successfully...";
      $stmt->close();
      $conn->close();
   }


move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);
header("Location: microbio.php");
