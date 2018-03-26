<?php

namespace Core\Entity;

class Entity
{
	public function __get($param)
	{
		$method = 'get' . ucfirst($param);
		$this->$param = $this->$method();
		return $this->$param;
	}
}