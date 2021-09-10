<head>
	<title>C_Easy Blog</title>
	<link rel="icon" href="../Images/LogoBlog/C_EasyLogoIcon.png" type="image/png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../CSS/C_easy.css">
    <?php
        require_once '../env.php';
        $articleliste = Article::list();
        foreach ($articleliste as $tmp)
        {
?>
            <input type="hidden" id="article<?=$tmp->a_id?>" value="<?=$tmp->a_title?>">
<?php
        }
    ?>
</head>
<header>
    <!--Barre Logo-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img class="LogoHeader" src="../Images/LogoBlog/C_EasyLogoBig.png" alt="LogoC_easy"></a>
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
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link hyperlien" href="Articles.php">Articles</a>
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