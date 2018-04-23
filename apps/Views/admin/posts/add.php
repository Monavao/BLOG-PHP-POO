<?php

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

$postTable = App::getInstance()->getTable('Post');
$categories = App::getInstance()->getTable('Categorie')->list('id', 'titre');

if(!empty($_POST))
{
	$result = $postTable->create([
		'titre' => $_POST['titre'],
		'contenu' => $_POST['contenu'],
		'categorie_id' => $_POST['categorie_id']
	]);

	if($result)
	{
		header('Location: admin.php?p=posts.edit&id=' . App::getInstance()->getDb()->lastInsertID());
	}
}

$form = new BootstrapForm($_POST);

?>

<form method="post">
	<?= $form->input('titre', 'Titre'); ?>
	<?= $form->input('contenu', 'Contenu', ['type' => 'textarea']);?>
	<?= $form->select('categorie_id', 'Catégorie', $categories);?>
	<?= $form->submit(); ?>
</form>