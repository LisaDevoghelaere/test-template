<?php 
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('template');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

$title = "le titre de la page";
$nom ="Manu";
$template = $twig->load('base.html.twig');
echo $template->render(['title' => $title, 'nom' => $nom]);

