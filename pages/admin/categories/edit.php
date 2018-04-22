<?php

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

$table = App::getInstance()->getTable('Categorie');

if(!empty($_POST))
{
	$result = $table->update($_GET['id'], [
		'titre' => $_POST['titre']
	]);

	if($result)
	{
		?>

		<div class="alert alert-success">
			La catégorie a bien été mise à jour.
		</div>

		<?php

		header('Location: admin.php?p=categories.show');
	}
}

$categorie = $table->find($_GET['id']); 
$form = new BootstrapForm($categorie);

?>

<form method="post">
	<?= $form->input('titre', 'Catégorie'); ?>
	<?= $form->submit(); ?>
</form>