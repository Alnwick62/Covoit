<?php
include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'OffreCovoit.php';
include_once '../'.CHEMIN_MODELE.'DAOOffreCovoit.php'; 

$nouvelleOffre = new OffreCovoit(); 
$nouvelleOffre->jour = "Mercredi"; 
$nouvelleOffre->heure = "16:05"; 
$nouvelleOffre->date = "2016-12-06 06:56:01"; 
$nouvelleOffre->lieu = "Béthune"; 
$nouvelleOffre->chauffeur = 5; 

if (addUneOffreCovoit($nouvelleOffre)) 
{ 
    $idAjoute = PDO2::getInstance()->lastInsertId(); 
    $OffreAjoute = getUneOffreCovoit($idAjoute); 
    var_dump($OffreAjoute); 
} 
?>