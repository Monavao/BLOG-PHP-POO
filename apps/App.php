<?php

namespace App;

use App\Database\MysqlDatabase;

class App
{
	/*const DB_NAME = 'blog';
	const DB_USER = 'root';
	const DB_PASS = '';
	const DB_HOST = 'localhost';

	private static $database;*/

	private static $_instance;
	private $db_instance;
	public $title  = 'Website';

	public static function getInstance()
	{
		if(is_null(self::$_instance))
		{
			self::$_instance = new App();
		}

		return self::$_instance;
	}

	public function getTable($name)
	{
		$class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';

		return new $class_name($this->getDb());
	}

	public function getDb()
	{
		$config = Config::getInstance();

		if(is_null($this->db_instance))
		{
			$this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
		}

		return $this->db_instance;
	}
	
	/*private static $title = 'Website';

	public static function getDb()
	{
		if(self::$database === null)
		{
			self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
		}

		return self::$database;
	}

	public static function notFound()
	{
		header("HTTP/1.0 404 Not Found");
		header('Location:index.php?p=404');
	}

	public static function getTitle()
	{
		return self::$title;
	}

	public static function setTitle($title)
	{
		self::$title = $title . ' | ' . self::$title;
	}*/
}