<?php
   if(!empty($_GET['id'])) {
       //require connection
       require_once 'includes/db.php';
       $id = $_GET['id'];
       $del_query = "DELETE FROM `restaurants` WHERE id='".$id."'";
       $result = mysqli_query($conn, $del_query);
       if($result) {
           header('location:/it330azure/index.php?msg=del');
       }
   }



?>
