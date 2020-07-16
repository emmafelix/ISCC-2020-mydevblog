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
        echo '<h4><li>'.$article['titre'].'</li></h4>';
       echo '<p><div class="extrait">'.$article['extrait'].'</div></p>';

       $number_article=$article['id'];
       ?>
     
     <div class="a_lien_article"><a href="front.php?page=article&id=<?php echo $number_article?>">Lire l'article en entier</a>
    </div>  
       <?php
    }
    }
$pdo=connect_to_database();
articles($pdo);
    ?>
    
</ul>