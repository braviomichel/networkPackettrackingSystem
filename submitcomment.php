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
