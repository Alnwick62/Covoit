<?php
include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';
include_once '../'.CHEMIN_MODELE.'DAOCovoitUser.php';

$nouvelUtilisateur = new CovoitUser();
$nouvelUtilisateur->nom = "Catteau";
$nouvelUtilisateur->prenom = "Corentin";
$nouvelUtilisateur->tel = "0769197577";
$nouvelUtilisateur->mail = "corentin.catteau@gmail.com";
$nouvelUtilisateur->mdp = "Coco62";

if (addCovoitUser($nouvelUtilisateur)) {
    $idAjoute = PDO2::getInstance()->lastInsertId(); 
    $utilisateurAjoute = getUnCovoitUser($idAjoute);
    var_dump($utilisateurAjoute);
} 
?>
