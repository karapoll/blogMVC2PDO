<?php
class User
{
	private $id;
	private $prenom;
	private $nom;
	private $email;
	private $date;
	private $pass;

	public function __construct()
	{

	}
	public function passwordVerify($password)
	{
		if ($this->pass == $password)
			return true;
		return false;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getPrenom()
	{
		return $this->prenom;
	}
	public function getNom()
	{
		return $this->nom;
	}
}
?>