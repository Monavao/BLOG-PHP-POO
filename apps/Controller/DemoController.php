<?php

namespace App\Controller;

//use Core\Database\QueryBuilder;

class DemoController extends AppController
{
	public function index()
	{
		require ROOT . '/Query.php';

		//$query = new QueryBuilder();

		echo \Query::select('id', 'titre', 'contenu')
			->from('articles', 'Post')
			->where('Post.categorie_id = 1')
			->where('Post.date > NOW()'); // si on utilise __toString() dans class QueryBuilder
			//->getQuery(); // si on utilise getQuery() dans class QueryBuilder
	}
}