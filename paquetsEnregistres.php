<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="HeaderFooter.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        
	    <title>Accueil</title>
    </head>
    <body>
        <div>
            <div class="row">
            <?php include_once('header.php'); ?>
            </div>
            <div class="row">
                <h1 id="someElement">Paquet enregistrés</h1>
            </div>

            <div class="row">



            <?php
                if(isset($_POST['action'])){
                    if ($_POST['action'] == "function1") { func1(); }
                    
                }
            ?>



            <script>
                var data = { action: 'function1' };

                $.post('paquetsEnregistres.php', data, function(response) {
                    if(response != "") {
                        console.log(response);
                        $('#SomeElement').html(response);
                    }else{
                        alert('Error, Please try again.');
                    }
                });
            </script>
           











            <div class="row">
            <?php include_once('footer.php'); ?>
            </div>
        </div>
        

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>