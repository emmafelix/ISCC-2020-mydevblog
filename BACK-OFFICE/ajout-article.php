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
    echo "La connexion a échoué<br>" . $e->getMessage();
  }
}


function ajout_article($pdo)
{
$titre = addslashes($_POST['nom']);
    $photo = addslashes($_POST['photo']);
    $date=addslashes($_POST['date']);
    $auteur=addslashes($_POST['auteur']);
    $contenu=addslashes($_POST['contenu']);
    $extrait=addslashes($_POST['extrait']);

    try {

      if (!empty($_POST['nom']) && !empty($_POST['date']) && !empty($_POST['auteur']) && !empty($_POST['contenu']) && !empty($_POST['extrait'])){
        
        $sql = "INSERT INTO
            `articles`(`titre`,`image`,`datee`,`auteur`,`contenu`,`extrait`)
            VALUES('$titre','$photo','$date','$auteur','$contenu','$extrait')";
        $pdo->exec($sql);
        echo 'Article ajouté';}
        else{
          echo "L'article n'a pas pu être ajouté <br>";
        }
    } catch (PDOException $e) {
        echo 'Erreur ajout<br>'.$e->getMessage();
    }
}

$pdo=connect_to_database();
ajout_article($pdo);
?>