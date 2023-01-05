<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Réservation - SNKRS </title>
    <link rel="icon" type="image" href="images/logosneakers.png">
    <link rel="stylesheet" href="stylesréservation.css">
</head>

<body>
    <!-- Header -->
    <div id="home">
        <header id="sidebar">
            <div class="burger" onclick="myFunction()">
                <div class="top"></div>
                <div class="mid"></div>
                <div class="bottom"></div>
            </div>
            <h1><a href="réservation.php">SNKRS <img src="images/logosneakers.png" alt=""></a></h1>
            <nav>
                <ul>
                    <li><a href="index.php#home">Accueil</a></li>
                    <li><a href="index.php#titre">Nos sneakers</a></li>
                    <li><a href="index.php#services">Nous découvrir</a></li>
                    <li><a href="index.php#infos">Avantages</a></li>
                    <li><a href="index.php#application">Application</a></li>
                    <li><a href="index.php#about">A propos</a></li>
                    <li><a href="index.php#contact">Contactez-nous</a></li>
                </ul>
            </nav>
            <p><span class="fa fa-volume-control-phone"></span>+336 37 51 46 56</p>
        </header>
    </div>

    <!-- fin Header -->
    <?php
    include("connexion.php");
    $requete = "SELECT * FROM chaussure WHERE id_chaussure={$_GET["id"]}";
    $stmt = $db->query($requete);
    $chaussure = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="slider">
        <div class="row fullheight">

            <!-- Information Produit -->

            <div class="col-6 fullheight">
                <div class="produit-infos">
                    <div class="infos-wrapper">
                        <div class="prix-produit left-to-right">
                            <?= $chaussure["prix"] ?><span>€</span>
                        </div>
                        <div class="nom-produit left-to-right">
                            <h2><?= $chaussure["nom"] ?></h2>
                        </div>
                        <div class="produit-taille left-to-right">
                            <h3>Taille</h3>
                            <div class="taille-wrapper">
                                <p><?= $chaussure["pointure"] ?></p>
                            </div>
                        </div>
                        <div class="produit-couleur left-to-right">
                            <h3>Couleur</h3>
                            <p><?= $chaussure["couleurs"] ?></p>
                        </div>
                        <div class="produit-description left-to-right">
                            <p><?= $chaussure["description"] ?></p>
                        </div>

                        <!-- Fin Information Produit -->

                    </div>
                </div>
            </div>

            <!-- Image -->

            <div class="col-6 fullheight img-col">
                <div class="produit-images">
                    <div class="images-wrapper right-to-left">
                        <div class="bounce">
                            <img src="<?= $chaussure["images"] ?> " class="cercle" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fin Image -->

        </div>
    </div>

    <!-- Réservation Formulaire -->

    <section id="contact">
        <div class="container" style="margin-bottom: 120px;">
            <div class="title">
                <h6>Réserver votre paire</h6>
                <h3>Des maintenant</h3>
            </div>
            <form method="POST" target="_self">
                <input type="date" name="date" placeholder="Date" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="text" name="name" placeholder="Name" required />
                <div class="button">
                    <button>
                        Réserver
                    </button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST["date"])) {
            include("connexion.php");
            $requete = "INSERT * INTO reservation";
            $id_chaussure = $chaussure["id_chaussure"];
            $res_date = $_POST["date"];
            $res_name = $_POST["name"];
            $res_email = $_POST["email"];
            $SQL = "INSERT INTO `reservation` (`id_chaussure`, `res_date`, `res_name`, `res_email`) VALUES ($id_chaussure, \"$res_date\", \"$res_name\", \"$res_email\")";
            // echo $SQL;
            $req = $db->prepare($SQL);
            $req->execute();
            echo "Réservation effectué ✅";
        }
        ?>

        <!-- Envoi du mail -->

        <?php
        include("connexion.php");

        $res_email = $_POST["email"];
        $res_date = $_POST["date"];

        $headers = 'MIME-Version: 1.0';
        $headers = 'Content-type: text/html; charset=utf-8';
        $message = "<h2>SNKRS, réservation de sneakears</h2><br>
            <p>Bonjour,</p>
            <p>Vous avez bien réservée la sneakers : <strong><em>{$chaussure['nom']}</em></strong> pour une durée de 7 jours. à partir du $res_date !</p>
            <p>Profitez bien de cette paire <em>SNKRS</em> ! <br>x
            <p>Et n'oubliez pas de la ramener après la semaine écoulée !</p>
            <a href='https://resaweb.jullien.butmmi.o2switch.site/'>Site de réservation de sneakers Choose Your Sneakers</a></p><br>
            <p>Cordialement,<br><br>
            L'équipe de SNKRS</p>";

        mail($res_email, 'Réservation de sneakers', $message, $headers);
        $submit = $db->query($requete);
        ?>

        <!-- Envoi du mail -->

    </section>

    <!-- Fin Réservation Formulaire -->

    <!-- Pied de page -->
    <footer id="footer">
        <div class="flex1">
            <div>
                <h2>
                    <a href="index.php">
                        SNKRS
                        <img src="images/logosneakers.png" alt="">
                    </a>
                </h2>
                <p>
                    <a href="mailto:contact@SNKRS.com">vdtcsjullien@gmail.com</a>
                </p>
                <p>336 37 51 46 56</p>
            </div>
            <div>
                <h3>Navigation</h3>
                <ul>
                    <li>
                        <a href="index.php#home">Accueil</a>
                    </li>
                    <li>
                        <a href="index.php#titre">Nos sneakers</a>
                    </li>
                    <li>
                        <a href="index.php#services">Nous découvrir</a>
                    </li>
                    <li>
                        <a href="index.php#infos">Avantage</a>
                    </li>
                    <li>
                        <a href="index.php#application">Application</a>
                    </li>
                    <li>
                        <a href="index.php#about">A propos</a>
                    </li>
                    <li>
                        <a href="index.php#contact">Contactez-nous</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3>Contacte</h3>
                <ul>
                    <li>
                        <a href="">Youtube</a>
                    </li>
                    <li>
                        <a href="https://twitter.com/Nekros772">Twitter</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/dqmn_vj/">Instagram</a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/valentin-jullien-78abb1221/">LinkedIn</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex2">
            <div>
                <h3>Mentions légales</h3>
                <ul>
                    <li>
                        <p>Directeur de la publication : Valentin Jullien</p>
                    </li>
                    <li>
                        <p>Editeur : Ce site est produit par Valentin Jullien. Pour toute question concernant l’utilisation du site chooseyoursneakers.com vous pouvez nous contacter directement en ligne.</p>
                    </li>
                    <li>
                        <p>Hébergement : Le site chooseyoursneakers.com est hébergé par la société o2switch.</p>
                    </li>
                </ul>
            </div>
            <div>
                <a href="index.php#about">
                    <h3>À propos</h3>
                </a>
                <ul>
                    <li>
                        <p>Choose Your Sneakers est un service de location de sneakers pour les professionnels de la mode et de l’audiovisuel fondée par Valentin Jullien en 2022.</p>
                    </li>
                </ul>
            </div>
            <div>
                <a href="index.php#titre">
                    <h3>Politique de gestion <br>des données et images</h3>
                </a>
                <ul>
                    <li>
                        <p>Les données collectées sont hébergées dans une base de données phpMyAdmin chez l'hébergeur o2switch</p>
                    </li>
                    <li>
                        <p>Toutes les images affichées dans ce site web appartiennent à la société Stock X</p>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Fin Pied de page -->
    <script>
        function myFunction() {
            document.getElementById('sidebar').classList.toggle("open-sidebar");
        }
    </script>
</body>

</html>