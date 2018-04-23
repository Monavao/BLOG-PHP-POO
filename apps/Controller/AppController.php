<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class AppController extends Controller
{
	protected $template = 'default';

	public function __construct()
	{
		$this->viewPath = ROOT . '/apps/Views/';
	}

	public function loadModel($model)
	{
		$this->$model = App::getInstance()->getTable($model);
	}
}