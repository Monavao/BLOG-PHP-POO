<?php

namespace App;

class Autoloader
{
	/* Utiliser au choix register() + autoload() ou sinon registerShort() */

	/*
	static function register()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	static function autoload($class)
	{
		if(strpos($class, __NAMESPACE__ . '\\') === 0)
		{
			$class = str_replace(__NAMESPACE__ . '\\', '', $class);
			$class = str_replace('\\', '/', $class);

			require __DIR__ . '/' . $class . '.php';
		}
	}
	*/
	
	static function registerShort()
	{
		spl_autoload_register(function($class)
		{
			if(strpos($class, __NAMESPACE__ . '\\') === 0)
			{
				$class = str_replace(__NAMESPACE__ . '\\', '', $class);
				$class = str_replace('\\', '/', $class);
				include __DIR__ . '/' . $class . '.php';
			}
		});
	}
}