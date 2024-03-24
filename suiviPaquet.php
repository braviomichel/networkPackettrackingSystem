<?php session_start();
$_SESSION['duree']=$_GET['duree'];

header("Refresh:30");

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="HeaderFooter.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <script type='text/javascript' src="https://cdn.rawgit.com/abdmob/x2js/master/xml2json.js"></script>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="jqplot/jquery.jqplot.js"></script>
        <script type="text/javascript" src="jqplot/plugins/jqplot.barRenderer.js"></script>
        <script type="text/javascript" src="jqplot/plugins/jqplot.pieRenderer.js"></script>
        <script type="text/javascript" src="jqplot/plugins/jqplot.categoryAxisRenderer.js"></script>
        <script type="text/javascript" src="jqplot/plugins/jqplot.pointLabels.js"></script>
        <link rel="stylesheet" type="text/css" href="jqplot/jquery.jqplot.css" />
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

        <style>
            table,tr,td,th{
                border:1px solid black;
            }            
        </style>
        
        
        
	    <title>Accueil</title>
    </head>
    <body>
        <div class="container">
      <div class="row"><?php include"header.php" ?></div>
      
           
        
        <!-- <p class="broken"></p>
        <script>
            $.ajax({
            method: "POST",
            url: "suivi.php",
            // data: { text: $("p.unbroken").text() }
            })
            .done(function( response ) {
                $("p.broken").html(response);
            });
        </script> -->

        <input type=hidden id="duree" value= <?php echo $_SESSION['duree']; ?> />
        <script>
            var duree = document.getElementById("duree").value;
            var paquetDuree = JSON.parse("[" + duree + "]");

        </script>
        <p class="broken"></p>
        <script>
            setInterval(() => {
                $.ajax({
            method: "POST",
            url: "suivi.php",
            // data: { text: $("p.unbroken").text() }
            })
            .done(function( response ) {
                $("p.broken").html(response);
            });
                
            }, 30000);
            // setTimeout(() => {
            //     clearInterval(t)
            // }, paquetDuree*60);
           
        </script>





        <?php $emisDonnees=$_SESSION['donnees']['emis'];
        $recuDonnees=$_SESSION['donnees']['recu'];
         
                    function paquetEmis($data) {
                        return implode(",",$data);
                        
                    }
                    function paquetRecus($data) {
                        return implode(",",$data);
                        
                    }
                   
                    $emis=paquetEmis($emisDonnees);
                    $recu = paquetRecus($recuDonnees);
                    
        ?>

        <input type=hidden id="emis" value= <?php echo $emis; ?> />
        <input type=hidden id="recu" value= <?php echo $recu; ?> />
        
        

        <script>
            var emis = document.getElementById("emis").value;
            
            var recu = document.getElementById("recu").value;
            var paquetEmis = JSON.parse("[" + emis + "]");
            var paquetRecus = JSON.parse("[" + recu + "]");
            
            var temps=[];
            for(i=0;i<paquetDuree*60;i+=30){
                temps.push(i);
            }
            
            

        </script>

        <script>
        $(document).ready(function(){
                $.jqplot.config.enablePlugins = true;
                //var s1 = [50000, 60000, 70000, 10000];
                var s1=paquetEmis;
                //var ticks = ['a', 'b', 'c', 'd'];
                
                var ticks = temps;
                plot1 = $.jqplot('chart1', [s1], {
                    // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
                    animate: !$.jqplot.use_excanvas,
                    seriesDefaults:{
                        renderer:$.jqplot.BarRenderer,
                        pointLabels: { show: true }
                    },
                    axes: {
                        xaxis: {
                            renderer: $.jqplot.CategoryAxisRenderer,
                            ticks: ticks
                        }
                    },
                    highlighter: { show: false }
                });
            
                $('#chart1').bind('jqplotDataClick', 
                    function (ev, seriesIndex, pointIndex, data) {
                        $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
                    }
                );
            });
        </script>

<!-- <script>
        $(document).ready(function(){
                $.jqplot.config.enablePlugins = true;
                //var s1 = [50000, 60000, 70000, 10000];
                var s1=paquetRecus;
                //var ticks = ['a', 'b', 'c', 'd'];
                
                var ticks = ["1","2","3","4","5"];
                plot1 = $.jqplot('chart2', [s1], {
                    // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
                    animate: !$.jqplot.use_excanvas,
                    seriesDefaults:{
                        renderer:$.jqplot.BarRenderer,
                        pointLabels: { show: true }
                    },
                    axes: {
                        xaxis: {
                            renderer: $.jqplot.CategoryAxisRenderer,
                            ticks: ticks
                        }
                    },
                    highlighter: { show: false }
                });
            
                $('#chart2').bind('jqplotDataClick', 
                    function (ev, seriesIndex, pointIndex, data) {
                        $('#info2').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
                    }
                );

            });
        </script> -->


            <script>
                $(document).ready(function(){
                    var Points = []; 
                    for (var i=0; i<paquetRecus.length; i++){ 
                        Points.push([temps[i],paquetRecus[i]] ); 
                    } 
                    var plot2 = $.jqplot('chart2', [Points], {  
                        series:[{showMarker:false}],
                        axes:{
                            xaxis:{
                            label:'Temps (en secondes)',
                            labelRenderer: $.jqplot.CanvasAxisLabelRenderer
                            },
                            yaxis:{
                            label:'PaquetsRecus',
                            labelRenderer: $.jqplot.CanvasAxisLabelRenderer
                            }
                        }
                    });
                    $('#chart2').bind('jqplotDataClick', 
                    function (ev, seriesIndex, pointIndex, data) {
                        $('#info2').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
                    }
                );
                    });
            </script>












        <script>
                $(document).ready(function() {


                    var element = $("#screen"); // global variable
                    var getCanvas; // global variable
                    var newData;

                    $("#button").on('click', function() {
                        html2canvas(element, {
                            onrendered: function(canvas) {
                                getCanvas = canvas;
                                var imgageData = getCanvas.toDataURL("image/png");
                                var a = document.createElement("a");
                                a.href = imgageData; //Image Base64 Goes here
                                a.download = "Image.png"; //File name Here
                                a.click(); //Downloaded file
                                console.log(imgageData);


                            }
                        });
                        
                    });


                });
            </script>

       


        <div  class="row w-100">
        
        <div id="screen" class=" mt-5 mb-5 row w-100">
        <div class="text-center fs-3 fw-bolder mt-3 mb-3">Statistiques des paquets</div>
        <div  class="card text-center w-50" >
            
            <div class="card-body">
                <h5 class="card-title">Paquet Emis</h5>
                <table >
                    <tr>
                        <th>Temps(en s)</th>
                        <th>Paquets Emis</th>
                    </tr>
                    <?php $i=0; ?>
                    <?php foreach($emisDonnees as $value){ ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $value ?></td>
                    </tr>
                    <?php $i+=30;}?>
                </table>
            </div>
            
            <div id="chart1" class="specific"></div>
            <div id="info1"></div>
        </div>



        <div class="card text-center w-50" >
            
            <div class="card-body">
                <h5 class="card-title">Paquet Recus</h5>
                <table >
                    <tr>
                        <th>Temps(en s)</th>
                        <th>Paquets Recu</th>
                    </tr>
                    <?php $j=0; ?>
                    <?php foreach($recuDonnees as $value){ ?>
                    <tr>
                        <td><?php echo $j ;?></td>
                        <td><?php echo $value ?></td>
                    </tr>
                    <?php $j+=30;}?>
                </table>
                
            </div>
            <div id="chart2"></div>
            <div id="info2"></div>
            
        </div>
        </div>

        <div class="card text-center mt-5 mb-5">
            <div class="card-header">
                Vous pouvez
            </div>
            <div class="card-body">
                <button id="button" class="btn btn-primary">Enregistrer ces données</button>
                <p class="card-text mt-3">Ou encore</p>
                <a href="landing.php" class="btn btn-primary">Effectuer un nouveau suivi</a>
            </div>
            <div class="card-footer text-muted">
                <?php echo date('l jS \of F Y h:i:s A'); ?>
            </div>
        </div>

        <div class="row">
            <?php include_once('footer.php'); ?>
        </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>