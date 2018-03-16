<?php

namespace App\Table;

use App\App;

class Article extends Table
{
	protected static $table = 'articles';

	public static function find($id)
	{
		return self::query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre 
			AS categorie 
			FROM articles 
			LEFT JOIN categories 
				ON categorie_id = categories.id
			WHERE articles.id = ?",
			[$id], true);
	}

	public static function lastByCategorie($categorie_id)
	{
		return self::query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre 
			AS categorie 
			FROM articles 
			LEFT JOIN categories 
				ON categorie_id = categories.id
			WHERE categorie_id = ?",
			[$categorie_id]);
	}

	public static function getLast()
	{
		return self::query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre 
			AS categorie 
			FROM articles 
			LEFT JOIN categories 
				ON categorie_id = categories.id");
	}

	public function getUrl()
	{
		return 'index.php?p=article&id=' . $this->id;
	}

	public function getExtrait()
	{
		$html = '<p>' . substr($this->contenu, 0, 200) . '...' . '</p>';
		$html .= '<p><a href="' . $this->getUrl() .'">Voir la suite</a></p>';

		return $html;
	}
}