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

        return ($pdo);
    } catch (PDOException $e) {
        echo "La connexion a échoué" . $e->getMessage();
    }
}


function ajout_utilisateur($pdo)
{

    $login = $_POST['login'];
    $password = $_POST['password'];
    try {
    
        if(!empty($_POST['login']) && !empty($_POST['password'])){

        $sql = "INSERT INTO
            utilisateurs (loginn,mdp)
            VALUES('$login','$password')";
        $pdo->exec($sql);
        echo 'Utilisateur ajouté';
    }else{
            echo "L'utilisateur n'a pas pû être ajouté";
        }
    }catch (PDOException $e) {
        echo "Erreur ajout" . $e->getMessage();
    }
}

$pdo = connect_to_database();
ajout_utilisateur($pdo);
?>