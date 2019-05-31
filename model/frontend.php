<?php

/**
 * Connexion à la BDD
 * @return PDO
 */
function dbConnect()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=db_np3;charset=utf8', 'root', '');
        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Récupère la liste des posts
 *-
 * @return PDOStatement
 */
function getListPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT post_id, post_title, post_content, DATE_FORMAT(post_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr 
            FROM table_posts ORDER BY post_creation DESC LIMIT 0, 5');
    return $req;
}
/*

function getListComments()
{
    $db = dbConnect();
  $req = $db->query('SELECT comment_id, post_id, comment_author, comment_content, DATE_FORMAT(comment_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr 
            FROM table_comments ORDER BY comment_creation DESC LIMIT 0, 5');
    return $req;
}
*/

/**
 * Récupère les infos d'un post
 *
 * @param integer $postId
 * @return mixed
 */
function getPostById($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT post_id, post_title, post_content, DATE_FORMAT(post_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM table_posts WHERE post_id = ?');
    $req->execute(array(
        $postId
    ));
    $post = $req->fetch();
    return $post;
}


/**
 * Récupère les infos d'un post
 *
 * @param integer $postId
 * @return mixed
 */

function getComments()
{
    $db = dbConnect();
    $req = $db->query('SELECT comment_id, post_id, comment_author, comment_content, DATE_FORMAT(comment_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM table_comments WHERE post_id = ?');
    //return $req;
    $req->execute(array( 
    ));
    $comments = $req->fetch();
    return $comments;
} 
