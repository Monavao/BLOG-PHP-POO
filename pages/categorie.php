<?php

use App\Table\Article;
use App\Table\Categorie;

$categorie = Categorie::find($_GET['id']);
$articles = Article::lastByCategory($_GET['id']);

if($categorie == false)
{
	\App\App::notFound();
}

$categories = Categorie::all();

?>

<h1><?= $categorie->titre ?></h1>

<div class="row">
	<div class="col-sm-8">
	<?php foreach($articles as $article): ?>
		<h2><a href="<?= $article->url; ?>"><?= $article->titre ?></a></h2>
		<p><em><?= $article->categorie ?></em></p>
		<p><?= $article->extrait; ?></p>
	<?php endforeach; ?>
	</div>
	<div class="col-sm-4">
		<ul>
		<?php foreach($categories as $categorie): ?>
			<li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
		<?php endforeach; ?>
		</ul>
	</div>
</div>