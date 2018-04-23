<?php

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

$table = App::getInstance()->getTable('Categorie');

if(!empty($_POST))
{
	$result = $table->create([
		'titre' => $_POST['titre']
	]);

	if($result)
	{
		header('Location: admin.php?p=categories.show');
	}
}

$form = new BootstrapForm($_POST);

?>

<form method="post">
	<?= $form->input('titre', 'Categorie'); ?>
	<?= $form->submit(); ?>
</form>