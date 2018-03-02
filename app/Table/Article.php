<?php

namespace App\Table;

class Article
{
	public function __get($param)
	{
		$method = 'get' . ucfirst($param);
		$this->$param = $this->$method();
		return $this->$param;
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