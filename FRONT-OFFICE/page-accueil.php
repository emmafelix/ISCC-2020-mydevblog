<div class="presentation">
<p>Bienvenue sur MyDevBlog by Emma ! 
    <br>Étudiante à l’ISEG Strasbourg, une école de marketing et de communication, je réalise une formation de codage avec EPITECH, une grande école d’informatique, afin d’améliorer mes notions en codage et développement Web. 
    <br>Ce blog va alors être dédié au partage des différentes techniques que je vais utiliser et que j’ai appris au long de cette formation. Si comme moi, vous voulez débuter le codage informatique et vous lancer dans le domaine du Web, n’hésitez pas à suivre les articles disponibles et avancer avec moi pas à pas ! </p>        
</div>
<h2>
    Les derniers articles
</h2>  
<p>
    <?php
    function connect_to_database()
    {
      $servername = "localhost";
      $username = "root";
      $password = "root";
      $databasename = "MyDevBlog";
    
      try {
        $pdo = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return($pdo);

      } catch (PDOException $e) {
        echo "La connexion a échoué" . $e->getMessage();
      }
    }
?>
<ul>
    <?php
    function recup_5_articles($pdo){
        
    $articles=$pdo->query("SELECT *
    FROM articles
    ORDER BY id DESC
    LIMIT 5
    ")->fetchAll();
    
    foreach ($articles as $article){
        echo '<h3><li>'.$article['titre'].'</li></h3>';
       echo '<p>'.$article['extrait'].'</p>';
       $number_article=$article['id'];
       ?>
     
       <div class="a_lien_article"><a href="front.php?page=article&id=<?php echo $number_article?>">Consulter l'article</a>
       </div><?php
    }
    }

    $pdo = connect_to_database();
    recup_5_articles($pdo);
    ?></ul>
</p> 
