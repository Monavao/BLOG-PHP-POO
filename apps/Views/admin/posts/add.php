<form method="post">
	<?= $form->input('titre', 'Titre'); ?>
	<?= $form->input('contenu', 'Contenu', ['type' => 'textarea']);?>
	<?= $form->select('categorie_id', 'Catégorie', $categories);?>
	<?= $form->submit(); ?>
</form>