<?php
require('actions/database.php');

//validation du form
if (isset($_POST['validate'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {

        //données de l'utilisateur 
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        $checkIfUserExists = $bdd->prepare('SELECT *  FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if ($checkIfUserExists->rowCount() > 0) {

            $usersInfos = $checkIfUserExists->fetch();

            //vérifier si le mot de passe est correct
            if (password_verify($user_password, $usersInfos['mdp'])) {

                //création d'une session (authentification)
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['lastname'] = $userInfo['nom'];
                $_SESSION['firstname'] = $userInfo['prenom'];
                $_SESSION['pseudo'] = $userInfo['pseudo'];

                //rediriger l'utilisateur vers la page d'accueil!
                header('Location: index.php');
            } else {
                $errorMsg = "Votre mot de passe est incorrect";
            }
        } else {
            $errorMsg = "Votre pseudo est incorrect";
        }
    } else {
        $errorMsg = "Veuillez compléter tous les champs";
    }
}
