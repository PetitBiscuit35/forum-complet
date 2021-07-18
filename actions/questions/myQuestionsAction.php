<?php

require('actions/database.php');

$getAllmyQuestions = $bdd->prepare('SELECT id, titre, description FROM questions WHERE id_auteur = ?');
$getAllmyQuestions->execute(array($_SESSION['id']));
