<?php

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

if(!empty($_POST))
{
	$auth = new DBAuth(App::getInstance()->getDb());

	if($auth->login($_POST['username'], $_POST['password']))
	{
		header('Location: admin.php');
	}
	else
	{
		?>

		<div class="alert alert-danger">
			Identifiants invalides
		</div>

		<?php
	}
}

$form = new BootstrapForm($_POST);

?>

<form method="post">
	<?= $form->input('username', 'Pseudo'); ?>
	<?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
	<?= $form->submit(); ?>
</form>