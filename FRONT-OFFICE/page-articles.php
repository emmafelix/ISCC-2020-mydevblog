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
    }
    }
$pdo=connect_to_database();
articles($pdo);
    ?>
    
</ul>