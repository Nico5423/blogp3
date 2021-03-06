<?php
// appel du front model

require('model/frontend.php'); 


function listPosts()
{
    $posts = getListPosts(); // On récupère la liste des posts en BDD
    require('view/frontend/listPostsView.php');
}


function getPost()
{	
	
	$post = getPostById($_GET['id']); // On récupère les infos du post
    $listComments = getCommentsById($_GET['id']); // ....des commentaires liés au post
   
    require('view/frontend/listCommentsView.php');
}


function submitCommentForm()
{
	$idRef=$_POST['idDuPost'];//recup de la variable du formulaire
	$commentAuthor=$_POST['pseudo']; //recup de la variable du formulaire 
	$commentContent=$_POST['newComment']; //recup de la variable du formulaire
	
	insertCommentaire($idRef,$commentAuthor,$commentContent);//passge des variables à la fonction InsertCommentaire pour traitement <=> inscription dans la base de données 
	
	header('Location: index.php?action=detailPost&id='.$idRef);
	exit(); // toujours mettre un exit après header
}

function signalement($att)
{
	modifSignal($att);
	header('Location: index.php?action=detailPost&id='.$postIdRetourne);
	exit(); // toujours mettre un exit après header
}

