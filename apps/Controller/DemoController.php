<?php

namespace App\Controller;

use Core\Database\QueryBuilder;

class DemoController extends AppController
{
	public function index()
	{
		$query = new QueryBuilder();
		echo $query
			->select('id', 'titre', 'contenu')
			->from('articles', 'Post')
			->where('Post.categorie_id = 1')
			->where('Post.date > NOW()'); // si on utilise __toString() dans class QueryBuikder
			//->getQuery(); // si on utilise getQuery() dans class QueryBuikder
	}
}