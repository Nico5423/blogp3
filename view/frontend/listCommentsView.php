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

/*$class = "SignalComments";*/
   
    
    foreach ($listComments as $data)
    {
        
        $class = "news";
        if ($data["signalement"] == "1" ) 
        {
        $class = "signaled";
        }
        ?>
        <div class="<?php echo $class;?>" >
 
            <h3>
                 <em>le <?= $data['creation_date_fr'] ?></em><br/>
                 <em><?= $data['comment_author'] ?> a écrit: </em>

            </h3>
            
            <p>  
                <?= nl2br(htmlspecialchars($data['comment_content'])) ?>
                <br />
                <em>indice de signalement :  <?= $data['signalement'] ?></em></br>
                <a href="<?php echo 'index.php?action=signalement&id='.$data['comment_id'];?>">Signaler ce message</a>            
            </p>
        </div>

    	<?php
    }
}
// <p class="signalement" ligne 41
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


