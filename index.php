<?php
session_start();
require('actions/questions/showAllQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>

<body>
    <?php include 'includes/nav.php'; ?>
    <br><br>
    <div class="container">
        <form method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>

                <div class="col-4">
                    <button class="btn btn-success" type="submit">Recherche</button>
                </div>

            </div>
        </form>
    </div>
    <br><br>
    <div class="container">
        <?php
        while ($question = $getAllQuestions->fetch()) { ?>
            <div class="card">
                <div class="card-header">
                    <?= $question['titre'] ?>
                </div>
                <div class="card-body">
                    <?= $question['description'] ?>

                </div>
                <div class="card-footer">
                    Publiée par <?= $question['pseudo_auteur'] ?> le <?= $question['date_publication'] ?>


                </div>
            </div>
            <br>

        <?php
        }
        ?>

    </div>
</body>

</html>