<?php


   try //mot-clé pour tenter une connexion
    {
        $db = new PDO('mysql:host=localhost;dbname=db_np3;charset=utf8', 'root', '');//création d'un objet connexion mis dans $db
        //return $db; //renvoie $db à celui qui a appelé la fonction
    } 
    
    catch (Exception $e) //en cas d'erreur, le numéro est récupéré
    {
        die('Erreur : ' . $e->getMessage());//on arrête tout et on met un message d'erreur explicite
    }

  /*$id=$idTransmis;
  
   $db = dbConnect(); // on fait la connexion
   */
  
   
   $nb_modifs = $db->exec('UPDATE table_comments SET signalement = 1 WHERE comment_id=12');
	echo $nb_modifs . ' entrées ont été modifiées !';

   //header('Location: index.php?action=detailPost&id=$id');
   //exit(); // toujours mettre un exit après header
