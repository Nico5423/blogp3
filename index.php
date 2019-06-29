<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>INDEX</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

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




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
