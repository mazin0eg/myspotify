<?php 
    include_once __DIR__ . '/../layout.php'; 
    require_once __DIR__ . '/../models/Artist.php';  // Correction du chemin et du nom de la classe

?>

<h2>Liste des artistes</h2>

<ul>
    <?php foreach ($artists as $artist) : ?>
        <li>
            <a href="/artist/show/<?= $artist['id'] ?>">
                <?= htmlspecialchars($artist['username']) ?> <!-- Affichage du nom d'utilisateur de l'artiste -->
            </a>
            <p><?= htmlspecialchars($artist['bio']) ?></p> <!-- Affichage de la bio de l'artiste -->
        </li>
    <?php endforeach; ?>
</ul>
