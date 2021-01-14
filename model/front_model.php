
<?php

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=gsb_bddpharma;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function getLesFam()
{
    $db = dbConnect();

	$req = $db->query('SELECT id, libelle FROM famille ORDER BY libelle ASC');

	return $req;
}


function getLesMed($id)
{
	$db = dbConnect();
    $LesMedics = $db->prepare('SELECT * FROM medicament WHERE idFamille = ?');
    $LesMedics->execute(array($id));

    return $LesMedics;
}

function getLaFamille($id)
{
     $db = dbConnect();

    $LaFamille = $db->prepare('SELECT id, libelle FROM famille WHERE id = ?');
    $LaFamille->execute(array($id));
    $rep = $LaFamille->fetch();

    return $rep;
}

function postMed($id, $nomCommercial, $idFamille, $composition, $effets, $contreIndications)
{
    $db = dbConnect();
    $LesMedics = $db->prepare('INSERT INTO  medicament(id,nomCommercial, idFamille, composition, effets, contreIndications) VALUES(?, ?, ?, ?,?,?)');
    $affectedLines = $LesMedics->execute(array($id, $nomCommercial, $idFamille, $composition, $effets, $contreIndications));
    return $affectedLines;
}

function deleteMed($id)
{
    $db = dbConnect();
    $LesSupp = $db->prepare('DELETE FROM medicament WHERE id=?');
    $LesSupp->execute(array($id));
    $rep = $LesSupp->fetch();
    return $rep;
}

function updateMed($id, $nomCommercial, $idFamille, $composition, $effets, $contreIndications)
{
	$db = dbConnect();
    $LesMedics = $db->prepare('UPDATE medicament SET nomCommercial=?, composition=?, effets=?, contreIndications=? WHERE id = ?');
    $affectedLines = $LesMedics->execute(array( $nomCommercial, $composition, $effets, $contreIndications, $id));
    return $affectedLines;
}

function getLesDetail($id)
{
    $db = dbConnect();

    $det = $db->query ('SELECT composition, contreIndications, effets FROM medicament WHERE id = ?');
    $LesDetail->execute(array($id));

    return $det;
}
