<?php
    // connexion avec la base de données st_soccer
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=st_soccer;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

    // requête pour afficher 
    $reponse = $bdd->query('
        SELECT *
        FROM soccer_country
        ORDER BY country_name;
    ');
    $nomPays = $reponse->fetchAll();
    // var_dump($nomPays);

    $template = 'index';
    include 'homepage.phtml';

