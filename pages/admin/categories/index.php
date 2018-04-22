<?php

$categories = App::getInstance()->getTable('Categorie')->all();

?>

<h1>Administrer les catégories</h1>

<p>
	<a href="?p=categories.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
	<thead>
		<tr>
			<td>Id</td>
			<td>Titre</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($categories as $categorie): ?>
			<tr>
				<td><?= $categorie->id ?></td>
				<td><?= $categorie->titre ?></td>
				<td>
					<a class="btn btn-primary" href="?p=categories.edit&id=<?= $categorie->id ?>">Editer</a>

					<form action="?p=categories.delete" method="post" style="display: inline;">
						<input type="hidden" name="id" value="<?= $categorie->id ?>">
						<button type="submit" class="btn btn-danger">Supprimer</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>