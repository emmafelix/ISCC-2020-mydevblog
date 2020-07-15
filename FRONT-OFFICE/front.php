<html>

<head>
    <title>
        MyDevBlog - FELIX Emma
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../STYLE/style.css">
</head>

<body>
    <header>
        <nav>
            <?php if ($_GET['page'] == 'accueil') : ?>
                <strong><a style="color:#fa8072" >Accueil</a></strong>
            <?php else : ?>
                <a href="front.php?page=accueil">Accueil</a>
            <?php endif; ?>
            <?php if ($_GET['page'] == 'articles') : ?>
                <strong><a style="color:#fa8072" >Articles</a></strong>
                    <?php else : ?>
                        <a href="front.php?page=articles">Articles</a>
                    <?php endif; ?>
                    <?php if ($_GET['page'] == 'contact') : ?>
                        <strong><a style="color:#fa8072" >Contact</a></strong>
                            <?php else : ?>
                                <a href="front.php?page=contact">Contact</a>
                            <?php endif; ?>



        </nav>

        <h1>My Dev Blog</h1>
    </header>
<div class="contenu">
    <?php
    if ($_GET['page'] == 'accueil') {
        include('page-accueil.php');
    } elseif ($_GET['page'] == 'contact') {
        include('page-contact.php');
    } elseif ($_GET['page'] == 'articles') {
        include('page-articles.php');
    }elseif ($_GET['page']=='article'){
        include('page-article.php');
    }
    ?>
</div>
    <footer>
        <div class="imageep">
            <a href="https://fr.linkedin.com/in/emma-felix-5a4b86197"><img src="../ASSETS/Logo-LinkedIn.png" alt="logo linkedin lien vers page Linkedin FELIX Emma" width=70em> </a>
            <a href="https://github.com/emmafelix"><img src="../ASSETS/logo-github.png" alt="logo github lien vers page github FELIX Emma" width=70em> </a>
            <a href="../BACK-OFFICE/back.php?page=connexion">Espace administration</a>
    </footer>
</body>

</html>