<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MySpotifie</title>
    <link rel="stylesheet" href="/myspotifie/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
<body>

    <!-- 🎵 Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <a href="/"><i class="fa-brands fa-spotify"></i> MySpotifie</a>
        </div>
        <ul>
            <li><a href="/"><i class="fa-solid fa-house"></i> Accueil</a></li>
            <li><a href="/user/login"><i class="fa-solid fa-sign-in-alt"></i> Connexion</a></li>
            <li><a href="/user/register" class="btn"><i class="fa-solid fa-user-plus"></i> Inscription</a></li>
        </ul>
    </div>

    <!-- 🎵 Main Content -->
    <div class="main-content">
        <header>
            <h1><i class="fa-solid fa-music"></i> Bienvenue sur MySpotifie</h1>
        </header>
        <main>
            <?php echo $content; ?> <!-- Affichage du contenu dynamique -->
        </main>
    </div>

    <script src="/myspotifie/public/js/script.js"></script>
</body>
</html>
