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

    echo "Vous êtes connectés <br>";
    return($pdo);
  } catch (PDOException $e) {
    echo "La connexion a échoué" . $e->getMessage();
  }
}
connect_to_database();
?>