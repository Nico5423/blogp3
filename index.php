<?php

// appel du front controller
require('controller/frontend.php');


//si action est précisé dans l'adresse
if (isset($_GET['action'])) 
    {
    // Listing des posts
    if ($_GET['action'] == 'listPosts') 
        {        
            listPosts();
        }

    elseif ($_GET['action']=='submitComment') {
        submitCommentForm();
    }

    elseif ($_GET['action']=='signalement') {
        // ATTENTION ici id représente l'id du commentaire PAS du post
        signalement($_GET['id']);

    }
    
    elseif ($_GET['action'] == 'detailPost')// Détail d'un post 
        {      
        if (!empty($_GET['id'])) // Si id du post n'est PAS vide et qu'il n'est pas nase
            {
            getPost();
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
?>
