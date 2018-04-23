<?php

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

$categorie = App::getInstance()->getTable('Categorie');

if(!empty($_POST))
{
	$result = $categorie->delete($_POST['id']);
	header('Location: admin.php?p=categories.show');
}