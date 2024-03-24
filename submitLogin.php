

<?php
session_start();
require_once 'config.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['password']);
    try {
        $check = $bdd->prepare(
            'SELECT username, email, mdp FROM users WHERE email = ?'
        );
        $check->execute(array($email));
        $data = $check->fetch();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $row = $check->rowCount();
    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mdp = hash('sha256', $mdp);
            if ($data['mdp'] == $mdp) {
                $_SESSION['user'] = $data['username'];
                $_SESSION['email']=$data['email'];
                header('Location:landing.php');
            } else {
                header('Location:login.php?login_err=password');
            }
        } else {
            header('Location:login.php?login_err=email');
        }
    } else {
        header('Location:login.php?login_err=already');
    }
} else {
    header('Location:index.php');
}
?>


