<?php
include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';
include_once '../'.CHEMIN_MODELE.'DAOCovoitUser.php';

$idtest = 1;
$test = getUnCovoitUser($idtest);


    var_dump($test);
    if (deleteUnCovoitUser($idtest)) 
        echo "Supprimé";
        $testoui = getUnCovoitUser($idtest);
        if (!$testoui) {
            echo "Supprimé";
        } else {
            echo "Suppression raté";
        }
?>
