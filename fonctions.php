<?php


function statistiques() : array {
    file_put_contents("fichier.txt",shell_exec('netstat -e'));
    $myfile=fopen("fichier.txt","r");
    $myData=[];
    $lignes=[];
    while(!feof($myfile)){
        $line=fgets($myfile);
        array_push($lignes,$line);   
    }
    
    $t_lignes=str_split($lignes[5]);
    $t_titre=array_slice($t_lignes,0,21);
    $ltitre=implode("",$t_titre);
    $t_emis_recu=array_slice($t_lignes,34);
    $lt_emis_recu=implode("",$t_emis_recu);


    //modifications
    $valeur=array_slice($t_lignes,22);
    $val = implode("",$valeur);
    $taille = strlen($val);
    $paquetRecu= intval(substr($val,0,$taille/2 +1));
    $p=intval($paquetRecu);
    $paquetEmis= intval(substr($val,$taille/2 +1));



    $myData=[
    'title'=>$ltitre,
    'emis'=>$paquetEmis,
    'recu'=>$paquetRecu
    ];
   
    return $myData;

}





// function getStatsOntime()  {
//     for($compte=0;$compte<5;$compte++){
       
//         $myData=statistiques();
//         $_SESSION['donnees']['titre'][$compte]=$myData['title'];
//         $_SESSION['donnees']['emis'][$compte]=$myData['emis'];
//         $_SESSION['donnees']['recu'][$compte]=$myData['recu'];
//         //file_put_contents("texteee.txt",$_SESSION['donnees']['emis']);


            
//         sleep(5);
//     }
    
// }


function getStatsOntime()  {
   
       
        $myData=statistiques();
        array_push( $_SESSION['donnees']['titre'],$myData['title']);
        array_push( $_SESSION['donnees']['emis'],$myData['emis']);
        array_push( $_SESSION['donnees']['recu'],$myData['recu']);
     
     

            
        
    }
    

?>