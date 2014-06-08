<?php
class UserManager
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}
	public function getUserByLogin($login)
	{
		$res = $this->db->query("SELECT * FROM user WHERE email=".$this->db->quote($login));
		$res->setFetchMode(PDO::FETCH_CLASS, 'User');
		$user = $res->fetch();
		return $user;
	}
}
?>