<?php

require('actions/database.php');

$getAllQuestions = $bdd->query('SELECT id, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5 ');

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $userSearch = $_GET['search'];
    //Récupérer toutes les questions qui correspondent à la recherche (en fonction du titre)
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%' . $userSearch . '%" ORDER BY id DESC');
}
