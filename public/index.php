// /public/index.php
<?php

require_once '../core/Controller.php';
require_once '../core/Model.php';
require_once '../core/Database.php';

// Initialize the HomeController
$home = new HomeController();
$home->index();
?>
