<?php
$manager = new PostManager($db);
$list = $manager->getPostList();
$i = 0;
while (isset($list[$i]))
{
	$post = $list[$i];
	$post->display();
	$i++;
}
?>