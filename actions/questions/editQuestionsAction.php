<?php

require('actions/database.php');

if (isset($_POST['validate'])) {
    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {
        $new_questions_title = htmlspecialchars($_POST['title']);
        $new_questions_description = nl2br(htmlspecialchars($_POST['description']));
        $new_questions_content = nl2br(htmlspecialchars($_POST['content']));

        //requete modifier la question
        $editQuestionOnWebSite = $bdd->prepare('UPDATE questions SET titre = ? , description = ? , contenu = ? WHERE id = ?');
        $editQuestionOnWebSite->execute(array($new_questions_title, $new_questions_description, $new_questions_content, $_GET['id']));

        $successMsg = "Votre question a bien été modifié";

        header('Location: my-questions.php');
    } else {
        $errorMsg = "Veuillez remplir tous les champs";
    }
}
