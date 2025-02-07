<?php include_once __DIR__ . '/../layout.php'; ?>

<h2>Profil de l'artiste</h2>

<?php if ($artist): ?>
    <div class="artist-profile">
        <img src="<?= htmlspecialchars($artist['profile_picture']) ?>" alt="Profile" class="artist-image">
        <h3><?= htmlspecialchars($artist['username']) ?></h3>
        <p><strong>Bio:</strong> <?= htmlspecialchars($artist['bio']) ?></p>
        <p><strong>Followers:</strong> <?= $artist['followers_count'] ?></p>
    </div>
    <a href="/artist/edit/<?= $artist['id'] ?>">Modifier l'artiste</a>
<?php else: ?>
    <p>L'artiste n'a pas été trouvé.</p>
<?php endif; ?>
