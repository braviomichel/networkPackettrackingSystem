<?php
 session_start();
 
   if(isset( $_GET['duree'])){
        $duree=htmlspecialchars($_GET['duree']);
        $duree=1;
       

    }
    //else header('Location:landing.php');


               
         
       
               include ('fonctions.php');
               getStatsOntime();
               
  
               // $output=shell_exec('netstat -e');
               // echo "<pre>$output</pre>";               

               ?> 
               