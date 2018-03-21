<?php

require '../apps/Autoloader.php';
App\Autoloader::registerShort();

$app = App\App::getInstance();

$posts = $app->getTable('Posts');
var_dump($posts->all());

//$posts = $app->getTable('Categories');

//$app = App\App::getInstance();
//$app->title = "TEST";


//$config = App\Config::getInstance();

//var_dump(App\Config::getInstance());

/*if(isset($_GET['p']))
{
	$p = $_GET['p'];
}
else
{
	$p = 'home';
}

ob_start();

if($p === 'home')
{
	require '../pages/home.php';
}
elseif($p === 'article')
{
	require '../pages/single.php';
}
elseif($p === 'categorie')
{
	require '../pages/categorie.php';
}

$content = ob_get_clean();

require '../pages/templates/default.php';*/