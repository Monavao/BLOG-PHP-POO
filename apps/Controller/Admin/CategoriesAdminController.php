<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

class CategoriesAdminController extends AppAdminController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Categorie');
	}

	public function index()
	{
		$categories = $this->Categorie->all();
		return $this->render('admin.categories.index', compact('categories'));
	}

	public function add()
	{
		if(!empty($_POST))
		{
			$result = $this->Categorie->create([
				'titre' => $_POST['titre']
			]);

			return $this->index();
		}

		$form = new BootstrapForm();
		return $this->render('admin.categories.add', compact('form'));
	}

	public function edit()
	{
		if(!empty($_POST))
		{
			$result = $this->Categorie->update($_GET['id'], [
				'titre' => $_POST['titre']
			]);

			return $this->index();
		}

		$categorie = $this->Categorie->find($_GET['id']);
		$form = new BootstrapForm($categorie);

		return $this->render('admin.categories.add', compact('form'));
	}

	public function delete()
	{
		if(!empty($_POST))
		{
			$result = $this->Categorie->delete($_POST['id']);
			
			return $this->index();
		}
	}
}