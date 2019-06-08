<?php
// appel du front model
require('model/frontend.php');


function listPosts()
{
    $posts = getListPosts(); // On récupère la liste des posts en BDD
    require('view/frontend/listPostsView.php');
}


function listComments()
{
    $comments = getListComments(); // On récupère la liste des comments en BDD
    require('view/frontend/listCommentsView.php');
}



// On récupère les infos du post grâce à l'id passé dans l'URL

function getPost()
{
	$post = getPostById($_GET['id']); // 
    $comments = getCommentsById($_GET['id']);
    require('view/frontend/listCommentsView.php');

}


function listUsers() {

}

