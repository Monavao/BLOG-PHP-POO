<?php

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

$postTable = App::getInstance()->getTable('Post');

if(!empty($_POST))
{
	$result = $postTable->delete($_POST['id']);
	header('Location: admin.php');
}