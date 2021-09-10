<!DOCTYPE html>
<html lang="fr">
<head>
<?php
    require_once('Header.php');
?>
</head>
<body>
<h1 class="title my-4">Liste d'articles</h1>
    <div class="card-deck px-4 d-flex flex-wrap">

<?php
    $list = Article::list();
    foreach($list as $article)
    {
?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?=$article->a_title?></h4>
                <h6 class="card-subtitle mb-2 text-muted">An article by <?=$article->a_author?></h6>
                <a href="Read.php/a_id=<?=$article->a_id?>" class="card-link">Lire</a>
                <a href="#!" class="card-link">Modifier</a>
            </div>
        </div>
<?php
    }
?>
    </div>


<?php
    require_once('Footer.php');
?>
</body>
</html>