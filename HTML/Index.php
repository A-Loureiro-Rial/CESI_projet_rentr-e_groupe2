<!DOCTYPE html>
<html lang='fr'>
<head>
	<title>C_Easy Blog</title>
	<link rel="icon" href="../Images/LogoBlog/C_EasyLogoIcon.png" type="image/png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../CSS/C_easy.css">
    <?php require("../Models/Article.php");
          require("../Models/Category.php");
          require("../Models/Comment.php");
          require("../Models/User.php");
          $article = Article::findById(1);
    ?>
</head>
<?php require "../HTML/Header.php"?>     
<body>
    <br/>
    <h1 class="title">Articles à la une</h1>
    <hr/>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <h2 class="d-block w-100 carousel-content carousel-title" alt="Title"><?=$article->a_title?></h2>
            <div class="d-block w-100 carousel-content" alt="Content"><?=$article->a_content?></div>
        </div>
        <div class="carousel-item">
            <h2 class="d-block w-100 carousel-content carousel-title" alt="Title"><?=$article->a_title?></h2>
            <div class="d-block w-100 carousel-content" alt="Content"><?=$article->a_content?></div>
        </div>
        <div class="carousel-item">
            <h2 class="d-block w-100 carousel-content carousel-title" alt="Title"><?=$article->a_title?></h2>
            <div class="d-block w-100 carousel-content" alt="Content"><?=$article->a_content?></div>
        </div>
    </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon test" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon test" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
    <!--FOOTER-->
    <?php require "../HTML/Footer.php"?> 
</body>
</html>