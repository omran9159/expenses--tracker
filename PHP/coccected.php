<?php 
 
   $conn =  mysqli_connect('localhost', 'root','' ,'expense tracker');
   if($conn)
   {  echo"";
     
   }
   else{
    die(mysqli_error($conn));

   }
 
?>