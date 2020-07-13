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
;
    return($pdo);

  } catch (PDOException $e) {
    echo "La connexion a échoué" . $e->getMessage();
  }
}?>
<ul>
<?php
function articles($pdo){
        
    $articles=$pdo->query("SELECT * FROM articles")->fetchAll();

    
    foreach ($articles as $article){
        echo '<h3><li>'.$article['titre'].'</li></h3>';
       echo '<p>'.$article['extrait'].'</p>';

       $number_article=$article['id'];
       ?>
     
       <a href="http://localhost:8888/ISSC%20-%202020/ISCC-2020-mydevblog/FRONT-OFFICE/front.php?page=article&id=<?php echo $number_article?>">Lire l'article en entier</a>
       <?php
    }
    }
$pdo=connect_to_database();
articles($pdo);
    ?>
    
</ul>