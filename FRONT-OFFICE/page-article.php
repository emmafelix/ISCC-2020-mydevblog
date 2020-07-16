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
}

function afficher_article_entier($pdo){
    
    $number_article=$_GET['id'];

    $articles=$pdo->query("SELECT *
    FROM articles
    WHERE id='$number_article'")->fetchAll();


    echo '<h4>'.$articles[0]['titre'].'</h4>';
    echo '<p>'.$articles[0]['contenu'].'</p>';
    echo '<p><strong>Auteur: </strong>'.$articles[0]['auteur'];
    echo '<br><strong>Date: </strong>'.$articles[0]['datee'].'</p>';

       
}
$pdo=connect_to_database();
afficher_article_entier($pdo);

?>