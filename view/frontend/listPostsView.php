<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<?php

while ($data = $posts->fetch())
{
    ?>
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <?= htmlspecialchars($data['post_title']) ?>
            <div class="card-body">
                <p class="card-text">
                    <?= nl2br(htmlspecialchars($data['post_content'])) ?>                
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="index.php?action=detailPost&id=<?= $data['post_id'] ?>">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Detail du post</button>
                        </a>
                    </div>
                    <small class="text-muted">Posté le <?= $data['creation_date_fr'] ?></small>
                </div>
            </div>
        </div>
    </div>
	<?php
}
$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>