<?php

use App\Controller\PostsController;

define('ROOT', dirname(__DIR__));

require ROOT . '/apps/App.php';

App::load();

if(isset($_GET['p']))
{
	$p = $_GET['p'];
}
else
{
	$p = 'home';
}

//ob_start();

if($p === 'home')
{
	$controller = new PostsController();
	$controller->index();
	//require ROOT . '/pages/posts/home.php';
}
elseif($p === 'posts.show')
{
	$controller = new PostsController();
	$controller->show();
	//require ROOT . '/pages/posts/show.php';
}
elseif($p === 'posts.categorie')
{
	$controller = new PostsController();
	$controller->categories();
	//require ROOT . '/pages/posts/categorie.php';
}
elseif($p === 'login')
{
	$controller = new UsersController();
	$controller->login();
	//require ROOT . '/pages/users/login.php';
}

//$content = ob_get_clean();

//require ROOT . '/pages/templates/default.php';