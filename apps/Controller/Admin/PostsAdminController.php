<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

class PostsAdminController extends AppAdminController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Post');
		$this->loadModel('Categorie');
	}

	public function index()
	{
		$posts = $this->Post->all();
		
		return $this->render('admin.posts.index', compact('posts'));
	}

	public function add()
	{
		if(!empty($_POST))
		{
			$result = $this->Post->create([
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu'],
				'categorie_id' => $_POST['categorie_id']
			]);

			if($result)
			{
				return $this->index();
			}
		}

		$categories = $this->Categorie->list('id', 'titre');
		$form = new BootstrapForm($_POST);

		return $this->render('admin.posts.add', compact('form', 'categories'));
	}

	public function edit()
	{
		if(!empty($_POST))
		{
			$result = $this->Post->update($_GET['id'], [
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu'],
				'categorie_id' => $_POST['categorie_id']
			]);

			if($result)
			{
				return $this->index();
			}
		}

		$post = $this->Post->find($_GET['id']); 
		$categories = $this->Categorie->list('id', 'titre');
		$form = new BootstrapForm($post);

		return $this->render('admin.posts.add', compact('form', 'categories'));
	}

	public function delete()
	{
		if(!empty($_POST))
		{
			$result = $this->Post->delete($_POST['id']);

			return $this->index();
		}
	}
}