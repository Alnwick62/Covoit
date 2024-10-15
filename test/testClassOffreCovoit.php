<?php

include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'OffreCovoit.php';
require_once '../entity/OffreCovoit.php';

$test = new OffreCovoit(1, "Romain", "Lundi", "14:05", "14/06/24", "Béthune");
echo "ID: " . $test->getId() . "\n";
echo "Nom: " . $test->getCovoitUser() . "\n";
echo "Prénom: " . $test->getJour() . "\n";
echo "Tel: " . $test->getHeure() . "\n";
echo "Mail: " . $test->getDate() . "\n";
echo "Mdp: " . $test->getLieu() . "\n";

$test ->setId(2)->setCovoitUser("Carette")->setJour("Mardi")->setHeure("18:05")->setDate("18/09/24")->setLieu("Béthune");
echo "ID2: " . $test->getId() . "\n";
echo "Nom2: " . $test->getCovoitUser() . "\n";
echo "Prénom2: " . $test->getJour() . "\n";
echo "Tel2: " . $test->getHeure() . "\n";
echo "Mail2: " . $test->getDate() . "\n";
echo "Mdp2: " . $test->getLieu() . "\n";
 
?>