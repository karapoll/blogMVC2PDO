<?php
class Post
{
	private $id;
	private $titre;
	private $contenu;
	private $date;
	private $id_author;
	private $author;

	public function __construct()
	{

	}
	public function display()
	{
		require('views/post.html');
	}
	public function displayEdit()
	{
		require('views/postedit.html');
	}
	public function displayDelete()
	{
		require('views/postdelete.html');
	}
	public function displayEditLink()
	{
		require('views/posteditlink.html');
	}
	public function getId()
	{
		return $this->id;
	}
	public function getTitre()
	{
		return $this->titre;
	}
	public function getContenu()
	{
		return $this->contenu;
	}
	public function setTitre($titre)
	{
		if ($titre != '')
			$this->titre = $titre;
	}
	public function setContenu($contenu)
	{
		if ($contenu != '')
			$this->contenu = $contenu;
	}
}
?>