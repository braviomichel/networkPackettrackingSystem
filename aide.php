<?php session_start();
require_once 'config.php';?>

<?php
if (isset($_GET['comment'])){
    $comment=htmlspecialchars($_GET['comment']);
    
    try {
        $select = $bdd->prepare(
            'SELECT id from users where email like ?'
        );
        $select->execute(array(strval($_SESSION['email'])));
        $data=$select->fetch();
        $userId=$data['id'];
        $userId=intval($userId);
        
        $insert = $bdd->prepare(
            'INSERT INTO commentaire (comment, userId) VALUES (:comment, :userId )');
            $insert->execute([
                'comment' => $comment,
                'userId' => $userId,
            ]);
            $a="insertion reussie";
            header('Location:aide.php?value=comment');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>


<?php
if(isset($_GET['value'])){

    ?>
    <div class="offcanvas show offcanvas-bottom" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Commentaire ajouté</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    Vous pouvez voir vos commentaires dans la rubrique Commentaireet avis en cliquant sur le bouton action. Nous vous effectuons un retour si necessaire
  </div>
</div>

 <?php }

?>





<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="HeaderFooter.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        
	    <title>Aide</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php include_once('header.php'); ?>
            </div>
            <div class="row">
                <p>
                    <h1 class="text-center fs-2">Aide</h1>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus laoreet enim eget justo condimentum semper. Vivamus finibus vehicula posuere. Suspendisse potenti. Praesent non nisl ac dolor ultrices congue. Donec vitae tellus ac mi tristique eleifend. Donec in tortor aliquet, tempus tortor ut, porta tortor. Phasellus facilisis pharetra laoreet. Proin in cursus est, non convallis sapien. Integer metus mi, pellentesque finibus suscipit sed, congue nec nisi. Curabitur accumsan, diam vitae mollis rhoncus, nulla turpis fermentum turpis, ac pulvinar dui felis sit amet sapien. Integer nec dictum urna, quis sodales libero. Aliquam turpis nisl, mattis in elit quis, molestie interdum sapien.
                    <br/>
                    Mauris vel nunc tempus, rutrum massa ac, interdum urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed nulla dui, placerat eu dapibus at, fermentum vel nulla. Curabitur at consequat lacus. Fusce pretium, massa quis porta tempus, felis arcu faucibus augue, ac scelerisque lectus tortor eu justo. Vivamus consequat libero in ante tristique varius. Fusce lectus nisl, mollis vel efficitur eu, hendrerit eu dui. Fusce tincidunt orci ac dolor porttitor varius.
                    <br/>
                    Nulla vulputate velit ac efficitur pulvinar. Nunc aliquet semper tortor sit amet malesuada. In hac habitasse platea dictumst. Donec eget mi tempus, facilisis dolor et, ultrices velit. Quisque velit urna, aliquet congue porttitor non, iaculis vitae libero. Duis posuere purus nec rhoncus finibus. Sed fermentum, nisl ut porta sollicitudin, dolor eros congue urna, sit amet gravida turpis eros in augue. Sed non luctus velit.
                    <br/>
                    Suspendisse consequat orci id aliquet dictum. Donec a sapien ipsum. Quisque aliquet viverra molestie. Praesent vitae mauris et dui congue gravida quis vitae ipsum. Quisque vel feugiat diam. Ut at sapien eget augue convallis maximus et id augue. Nulla facilisi. Sed suscipit tortor quis felis ultrices, ac blandit dui rutrum. Curabitur cursus gravida lectus sed accumsan.</p>
                </p>
            </div>

            <?php if(isset($_SESSION['user'])) { ?>
            <div class="row">
            <p>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Laissez un commentaire
                </button>
            </p>
                <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    
                <form action="aide.php" method="get">
                    <div class="text-secondary">
                        <?php echo $_SESSION['user'] ;?><br/>
                        <?php echo $_SESSION['email'] ;?>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Entrez votre message</label>
                        <input type="text" size="150" class="form-control" name="comment" id="comment" required="required" aria-describedby="commentHelp">
                        <div id="commentHelp" class="form-text">Soyez courtois. Votre commentaire après envoi sera affiché et  ne pourra plus être modifié ni supprimé</div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
                </div>
                </div>
            </div>

            <?php }?>
            <div class="row mt-5">
                <?php include_once('footer.php'); ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>