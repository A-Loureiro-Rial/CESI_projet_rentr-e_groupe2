<?php
if (!defined('DB'))
{
    // Models
    require_once 'Models/Article.php';
    require_once 'Models/Category.php';
    require_once 'Models/Comment.php';
    require_once 'Models/User.php';
    // Controllers
    require_once 'Controllers/DB.php';
    require_once 'Controllers/ArticleController.php';
    require_once 'Controllers/CategoryController.php';
    require_once 'Controllers/CommentController.php';
    require_once 'Controllers/UserController.php';

    define('DB', 'mysql:');
    define('HOST', 'host=localhost;');
    define('DBNAME', 'dbname=c_easy_blog');
    define('DBUSER', 'root');
    define('DBKEYPASS', '');
}