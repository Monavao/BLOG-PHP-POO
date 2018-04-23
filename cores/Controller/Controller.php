<?php

namespace Core\Controller;

class Controller
{
	protected $viewPath;
	protected $template;

	public function render($view, $var = [])
	{
		ob_start();
		extract($var);
		require($this->viewPath . str_replace('.', '/', $view) . '.php');
		$content = ob_get_clean();
		require ($this->viewPath . 'templates/' . $this->template . '.php');
	}

	public function forbidden()
	{
		header('HTTP/1.0 403 Forbidden');
		die('Acces non autorisé');
	}

	public function notFound()
	{
		header('HTTP/1.0 404 Not found');
		die('Page introuvable');
	}
}