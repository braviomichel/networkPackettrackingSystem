<?php
session_start();
/*if(!isset($_SESSION['user'])){
        header('Location : index.php');
    }*/
    $_SESSION['donnees']=[
        'titre' => [],
        'emis' => [],
        'recu' => [],
    ];

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="HeaderFooter.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.9/jquery.jqplot.min.js" integrity="sha512-FQKKXM+/7s6LVHU07eH2zShZHunHqkBCIcDqodXfdV/NNXW165npscG8qOHdxVsOM4mJx38Ep1oMBcNXGB3BCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <script type='text/javascript' src="https://cdn.rawgit.com/abdmob/x2js/master/xml2json.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

       
	    <title>Landing</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php include 'headerConnected.php'; ?>
            </div>
            <div class="row style ">
                <div class="row">
                    <p class="text-center fs-2 text-secondary  mt-3 mb-3  w-100">
                        Bienvenue <?php echo strtoupper($_SESSION['user']); ?>
                    </p>
                </div>


                <div class=" row">

                    <div class="card w-50" >
                        <img src="https://picsum.photos/300/100?2" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Effectuer un suivi Statistique</h5>
                            <p class="card-text">Afficher les statistiques des paquets en entree et sortie dans votre ordinateur sur un période donnée</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalSuivi">
                                Suivi
                            </button>
                        </div>
                    </div>
                    <div class="card w-50" >
                        <img src="https://picsum.photos/300/100?1" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Voir les paquets enregistrés</h5>
                            <p class="card-text">Retouvez les dernieres statistiques effectuées via notre application</p>
                            <a href="paquetsEnregistres.php" role="button" class="btn btn-primary ">Voir </a>
                        </div>
                    </div>
                    

                </div>


                    <!-- Modal -->
                    <div class="modal fade" id="ModalSuivi" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Entrez la durée</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action ="suiviPaquet.php" method="get">
                            <select class="form-select" aria-label="Default select example" name ="duree">
                                <option selected value="1">1 min</option>
                                <option value="3">3 min</option>
                                <option value="5">5 min</option>
                                <option value="10">10min</option>
                            </select>
                                      
                            <button type="submit" class="btn btn-primary">Envoyerr</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                        </div>
                    </div>
                    </div>         
            </div>
           

           



           
            <div class="row mt-5">
                <?php include_once 'footer.php'; ?>
            </div>
        </div>






        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>

