<!DOCTYPE html>
<html lang="fr">
<head>
<?php
    require_once('Header.php');
    if (isset($_GET['a_id']))
    {
        $article = Article::findById($_GET['a_id']);
?>
</head>
<body>
    <form action="Read.php?a_id=<?=$article->a_id?>" method="post" class="d-flex flex-column m-5">
        <input type="hidden" name="update" value="<?=$article->a_id?>">
        
        <div class="form-group">
            <label for="a_title">Titre</label>
            <input type="text" class="form-control" name="a_title" id="a_title" placeholder="Titre" value="<?=$article->a_title?>">
        </div>
        <div class="form-group">
            <label for="a_author">Autheur.rice</label>
            <input type="text" class="form-control" name="a_author" id="a_author" placeholder="Autheur.rice" value="<?=$article->a_author?>">
        </div>
        <div class="form-group">
            <label for="a_content">Contenu de l'article</label>
            <textarea name="a_content" id="a_content" placeholder="Tape ton article ici !" class="form-control" cols="30" rows="10"><?=$article->a_content?></textarea>
        </div>
        <div class="form-group d-flex justify-content-around">
            <div class="custom-control custom-radio">
                <input type="radio" id="a_status_true" name="a_status" class="custom-control-input" value="1" <?php if ($article->a_status == true){?>checked<?php } ?>>
                <label class="custom-control-label" for="a_status_true">Activer les commentaires</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="a_status_false" name="a_status" class="custom-control-input" value="0" <?php if ($article->a_status == false){?>checked<?php } ?>>
                <label class="custom-control-label" for="a_status_false">Désactiver les commentaires</label>
            </div>
        </div>
        <div class="form-group d-flex justify-content-around">
            <div class="form-group">
                <input type="submit" value="Valider">
            </div>
            <div class="form-group">
                <input type="reset" value="Restaurer">
            </div>
        </div>

    </form>
<?php
    }
    require_once('Footer.php');
?>
</body>
</html>