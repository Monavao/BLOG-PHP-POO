<?php

use Core\Auth\DBAuth;

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

//Auth
$app = App::getInstance();

$auth = new DBAuth($app->getDb());

if(!$auth->logged())
{
	$app->forbidden();
}

ob_start();

if($p === 'home')
{
	require ROOT . '/pages/admin/posts/index.php';
}
elseif($p === 'posts.edit')
{
	require ROOT . '/pages/admin/posts/edit.php';
}
elseif($p === 'posts.delete')
{
	require ROOT . '/pages/admin/posts/delete.php';
}
elseif($p === 'posts.add')
{
	require ROOT . '/pages/admin/posts/add.php';
}
elseif($p === 'posts.show')
{
	require ROOT . '/pages/admin/posts/show.php';
}
elseif($p === 'posts.categorie')
{
	require ROOT . '/pages/admin/posts/categorie.php';
}

$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';