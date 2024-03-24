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

    <?php if (isset($_GET['login_err'])) {
        $err = htmlspecialchars($_GET['login_err']);
        switch ($err) { case 'password': ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Mot de passe incorrect
                            </div>
                        <?php break;case 'email': ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Mail incorrect
                            </div>
                        <?php break;case 'already': ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Compte non existant
                            </div>
                        <?php break;}
    } ?>

   






    <div class="container">
      <div class="row mt-3">
        <?php include_once 'header.php'; ?>
      </div>
      <div class="row">
        <form action ="submitLogin.php" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required="required" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Entrez votre adresse mail</div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" required="required" name = "password">
          </div>
          
          <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
        
      </div>
      <div class="row">
          <p class="text-start">Vous n'avez pas de compte? <a style="color:rgb(19, 167, 167);" href ="createAccount.php ">Créez-en un!</a></p>
          <p class="text-start">Mot de passe oublié? <a style="color:rgb(19, 167, 167);" href="#">Récupérez le</a></p>
      </div>
      <div class="row">
        <?php include_once 'footer.php'; ?>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>








