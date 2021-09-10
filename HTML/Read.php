<!DOCTYPE html>
<html lang="fr">
<head>
<?php
    require_once('Header.php');
?>
</head>
<body>
<?php
    if(isset($_GET['a_id']))
    {
        $article = Article::findById($_GET['a_id']);
        if (isset($_POST['like']))
        {
            ArticleController::add_one($article, 'a_likes');
            $article->a_likes++;
        }
        else if (isset($_POST['dislike']))
        {
            ArticleController::add_one($article, 'a_dislikes');
            $article->a_dislikes++;
        }
        else
        {
            if (isset($_POST['update']))
            {
                $update = array();
                foreach (Article::INDEXES as $index)
                {
                    if (!in_array($index, Article::DEFAULT) && $_POST[$index] != $article->$index)
                    {
                        $update[$index] = $_POST[$index];
                        $article->$index = $_POST[$index];
                    }
                }
                ArticleController::update($article, $update);
            }
            ArticleController::add_one($article, 'a_views');
            $article->a_views++;
        }
?>
        <div class="card-body mx-5" id="article">
            <h4 class="card-title"><?=$article->a_title?></h4>
            <h6 class="card-subtitle mb-2 text-muted">Un article de <?=$article->a_author?></h6>
            <p class="card-text my-5 py-5">
                <?=$article->a_content?>
            </p>
            
            <h6 class="card-subtitle text-muted">Vu <?=$article->a_views?> fois</h6>
            <div class="d-flex">
                <form action="Read.php?a_id=<?=$article->a_id?>" method="post" class="mx-2 my-1">
                    <input type="hidden" name="like" value=1>
                    <input type="submit" class="btn btn-secondary" value="<?=$article->a_likes?> 👍">
                </form>
                <form action="Read.php?a_id=<?=$article->a_id?>" method="post" class="my-1">
                    <input type="hidden" name="dislike" value=1>
                    <input type="submit" class="btn btn-secondary" value="<?=$article->a_dislikes?> 👎">
                </form>
            </div>
            <div class="d-flex my-2">
                <a href="UpdateArticle.php?a_id=<?=$article->a_id?>" class="btn btn-secondary mx-2">Modifier</a>
                <form action="Delete.php" method="post">
                    <input type="hidden" name="a_id" value="<?=$article->a_id?>">
                    <input type="submit"class="btn btn-secondary" value="Supprimer">
                </form>
            </div>
        </div>
<?php
    }
    require_once('Footer.php');
?>
</body>
</html>