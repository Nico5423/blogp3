<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>
<?php
while ($data = $posts->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['post_title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['post_content'])) ?>
            <br />
            <em><a href="index.php?action=listPosts&id=<?= $data['post_id'] ?>">Detail du post</a></em>
        </p>
    </div>
	<?php
}
$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>