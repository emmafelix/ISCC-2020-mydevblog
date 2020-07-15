<?php

session_start(); 
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

function login($pdo)
{
  try {
    if (!empty($_POST['login']) && !empty($_POST['password'])) {

      $login = $_POST['login'];
      $password = $_POST['password'];

 

      $requete=$pdo->query("SELECT mdp
      FROM utilisateurs 
      WHERE loginn='$login'");
    $res=$requete->fetchAll();
     

      if ($res) {
         
        if ($password == $res[0]['mdp']) {
          echo "Connexion réussie : bon couple identifiant / mot de passe.";
          header('Location: back.php?page=ajout-article');
   $_SESSION['login']=$login;
  $_SESSION['password']=$password;

        } 
      } else {
        echo "Mauvais couple identitifant / mot de passe.";
        echo '<a href="back.php?page=connexion">Connexion</a>';
      }
    }
  } catch (PDOException $e) {
    echo "Login erreur" . $e->getMessage();
  }
}

$pdo=connect_to_database();
login($pdo);


?>