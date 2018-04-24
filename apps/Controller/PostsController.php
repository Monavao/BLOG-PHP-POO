<?php

namespace App\Controller;

class PostsController extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Post');
		$this->loadModel('Categorie');
	}

	public function index()
	{
		$posts = $this->Post->last();
		$categories = $this->Categorie->all();
		
		return $this->render('posts.home', compact('posts', 'categories'));
	}

	public function categorie()
	{
		$categorie = $this->Categorie->find($_GET['id']);

		if($categorie === false)
		{
			$this->notFound();
		}

		$articles = $this->Post->lastByCategorie($_GET['id']);
		$categories = $this->Categorie->all();

		return $this->render('posts.categorie', compact('articles', 'categories', 'categorie'));
	}

	public function show()
	{
		$article = $this->Post->findWithCategorie($_GET['id']);

		if($article === false)
		{
			$this->notFound();
		}

		return $this->render('posts.show', compact('article'));
	}
}