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

// requete pour la liste des joueurs par equipes
$query = $bdd->prepare('
    SELECT *,
    DATE_FORMAT(dt_of_bir, "%d/%m/%Y") AS "date de naissance"
    FROM player_mast
    JOIN soccer_country ON player_mast.team_id = soccer_country.country_id
    WHERE team_id = ?
    ORDER BY posi_to_play DESC, dt_of_bir;
');
$query->execute(array($_GET['Id']));
$joueursEquipes = $query->fetchAll();

$template = 'listes_joueurs';
include 'homepage.phtml'; 