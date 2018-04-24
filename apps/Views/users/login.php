<?php if($errors): ?>
	<div clas="alert alert-danger">
		Identifiant et/ou mot de passe incorrect(s)
	</div>
<?php endif; ?>

<form method="post">
	<?= $form->input('username', 'Pseudo'); ?>
	<?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
	<?= $form->submit(); ?>
</form>