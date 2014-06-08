<?php
if (isset($_GET['id']))
{
	if (isset($_POST['edit']))
	{
		$manager = new PostManager($db);
		$post = $manager->getPost($_GET['id']);
		if ($post)
		{
			$post->setTitre($_POST['titre']);
			$post->setContenu($_POST['contenu']);
			$manager->update($post);
			header('Location:index.php?page=post&id='.$post->getId());
		}
		else
			header('Location:index.php');
	}
	else if (isset($_POST['delete']))
	{
		$manager = new PostManager($db);
		$post = $manager->getPost($_GET['id']);
		if ($post && $post->getTitre() == $_POST['secure'])
			$manager->delete($post);
		header('Location:index.php');
	}
	else if (isset($_GET['edit']))
	{
		$manager = new PostManager($db);
		$post = $manager->getPost($_GET['id']);
		if ($post)
			$post->displayEdit();
		else
			header('Location:index.php');
	}
	else if (isset($_GET['delete']))
	{
		$manager = new PostManager($db);
		$post = $manager->getPost($_GET['id']);
		if ($post)
			$post->displayDelete();
		else
			header('Location:index.php');
	}
	else
	{
		$manager = new PostManager($db);
		$post = $manager->getPost($_GET['id']);
		if ($post)
		{
			$post->display();
			$post->displayEditLink();
		}
		else
			header('Location:index.php');
	}
}
else if (isset($_POST['create']))
{
	if (!isset($_SESSION['id']))
	{
		header('Location:index.php');
		return;
	}
	$manager = new PostManager($db);
	$post = $manager->createPost($_POST);
	if ($post)
		header('Location:index.php?page=post&id='.$post->getId());
	else
	{
		echo 'error -> ';
		var_dump($post);
		// ajouter gestion d'erreur
	}
}
?>