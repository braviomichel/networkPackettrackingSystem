<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="HeaderFooter.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        
	    <title>Login</title>
    </head>
    <body>

    <?php if (isset($_GET['reg_err'])) {
        $error = htmlspecialchars($_GET['reg_err']);
        switch ($error) { case 'success': ?>
                <div class="alert alert-success">
                  <strong>Succes</strong> Compte créé. Veuillez vous reconnecter
                </div>
                <?php header('Location:login.php'); ?>
              <?php break;case 'password': ?>
                <div class="alert alert-danger">
                    <strong>Error</strong> Mot de passe incorrect
                </div>
              <?php break;case 'email': ?>
                <div class="alert alert-danger">
                    <strong>Error</strong> Mail incorrect
                </div>
              <?php break;case 'email_length': ?>
                   <div class="alert alert-danger">
                     <strong>Error</strong> Mail trop long
                   </div>
                <?php break;case 'tel': ?>
                  <div class="alert alert-danger">
                      <strong>Error</strong> numero trop long
                  </div>
                <?php break;case 'Nom': ?>
                  <div class="alert alert-danger">
                      <strong>Error</strong> Nom trop long
                  </div>
                  <?php break;case 'prenom': ?>
                  <div class="alert alert-danger">
                      <strong>Error</strong> Prenom trop long
                  </div>
                  <?php break;case 'pseudo': ?>
                  <div class="alert alert-danger">
                      <strong>Error</strong> Pseudo trop long
                  </div>
                <?php break;case 'already': ?>
                  <div class="alert alert-danger">
                      <strong>Error</strong> Compte existant
                  </div>
                <?php break;}
    } ?>






    <div class="container">
      <div class="row">
        <?php include_once 'header.php'; ?>
      </div>
      <div class="row">
          <form action ="submitCreateAccount.php" method="post">
            <div class="row">
                <div class="mb-3 col">
                    <label for="Nom" class="form-label">Votre Nom</label>
                    <input type="text" class="form-control" id="Nom" required="required" name="Nom">
                </div>
                <div class="mb-3 col">
                    <label for="prenom" class="form-label">Votre Prenom</label>
                    <input type="text" class="form-control" id="prenom" required="required" name="prenom">
                </div>    
            </div>
            <div class="row">
              <div class="mb-3 col">
                <label for="pseudo" class="form-label">Votre Pseudonyme</label>
                <input type="text" class="form-control" id="pseudo" required="required" name="pseudo">
              </div>
              <div class="mb-3 col">
                <label for="tel" class="form-label">Telephone</label>
                <input type="tel" class="form-control" id="tel" required="required" name="tel">
              </div>
            </div>
        
            <div class="mb-3">
              <label for="email" class="form-label">Votre Adresse Mail</label>
              <input type="email" class="form-control" id="email" required="required" name="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" required="required" name = "password">
            </div>
            <div class="mb-3">
              <label for="password_retype" class="form-label">Retapez votre mot de passe</label>
              <input type="password" class="form-control" id="password_retype" required="required" name = "password_retype">
            </div>
      
            <button type="submit" class="btn btn-primary">Creer un compte</button>
         </form>
      </div>

      <div class="row">
         <p class="text-start">Vous avez déjà un compte? <a style="color:rgb(19, 167, 167);" href ="login.php">Connectez-vous !</a></p>
      </div>
      <div class="row">
        <?php include_once 'footer.php'; ?>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>


















