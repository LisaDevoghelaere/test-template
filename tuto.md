# Twig 
(voir "template engine php opensource" les autres : latte, blade mustache...)
Se Simplifier la vie dans la gestion du front.

## Installer
Attention pour l'installation :
il faut installer composer
il faut installer twig dans son projet car il ne s'installe pas sur l'ordinateur

#### Aparté : changer la variable d'environnement pour installer twig sur wamp
explorateur de fichier > clic droit sur "ce pc"> propriétés > Paramètre système avancé
s'ouvre une boite de dialogue en bas on clique sur variable d'environnement

on fait window+e > wamp64 > bin > php > 7.4 copier le chemin
C:\wamp64\bin\php\php7.4.0

le coller dans la variable d'environnement
Redémarrer la machine
dans le terminal faire php -v
si on a la bonne version, retourner à l'installation normale
(se remettre à vagrant serait également une bonne idée !)

*****
coller dans le terminal :
composer require "twig/twig:^3.0"
ça installe !

## Sur le site de TWIG
aller dans la doc
"twig for developers"
on copie

require_once '/path/to/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('/path/to/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => '/path/to/compilation_cache',
]);

dans notre dossier projet on créé un index . php puis on colle (après avoir ouvert une balise php *of course*)

Ensuite on va changer le chemin pour le mettre à la racine soit 
require_once vendor/autoload.php';

on créé un nouveau dossier qu'on appelle "template" et on modifie cette ligne :
$loader = new \Twig\Loader\FilesystemLoader('template');
(attention à bien retirer le "s" de template)
et enfin :
'cache' => false,

Dans template on fait un fichier "base.html.twig"
On ne peut pas faire de doctype dans un twig alors
file>préférence>setting>extension>Emmet> include language >
on clic
on écrit : "twig" : "html"

Et ça ne marche pas !!!!
En tout cas chez moi
on verra ça plus tard alors Vanessa, copie colle un doctype

dans index.php colle en bas :
```
$template = $twig->load('base.html.twig');
```

puis
```
echo $template->render();
```

vérifier que le localhost/tonprojet affiche bien une page blanche contenant le h1 vide
à ce moment là base.html.twig contient seulement :
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1></h1>
</body>
</html>
```

Sur Index.php on écrit :

$title = "le titre de la page";
$template = $twig->load('base.html.twig'); <- ça tu l'avais déjà
echo $template->render(['title' => $title]);

puis sur base.html.twig :
  <h1>{{ title }}</h1>
  (espaces entre accolades et nom. C'est pas obligatoire mais c'est une bonne pratique)

sur le navigateur le titre s'affiche

Cette méthode permet de construire séparement le front et le back!

Ainsi on construit d'un côté la structure html en mettant entre accolades les variables

## pour éviter les conflits git
il faut créer un fichier .gitignore
coller dedans :
vendor
composer.lock

Il faut qu'il ignore ses deux fichiers pour ne pas créer de problèmes
il faut committer le .gitignore
(séparémment et toujours seul en cas de changements !!!)

$ git add .gitignore
$ git commit .gitignore -m "add - gitignore pour dossier vendor"

### le reste 
$ git add template/ index.php composer.json 
$ git commit template/ index.php composer.json -m "add - mise en place du projet"
$ git status
$ git push origin master
