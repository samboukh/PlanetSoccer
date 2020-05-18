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

// requete pour afficher les details des matchs par equipes
$query = $bdd->prepare('
    SELECT *,
        match_details.team_id 
    FROM soccer_team
    JOIN match_details ON soccer_team.team_id = match_details.team_id
    WHERE match_details.team_id = ?;
    ');
    $query->execute(array($_GET['Id']));
    $detailsMatch = $query->fetch();

    
    $template = 'details_match';
    include 'homepage.phtml';
