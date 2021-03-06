<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table
{
	protected $table = 'articles';

	public function last()
	{
		return $this->query("
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre AS categorie
			FROM articles
			LEFT JOIN categories ON categorie_id = categories.id
			ORDER BY articles.date DESC");
	}

	public function findWithCategorie($id)
	{
		return $this->query("
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre AS categorie
			FROM articles
			LEFT JOIN categories ON categorie_id = categories.id
			WHERE articles.id = ?", [$id], true);
	}

	public function lastByCategorie($categorie_id)
	{
		return $this->query("
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre AS categorie
			FROM articles
			LEFT JOIN categories ON categorie_id = categories.id
			WHERE articles.categorie_id = ?
			ORDER BY articles.date DESC", [$categorie_id]);
	}
}