<!DOCTYPE html>
<html lang='fr'>
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