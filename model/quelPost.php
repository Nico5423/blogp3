<?php


    try //mot-clé pour tenter une connexion
    {
        $db = new PDO('mysql:host=localhost;dbname=db_np3;charset=utf8', 'root', '');//création d'un objet connexion mis dans $db
     } 
    
    catch (Exception $e) //en cas d'erreur, le numéro est récupéré
    {
        die('Erreur : ' . $e->getMessage());//on arrête tout et on met un message d'erreur explicite
    }




