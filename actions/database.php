<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
} catch (Exception $e) {
    die('une erreur a été trouvée : ' . $e->getMessage());
}
