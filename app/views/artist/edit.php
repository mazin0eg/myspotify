<?php require_once '../app/views/layout.php'; ?>

<h2>Modifier l'Artiste</h2>

<form action="/artist/update" method="POST">
    <input type="hidden" name="id" value="<?= $artist['id'] ?>">

    <label for="bio">Bio:</label>
    <textarea name="bio"><?= htmlspecialchars($artist['bio']) ?></textarea>

    <label for="profile_picture">Photo de profil:</label>
    <input type="text" name="profile_picture" value="<?= htmlspecialchars($artist['profile_picture']) ?>">

    <button type="submit">Mettre à jour</button>
</form>
    