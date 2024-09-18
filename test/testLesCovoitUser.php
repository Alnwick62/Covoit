<?php
include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';
include_once '../'.CHEMIN_MODELE.'DAOCovoitUser.php';

//var_dump(getLesCovoitUser());

$LesCovoitUser = getLesCovoitUser();

foreach ($LesCovoitUser as $unCovoitUser){
    echo "ID: " . $unCovoitUser->getId() . "\n";
    echo "Nom: " . $unCovoitUser->getNom() . "\n";
    echo "Prénom: " . $unCovoitUser->getPrenom() . "\n";
    echo "Tel: " . $unCovoitUser->getTel() . "\n";
    echo "Mail: " . $unCovoitUser->getMail() . "\n";
    echo "Mdp: " . $unCovoitUser->getMdp() . "\n";
}

?>
