<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth
{
	private $db;

	public function __construct(Database $db)
	{
		$this->db = $db;
	}

	public function login($username, $password)
	{
		$user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);

		var_dump($user);
	}

	public function logged()
	{
		return isset($_SESSION['auth']);
	}
}