<?php
require('actions/database.php');
//validation du form
if (isset($_POST['validate'])) {
    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {

        $question_title = htmlspecialchars($_POST['title']);
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('d/m/Y');
        $question_id_author = $_SESSION['id'];
        $question_id_pseudo = $_SESSION['pseudo'];

        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions(title,description,contenu,id_auteur,pseudo_auteur,date_publication) VALUES (?,?,?,?,?,?)');
        $insertQuestionOnWebsite->execute(array($question_title, $question_description,  $question_content,  $question_id_author, $question_id_pseudo, $question_date));

        $succesMsg = "Votre question a bien été sur le site";
    } else {
        $errorMsg = "Veuillez remplir tous les champs";
    }
}
