<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !!!</h1>

        <p><a href="index.php">Retour à la liste des billets</a></p>
        <div class="news">
            <h3>
                <?= htmlspecialchars($billet['titre']) ?>
            </h3>
            <p>
                <?= nl2br(htmlspecialchars($billet['contenu'])) ?>
            </p>
        </div>
        <h2>Commentaires</h2>
        <?php
        while ($commentaires = $commentaire->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($commentaires['pseudo']) ?></strong></p>
            <p><?= nl2br(htmlspecialchars($commentaires['message'])) ?></p>
        <?php
        }
        $commentaire->closeCursor();
        ?>
        <?php $content = ob_get_clean(); ?>
        <?php require ('template.php'); ?>
