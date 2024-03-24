<?php session_start(); ?>

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
                <div class="row">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Description de l'application
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus laoreet enim eget justo condimentum semper. Vivamus finibus vehicula posuere. Suspendisse potenti. Praesent non nisl ac dolor ultrices congue. Donec vitae tellus ac mi tristique eleifend. Donec in tortor aliquet, tempus tortor ut, porta tortor. Phasellus facilisis pharetra laoreet. Proin in cursus est, non convallis sapien. Integer metus mi, pellentesque finibus suscipit sed, congue nec nisi. Curabitur accumsan, diam vitae mollis rhoncus, nulla turpis fermentum turpis, ac pulvinar dui felis sit amet sapien. Integer 
                                nec dictum urna, quis sodales libero. Aliquam turpis nisl, mattis in elit quis, molestie interdum sapien.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Concepteurs
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <ul>
                                    <li>Michel Sagbo</li>
                                    <li>Abderahmane Hamim</li>
                                    <li>Karim Benmassaoud</li>
                                    <li>Saad Rachid</li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                               Encadrant
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <ul>
                                    <li>Nordine Zidane</li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        </div>
                     </div>
                <div class="row position-absolute bottom-0 w-100 ">
                    <?php include_once('footer.php'); ?>
                </div>
          </div>
       

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>