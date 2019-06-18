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
	//test d'un nouveau commentaire

	if ('pseudo'==NULL) 
	{
		

	}
	else
	{
		inscripNewComment();
	}



	$post = getPostById($_GET['id']); // On récupère les infos du post
    $listComments = getCommentsById($_GET['id']); // ....des commentaires liés au post
    require('view/frontend/listCommentsView.php');
}


function listUsers() {

}

