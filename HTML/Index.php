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
<header>
    <!--Barre Logo-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img class="LogoHeader" src="../Images/LogoBlog/C_EasyLogoBig.png" alt="LogoC_easy"></a>
    <!--button id="SeConnecter" class="btn btn-spazio login telespazio-right" title="Se Connecter" onclick="document.getElementById('id01').style.display='block'">Se Connecter</button--> 

            <!--Pop Up Connexion--
                <div id="id01" class="modal">
                    <form class="modal-content animate" action="/action_page.php" method="post">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <img src="../Images/LogoBlog/C_EasyLogoBig.png" alt="Avatar" class="avatar">
                    </div>

                    <div class="container">
                        <label for="uname"><b>Nom d'utilisateur</b></label>
                        <input type="text" placeholder="Entrer votre identifiant" name="uname" required>

                        <label for="psw"><b>Mot de passe</b></label>
                        <input type="password" placeholder="Entrer votre mot de passe" name="psw" required>
            
                        <button id="Login" type="submit">Se Connecter</button>
                        <label>
                        <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
                        </label>
                    </div>

                    <div class="container">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
                        <span class="psw"><a href="#">Mot de passe oublié?</a></span>
                    </div>
                    </form>
                </div>
            -->
    </nav>

    <!--NavBar-->
    <nav class="navbar navbar-expand-lg navbar sticky-top NavMenu">
        <div class="">
            <a class="navbar-brand">Menu</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link hyperlien" href="#">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hyperlien" href="#">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hyperlien" href="#">Contact</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 searchbutton" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>     
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
    <footer id="Footer" class="footer fixed-bottom" role="contentinfo">
        <div class="footer-links">
            <div class="container" style="visibility: inherit; opacity: 1;">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-notes">
            <div class="container" style="visibility: inherit; opacity: 1;">
                <div class="row">
                    <div class="col-md-8">
                        
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <span>Tous droits réservés C_easy France © 2021&nbsp;</span>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" title="Mentions légales">Mentions légales</a>
                            </li>
                        </ul>  
                    </div>
                    <div class="col-md-4">
                        <div class="social-links list-inline-item">
                            <p>C_easy sur les réseaux:</p>
                            <div class="conteneurA">
                                <a href="#" title="Suivez C_easy sur Twitter" class="social" target="_blank" ><img src="../Images/Social/TwitterLogoNoir.png" alt="social"><div class="fond_TPZ"></div></a>

                                <a href="#" title="Visitez la chaine Youtube de C_easy" class="social" target="_blank" ><img src="../Images/Social/YouTubeLogoNoir.png" alt="social"><div class="fond_TPZ"></div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> 
</body>
</html>