<?php 
//NOM DE LA PAGE
$title = 'COMMMENTAIRES'; ?>

<?php ob_start(); ?>


<!--PARTIE HTML DU DEBUT DE PAGE-->
<h1>Mon super blog !</h1>
<p>COMMMENTAIRES DU POST NUMERO <?php echo $_GET['id']?></p>
<p>RAPPEL DU TITRE DU POST : <?php echo $post['post_title']?> </p>
<?php


//si aucun commentaire, alors on n'affiche rien 

if(empty($listComments))
{
    ?>
    <div class="news">
        <b> Aucun commentaire pour cet article</b><br/>
      
    </div>
    <?php
}

//si on a des commentaires , alors on affiche en bouclant dans le fetch
else
{

    
    foreach ($listComments as $data)
    {
        ?>
        <div class="news">
            <h3>
                 <em>le <?= $data['creation_date_fr'] ?></em><br/>
                 <em><?= $data['comment_author'] ?> a écrit: </em>
            </h3>
            
            <p class="signalement"> 
              
                <?= nl2br(htmlspecialchars($data['comment_content'])) ?>
                <br />

            </p>
        </div>

    	<?php
    }
}

?>

<form method="post" action='index.php?action=submitComment'>
    <p>

            <b>Pour ajouter un commentaire à ce post, merci de compléter les champs suivants :</b><br /><br />
            Pseudo :<br />       
            <input type="text" name="pseudo"/><br /><br />
            Votre commentaire :<br />
            <textarea name="newComment" rows="8" cols="45"></textarea><br /><br />
            <input type="hidden" name="idDuPost" value="<?php echo $_GET['id'];?>">
            <input type="submit" value="Valider et envoyer" />
        </p>
</form>






<a href="index.php">retour à la liste</a>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>


<!--




<?php
 
 

/*
//ON TESTE LE FORMULAIRE


//if ('pseudo'==NULL OR 'newComment'==NULL)
{
    echo "AU MOINS UN DES DEUX POSTS MANQUE";

}
else
{

//CONNEXION A LA BASE
  try
    {
    $bdd = new PDO('mysql:host=localhost;dbname=db_np3;charset=utf8', 'root', '');
    } 
    catch (Exception $e)
    {
    die('Erreur : ' . $e->getMessage());
    }
  

// INSCRIPTION DANS LA BASE DU NOUVEAU COMMENTAIRE


<?php
$instant=NOW()
$req = $bdd->prepare('INSERT INTO table_comments(comment_id, post_id, comment_author, comment_content, comment_creation) VALUES(,:comment_id, :post_id, :comment_author, :comment_content, :comment_creation)');
$req->execute(array(
    'comment_id' => 99,
    'post_id' => $_GET['id'],
    'comment_author' => $pseudo,
    'comment_content' => $newComment,
    'comment_creation' => $instant,
    ));

echo 'Commentaire ajouté !';
?>

*/




//$bdd->exec('INSERT INTO table_comments(post_id, comment_author, comment_content, comment_creation) VALUES (999,pseudo,newComment,NOW())');

    //echo $_POST['pseudo'];

// }


