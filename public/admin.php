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
elseif($p === 'categories.show')
{
	require ROOT . '/pages/admin/categories/index.php';
}
elseif($p === 'categories.edit')
{
	require ROOT . '/pages/admin/categories/edit.php';
}
elseif($p === 'categories.delete')
{
	require ROOT . '/pages/admin/categories/delete.php';
}
elseif($p === 'categories.add')
{
	require ROOT . '/pages/admin/categories/add.php';
}

$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';