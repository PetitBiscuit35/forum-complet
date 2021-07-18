<?php

require('actions/database.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idOfQuestion = $_GET['id'];

    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if ($checkIfQuestionExists->rowCount() > 0) {
        $questionInfo = $checkIfQuestionExists->fetch();
        if ($questionInfo['id_auteur'] == $_SESSION['id']) {
            $question_title = $questionInfo['titre'];
            $question_description = $questionInfo['description'];
            $question_content = $questionInfo['contenu'];
            $question_date_publication = $questionInfo['date_publication'];

            $question_description = str_replace('/br />', '', $question_description);
            $question_content = str_replace('/br />', '', $question_content);
        } else {
            $errorMsg = "vous n'etes pas l'auteur de cette question";
        }
    } else {
        $errorMsg = "Aucune question n'a été trouvé";
    }
} else {
    $errorMsg = "Aucune question n'a été trouvé";
}
