<?php

try //mot-clé pour tenter une connexion
    {
        $bdd = new PDO('mysql:host=localhost;dbname=db_np3;charset=utf8', 'root', '');//création d'un objet connexion mis dans $db
       
    } 
    
    catch (Exception $e) //en cas d'erreur, le numéro est récupéré
    {
        die('Erreur : ' . $e->getMessage());//on arrête tout et on met un message d'erreur explicite
    }


    $identifiant=5;
    $auteur="moi";
    $contenu="test n°4";
    $cid=14;


/*

// On ajoute une entrée dans la table jeux_video
$bdd->exec('INSERT INTO table_comments(post_id, comment_author, comment_content) VALUES(12,"nico","test samedi soir")');

*/



$req = $bdd->prepare('INSERT INTO table_comments(comment_id, post_id, comment_author, comment_content, comment_creation) VALUES(:comment_id,:post_id, :comment_author, :comment_content, :comment_creation)');
$req->execute(array(
    'comment_id'=> $cid,
    'post_id' => $identifiant,
    'comment_author' => $auteur,
    'comment_content' => $contenu,
    'comment_creation' => "2019-04-19 21:00:00"
    ));


echo $identifiant;
echo $auteur;
echo $contenu;




echo 'Le jeu a bien été ajouté !';







/*
    $req = $db->prepare('INSERT INTO table_comments(post_id, comment_author, comment_content) VALUES(:post_id, :comment_author, :comment_content)');

    $req->execute(array(
    'post_id' => $identifiant,
    'comment_author' => $auteur,
    'comment_content' => $contenu,
    ));

*/

?>