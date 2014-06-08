<?php
class PostManager
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}
	public function getPostList($page = 0)
	{
		$res = $this->db->query("SELECT * FROM post ORDER BY id DESC LIMIT ".($page * 20).",20");
		$res->setFetchMode(PDO::FETCH_CLASS, 'Post');
		$list = array();
		while ($post = $res->fetch())
			$list[] = $post;
		return $list;
	}
	public function getLastPost()
	{
		$res = $this->db->query("SELECT * FROM post ORDER BY id DESC LIMIT 1");
		$res->setFetchMode(PDO::FETCH_CLASS, 'Post');
		$post = $res->fetch();
		return $post;
	}
	public function getPost($id)
	{
		$res = $this->db->query("SELECT * FROM post WHERE id='".intval($id)."'");
		$res->setFetchMode(PDO::FETCH_CLASS, 'Post');
		$post = $res->fetch();
		return $post;
	}
	public function update(Post $post)
	{
		$request = $this->db->prepare("UPDATE post SET titre=?, contenu=? WHERE id=?");
		$request->execute(array($post->getTitre(),$post->getContenu(),$post->getId()));
	}
	public function delete(Post $post)
	{
		$request = $this->db->prepare("DELETE FROM post WHERE id=?");
		$request->execute(array($post->getId()));
	}
	public function createPost($data)
	{
		$request = $this->db->prepare("INSERT INTO post (titre,contenu,id_author) VALUES(?,?,?)");
		$request->execute(array($data['titre'], $data['contenu'], $_SESSION['id']));
		$id = $this->db->lastInsertId();
		return $this->getPost($id);
	}
}
?>