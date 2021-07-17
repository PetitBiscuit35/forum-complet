<?php
require 'actions/questions/publishQuestionAction.php';
require 'actions/users/securityAction.php'; ?>


<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>

<body>
    <?php include 'includes/nav.php'; ?>
    <br><br>
    <form class="container" method="POST">
        <?php
        if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
        } elseif (isset($successMsg)) {
            echo '<p>' . $successMsg . '</p>';
        }
        ?>

        <div class="mb-3">
            <label class="form-label">Titre de la question</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea type="text" class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Contenu</label>
            <textarea type="text" class="form-control" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>

    </form>

</body>

</html>