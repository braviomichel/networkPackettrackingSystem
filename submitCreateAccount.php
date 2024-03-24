<?php
require_once 'config.php';
if (
    isset($_POST['Nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['pseudo']) &&
    isset($_POST['tel']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['password_retype'])
) {
    $Nom = htmlspecialchars($_POST['Nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $tel = htmlspecialchars($_POST['tel']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    try {
        $check = $bdd->prepare(
            'SELECT username, email, mdp FROM users WHERE email = ?'
        );
        $check->execute([$email]);
        $data = $check->fetch();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $row = $check->rowCount();

    if ($row == 0) {
        if (strlen($Nom) <= 30) {
            if (strlen($prenom) <= 50) {
                if (strlen($pseudo) <= 30) {
                    if (strlen($tel) <= 10) {
                        if (strlen($email) <= 50) {
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                if ($mdp == $password_retype) {
                                    $mdp = hash('sha256', $mdp);
                                    try {
                                        $insert = $bdd->prepare(
                                            'INSERT INTO users (nom, prenom, email, username, mdp, telephone) VALUES (:Nom, :prenom, :email,:username, :mdp, :tel)'
                                        );
                                        $insert->execute([
                                            'Nom' => $Nom,
                                            'prenom' => $prenom,
                                            'email' => $email,
                                            'username' => $pseudo,
                                            'mdp' => $mdp,
                                            'tel' => $tel,
                                        ]);
                                    } catch (Exception $e) {
                                        die('Erreur : ' . $e->getMessage());
                                    }
                                    header(
                                        'Location:createAccount.php?reg_err=success'
                                    );
                                } else {
                                    header(
                                        'Location:createAccount.php?reg_err=password'
                                    );
                                }
                            } else {
                                header(
                                    'Location:createAccount.php?reg_err=email'
                                );
                            }
                        } else {
                            header(
                                'Location:createAccount.php?reg_err=email_length'
                            );
                        }
                    } else {
                        header('Location:createAccount.php?reg_err=tel');
                    }
                } else {
                    header('Location:createAccount.php?reg_err=pseudo');
                }
            } else {
                header('Location:createAccount.php?reg_err=prenom');
            }
        } else {
            header('Location:createAccount.php?reg_err=Nom');
        }
    } else {
        header('Location:createAccount.php?reg_err=already');
    }
}

?>
