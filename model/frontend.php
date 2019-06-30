<?php

// Connexion à la BDD
function dbConnect()
{
    try //mot-clé pour tenter une connexion
    {
        $db = new PDO('mysql:host=localhost;dbname=db_np3;charset=utf8', 'root', '');//création d'un objet connexion mis dans $db
        return $db; //renvoie $db à celui qui a appelé la fonction
    } 
    
    catch (Exception $e) //en cas d'erreur, le numéro est récupéré
    {
        die('Erreur : ' . $e->getMessage());//on arrête tout et on met un message d'erreur explicite
    }
}

//Récupère la liste des posts
 function getListPosts()
{
    $db = dbConnect(); // On place le processus de connexion dans $db et on fait la connexion

    // on fait une REQUÊTE SIMPLE dans la base  qu'on met dans $req
    //après SELECT on dit quels champs on veut récupérer, dans quelle table, l'ordre et le nombre
    $req = $db->query('SELECT post_id, post_title, post_content, DATE_FORMAT(post_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr 
            FROM table_posts ORDER BY post_creation DESC LIMIT 0, 5');//après SELECT on dit quels champs on veut récupérer, dans quelle table, l'ordre et le nombre
    return $req;//renvoie $req à celui qui a appelé la fonction
}


//Récupère les infos d'un post
function getPostById($postId) // le $postid est virtuel et ne sert qu'à montrer ce qu'on va faire avec l'argument passé par la fonction appelante
{
    $db = dbConnect();//connexion à la base
    $req = $db->prepare('SELECT post_id, post_title, post_content, DATE_FORMAT(post_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM table_posts WHERE post_id = ?');// REQUÊTE PREPAREEselection des données à récupérer avec ? représentatnt la variable de la demande
    $req->execute(array($postId));// donne la valeur de la variable array qui remplacera le ? de la partie prepare
    $post = $req->fetch(PDO::FETCH_ASSOC);//on fait un fetch sur les résultats de la requête et on met tout dans la variable $post
    // REVOIR PDO FETCH ASSOC
    //PDO::FETCH_ASSOC retourne un tableau indexé par le nom de la colonne comme retourné dans le jeu de résultats
    return $post;//renvoie $post à celui qui a appelé la fonction
}

// récupère les commentaires d'un post déterminé par son id placé dans l'argument de la fonction
function getCommentsById($postId)
{
    $db = dbConnect(); //on fait la connexion
    
    $req = $db->prepare('SELECT comment_id, post_id, comment_author, comment_content,signalement, DATE_FORMAT(comment_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM table_comments WHERE post_id = ?');
    $req->execute(array($postId));
    
    return $req->fetchAll(PDO::FETCH_ASSOC);

} 


function insertCommentaire($idPostParam,$auteurParam,$commentaireParam)
{
    $db = dbConnect(); // on fait la connexion
    
    //echo $idPostParam;
    //echo $auteurParam;
    //echo $commentaireParam;
    
    // REQUÊTE PREPAREE d'ECRITURE dans la base de données / table des commentaires
    $req = $db->prepare('INSERT INTO table_comments(post_id, comment_author, comment_content) VALUES(:post_id, :comment_author, :comment_content)');
    $req->execute(array(
    'post_id' => $idPostParam,
    'comment_author' => $auteurParam,
    'comment_content' => $commentaireParam,
        ));
     
}

function modifSignal($noComment)
{

    $db = dbConnect(); // on fait la connexion

    /*$resultat=$db->exec('UPDATE table_comments SET signalement = 1 WHERE comment_id=3');
    echo $resultat . ' entrées ont été modifiées !';*/
   

    $req = $db->prepare('UPDATE table_comments SET signalement = 1 WHERE comment_id=:numeroCommentaire');
    $req->execute(array(
    'numeroCommentaire' => $noComment
    ));

    return $req;

    $req->closeCursor();

}