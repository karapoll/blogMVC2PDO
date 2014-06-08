<?php
if (isset($_POST['login'], $_POST['password']))
{
	$manager = new UserManager($db);
	$user = $manager->getUserByLogin($_POST['login']);
	if ($user)
	{
		if ($user->passwordVerify($_POST['password']))
		{
			$_SESSION['id'] = $user->getId();
			$_SESSION['prenom'] = $user->getPrenom();
			$_SESSION['nom'] = $user->getNom();
			header('Location:index.php');
		}
		else
		{
			echo "invalid password";
		}
	}
	else
	{
		echo "invalid login";
	}
}
else
	require('views/login.html');
?>