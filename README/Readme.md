## Procédure à suivre afin de réinstaller notre site web et la base données sur un serveur local XAMPP :

1. [Installer le serveur local XAMPP (https://www.apachefriends.org/fr/index.html).](Installation)

2. [Une fois l'application installé, il faut l'ouvrir en tant qu'administrateur afin d'avoir tout les droits.](Ouverture)

3. [Une fois XAMPP ouvert, cliquer sur "Start" pour les Modules "Apache" et "MySQL".](Lancement-localhost)

4. [Dans un navigateur, saisir l'URL "http://localhost/", sélectionner le dossier "dashboard/", puis se rendre dans phpMyAdmin (base de données locale), ou plus rapidement, saisir l'URL "http://localhost/phpmyadmin/".](Accès-base-de-données)

5. [Créer une nouvelle base de données, y insérer le document "reservation.sql". Les tables et leur contenu seront entrés dans la nouvelle base de données.](Création-Basededonnées)

6. [Dans l'explorateur de fichiers, "c:\xampp", allez dans le dossier "htdocs", insérer le dossier "resaweb" contenant tous les fichiers relatifs au site web.](Insérer-la-basededonnées)

7. [Dans le document "connexion.php", modifier l'accès à la base de données de sorte à ce que le site soit lié à la base en serveur local. Insérer une commande PHP du type : <?php $db =new PDO('mysql:host=localhost;dbname=NomBaseDeDonnees;port=3306;charset=utf8', 'root', ''); ?>](connexion.php)

8. [Retourner dans le localhost sur un navigateur et ouvrir le dossier contenant le site web. Si tout fonctionne, le site web s'affiche.](ENJOY)

9. [En local, le site web est accessible depuis l'URL : "http://localhost/resaweb/" ](Link)

Lien vers mon site: http://resaweb.jullien.butmmi.o2switch.site/ --> Le site n'affiche pas le php et les fonctionnalités Javascript, seulement le début du html,css pour une raison inconnue .