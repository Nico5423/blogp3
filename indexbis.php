<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=db_np3;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table table_comments
$reponse = $bdd->query('SELECT comment_id, post_id, comment_author, comment_content, DATE_FORMAT(comment_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM table_comments');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
{
?>
    <p>
    <strong>COMMENTAIRE</strong> : <?php echo $donnees['comment_id']; ?><br />
    L auteur de ce commentaire est : <strong><?php echo $donnees['comment_author']; ?></strong>, <br />
    et le texte de ce commentaire est <strong><?php echo $donnees['comment_content']; ?></strong><br />
      </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>