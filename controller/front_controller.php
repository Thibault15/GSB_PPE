<?php

require('C:/wamp64/www/gsb/model/front_model.php');

function listFamilles()
{
    $listMed = getLesFam();

    require('C:/wamp64/www/gsb/view/frontend/listPostsView.php');
}


function listMed($id)
{
	$LaFamille  = getLaFamille($id);
	$LesMedics = getLesMed($id);
	
	require('C:/wamp64/www/gsb/view/frontend/postView.php');
}


function addMed($id, $nomCommercial, $idFamille, $composition, $effets, $contreIndications)
{
	$rep=postMed($id, $nomCommercial, $idFamille, $composition, $effets, $contreIndications);
	listMed();
}

function suppMed($id)
{
	$repSupp=deleteMed($id);
	$LaFamille  = getLaFamille($_GET['id']);	
    $LesMedics = getLesMed($_GET['id']);
	
	require('C:/wamp64/www/gsb/view/frontend/postView.php');
}

function modifMed($id, $nomCommercial, $idFamille, $composition, $effets, $contreIndications)
{
	$rep=updateMed($id, $nomCommercial, $idFamille, $composition, $effets, $contreIndications);
	listMed();
}

function affichdetail($id, $composition, $effets, $contreIndications)
{
	$rep=getMed($id,  $composition, $effets, $contreIndications);
	lisMed();
}