<?php session_start(); 
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="HeaderFooter.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        
	    <title>A propos</title>
    </head>
    <body>
        
      <div class="container">
                <div class="row">
                    <?php include_once('header.php'); ?>
                </div>
                <div class="row"><p class=" fw-bolder fs-3 text-center">Commentaires et avis</p></div>
                <div class="row d-flex flex-column align-items-center">
                <?php
                                    try {
                                        $select = $bdd->prepare(
                                            'SELECT  comment, username from commentaire,users where commentaire.id= users.id '
                                        );
                                        $select->execute(array());
                                        $comments=$select->fetch();
                                    } catch (Exception $e) {
                                        die('Erreur : ' . $e->getMessage());
                                    } 
                                    $row=$select->rowCount();
                                    if($row==0){
                                        ?> <div> Aucun commentaire ou avis***</div>
                                    <?php } else{
                                         while ($comments=$select->fetch()){ ?>
                                            <div class="card w-75  mt-1" >
                                                <div class="card-body">
                                                    
                                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $comments['username']; ?></h6>
                                                    <p class="card-text"><?php echo $comments['comment']; ?></p>
                                                    
                                                </div>
                                            </div>
     
                                            
                                            <?php } ?>
    
                                        
                                    <?php }?>
                </div>
                <div class="row position-absolute bottom-0 w-100">
                    <?php include_once('footer.php'); ?>
                </div>
          </div>
       

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>