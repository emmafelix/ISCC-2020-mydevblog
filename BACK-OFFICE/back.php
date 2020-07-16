<html>

<head>
    <title>
        MyDevBlog - Administration
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../STYLE/style.css">
</head>

<body>
    <header>
        <nav>
            <?php
            session_start();
             if ($_GET['page'] == 'connexion') : ?>
                <strong><a style="color:#fa8072">Connexion  </a></strong>
            <?php else : ?>
                <a href="back.php?page=connexion">Connexion  </a>
            <?php endif; ?>

            <?php if (isset($_SESSION['login'])==TRUE) {
            ?>
            
                <?php if ($_GET['page'] == 'ajout-article') : ?>
                    <strong><a style="color:#fa8072">Ajout article</a></strong>
                <?php else : ?>
                    <a href="back.php?page=ajout-article">Ajout article   </a>
                <?php endif; ?>
                <?php if ($_GET['page'] == 'ajout-utilisateur') : ?>
                    <strong><a style="color:#fa8072">Ajout utilisateur</a></strong>
                <?php else : ?>
                    <a href="back.php?page=ajout-utilisateur">Ajout utilisateur  </a>
                <?php endif; ?>
                <?php if ($_GET['page'] == 'utilisateurs') : ?>
                    <strong><a style="color:#fa8072">Utilisateurs  </a></strong>
                <?php else : ?>
                    <a href="back.php?page=utilisateurs">Utilisateurs  </a>
            <?php endif;
            } ?>

        </nav>
        <div class=h1>
        <h1>My Dev Blog</h1></div>
    </header>
    <div class="contenu">
    <?php
    if ($_GET['page'] == 'connexion') {
        echo "<h2>Connexion</h2>";
    ?>
        <form action="connexion.php" method="POST">
            <input type="text" placeholder="Nom d'utilisateur" name="login"><br>
            <input type="password" placeholder="Mot de passe" name="password"><br>
            <button type="submit" value="Connexion">Connexion</button>
        </form>
    <?php
        include('connexion.php');
    } elseif ($_GET['page'] == 'ajout-article') {
        echo "<h2>Ajoute un article !</h2>";
    ?>
        <form action="ajout-article.php" method="POST">
            <input type="text" placeholder="Titre de l'article" name="nom" /><br>
            <input type="file" accept="image/x-png,image/jpg,image/jpeg" name="photo" /><br>
            <input type="datetime-local" name="date" /><br>
            <input type="text" placeholder="Article" name="contenu" /><br>
            <input type="text" placeholder="Extratit de l'article" name="extrait" maxlength="300"/><br>
            <button type="submit" value="Envoyer">Publier l'article</button>
        </form>
    <?php
        include('ajout-article.php');
    } elseif ($_GET['page'] == 'ajout-utilisateur') {
        echo "<h2>Ajoute un utilisateur !</h2>";
    ?>
        <form action="ajout-utilisateur.php" method="POST">
            <input type="text" placeholder="Nom d'utilisateur" name="login"><br>
            <input type="password" placeholder="Mot de passe" name="password"><br>
            <button type="submit" value="Ajout">Ajouter l'utilisateur</button>
        </form>
    <?php
        include('ajout-utilisateur.php');
    } elseif ($_GET['page'] == 'utilisateurs') {
        echo "<h2>Utilisateurs</h2>";

        include('utilisateurs.php');
    }
    ?>
    </div>

    <footer>
<div class="footer_back"><?php 
if (isset($_SESSION['login'])==TRUE){echo 'Login: '.$_SESSION['login'].'<br>';} ?>

<a href="../FRONT-OFFICE/front.php?page=accueil"><img src="../ASSETS/iconesortie.png" width="150px"></a>
    </div></footer>
</body>

</html>