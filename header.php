<?php  
    if(isset($_SESSION['user'])){
        include_once('headerConnected.php');
    }
    else{
        include_once('headerNotConnected.php');
    }

?>
        