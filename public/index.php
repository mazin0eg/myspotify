<?php

require_once __DIR__ . '/../app/init.php';

$router = new Router();
$router->addRoute('/', 'HomeController@index');
$router->addRoute('/user/login', 'UserController@login');
$router->addRoute('/user/register', 'UserController@register');
$router->addRoute('/user/logout', 'UserController@logout');

// Exécution de la route correspondante
$router->dispatch();
?>

<h1>Bienvenue sur MySpotifie</h1>
<p>Écoutez votre musique préférée grat<p>Écoutez votre musique préférée gratuitement.</p>
uitement.</p>

<?php $content = ob_get_clean(); ?>
<?php include '../app/views/layout.php'; ?>
