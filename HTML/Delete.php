<?php
    require_once('Header.php');
    ArticleController::delete(Article::findById($_POST['a_id']));
?>
<div class="m-5">
    <h1 class="text-danger mx-5">Suppression de l'article en cours...</h1>
    <div class="progress mx-5">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="bar" style="width: 100%"></div>
    </div>
</div>

<script>
    setTimeout(function(){document.location.href="http://localhost/CESI_projet_rentr-e_groupe2/HTML/Articles.php";}, 2000);
</script>
