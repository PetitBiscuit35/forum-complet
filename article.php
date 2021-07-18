<?php
session_start();
require('actions/questions/showArticleContentAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body>

    <?php include 'includes/nav.php'; ?>
    <br><br>

    <div class="container">


        <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }


        if (isset($question_publication_date)) {
        ?>
            <h3><?= $question_title; ?></h3>
            <hr>
            <p><?= $question_content; ?></p>
            <hr>
            <small><?= '<a href="profile.php?id=' . $question_id_author . '">' . $question_pseudo_author . '</a> ' . $question_publication_date; ?></small>




        <?php
        }
        ?>

    </div>

</body>

</html>