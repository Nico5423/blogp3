<?php
// appel du front model
require('model/frontend.php');


function listPosts()
{
    $posts = getListPosts(); // On récupère la liste des posts en BDD
    require('view/frontend/listPostsView.php');
}

// On récupère les infos du post grâce à l'id passé dans l'URL


function getPost()
{
    $post = getPostById($_GET['id']); // 
    $comments = getComments($_GET['id']);
    require('view/frontend/postView.php');
}


function listUsers() {

}