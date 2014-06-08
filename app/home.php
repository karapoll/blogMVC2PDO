<?php
$manager = new PostManager($db);
$post = $manager->getLastPost();
require('views/home.html');
?>