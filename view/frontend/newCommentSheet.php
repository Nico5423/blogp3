<?php

if ($_POST['pseudo']==NULL OR $_POST['newComment']==NULL)
{
    echo "AU MOINS UN DES DEUX POSTS MANQUE";

}
else
{


  try
    {
    $bdd = new PDO('mysql:host=localhost;dbname=db_np3;charset=utf8', 'root', '');
    } 
    catch (Exception $e)
    {
    die('Erreur : ' . $e->getMessage());
    }
  
    $bdd->exec('INSERT INTO table_comments(post_id, comment_author, comment_content, comment_creation) VALUES (999,'$_POST['pseudo']','$_POST['newComment']',NOW())');

    echo $_POST['pseudo'];

 

}




 