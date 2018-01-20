<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 19/01/2018
 * Time: 16:24
 */
require_once ('model/PostManager.php');
require_once ('model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts=$postManager->getPosts();

    require('view/frontend/listPostView.php');
}

function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('view/frontend/postView.php');
}


function addComment($postId, $author, $comment)
{

	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComment($postId, $author, $comment);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	} else {
		header('Location: index.php?action=comments&id=' . $postId);
	}
}


