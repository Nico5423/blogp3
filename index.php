<?php

// appel du front controller
require('controller/frontend.php');


//si action est précisé dans l'adresse
if (isset($_GET['action'])) 
	{
    // Listing des posts
    if ($_GET['action'] == 'listPosts') 
    	{        
        	//listPosts();
        	echo 'LISTING DES POSTS';

    	}
    
    elseif ($_GET['action'] == 'detailPost')// Détail d'un post 
		{      
        if (!empty($_GET['id'])) // Si id du post n'est PAS vide ou qu'il n'existe pas
	        {
	        getPost();
	        	//echo $_GET['id'];
	        }
        else 
        	{
            echo 'Erreur : aucun identifiant de post envoyé';
        	}
		}
	}

// Sinon, par défaut on affiche le Listing
else {
    listPosts();
   	}
