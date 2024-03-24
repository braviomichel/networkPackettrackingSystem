<?php session_start();
require_once('config.php');

try {
    $insert = $bdd->prepare(
        'INSERT INTO paquet (dateenreg,emis, recu) VALUES (:dateenreg, :emis, :recu)'
    );
    $insert->execute([
        'dateenreg' => $dateenreg,
        'emis' => $emis,
        'recu' => $recu,
        
    ]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


header('Location:landing.php?valeur=enregistrer');
 ?>
