<?php $title = 'Details'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>COMMMENTAIRES DU POST NUMERO <?php echo $_GET['id']?></p>
<?php
while ($data = $comments->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['comment_id']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['comment_content'])) ?>
            <br />
            <em><a href="index.php?">retour à la liste</a></em>
        </p>
    </div>

	<?php
}
$comments->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<em><a href="index.php?">retour à la liste</a></em>
<?php require('template.php'); ?>