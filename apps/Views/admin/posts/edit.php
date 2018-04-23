<?php

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

$postTable = App::getInstance()->getTable('Post');
$categories = App::getInstance()->getTable('Categorie')->list('id', 'titre');

if(!empty($_POST))
{
	$result = $postTable->update($_GET['id'], [
		'titre' => $_POST['titre'],
		'contenu' => $_POST['contenu'],
		'categorie_id' => $_POST['categorie_id']
	]);

	if($result)
	{
		?>

		<div class="alert alert-success">
			L'article a bien été mis à jour.
		</div>

		<?php
	}
}

$post = $postTable->find($_GET['id']); 
$form = new BootstrapForm($post);

?>

<form method="post">
	<?= $form->input('titre', 'Titre'); ?>
	<?= $form->input('contenu', 'Contenu', ['type' => 'textarea']);?>
	<?= $form->select('categorie_id', 'Catégorie', $categories);?>
	<?= $form->submit(); ?>
</form>