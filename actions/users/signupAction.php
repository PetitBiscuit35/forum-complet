<?php
require('actions/database.php');

//validation du form
if (isset($_POST['validate'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['password'])) {

        //données de l'utilisateur 
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserAlreadyExists->rowCount() == 0) {

            //mettre les infos dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo,nom, prenom, mdp) VALUES( ?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            $getInfosUser = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? and prenom = ? and pseudo = ?');
            $getInfosUser->execute(array($user_lastname, $user_firstname, $user_pseudo));

            $userInfo = $getInfosUser->fetch();

            //création d'une session (authentification)
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['lastname'] = $userInfo['nom'];
            $_SESSION['firstname'] = $userInfo['prenom'];
            $_SESSION['pseudo'] = $userInfo['pseudo'];

            //rediriger l'utilisateur vers la page d'accueil!
            header('Location: index.php');
        } else {
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }
    } else {
        $errorMsg = "Veuillez compléter tous les champs";
    }
}
