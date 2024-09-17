<?php

include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';
require_once '../entity/CovoitUser.php';

$test = new CovoitUser(1, "Carette", "Romain", "0606060606", "carette.romain@gmail.com", "Azerty123!");
echo "ID: " . $test->getId() . "\n";
echo "Nom: " . $test->getNom() . "\n";
echo "Prénom: " . $test->getPrenom() . "\n";
echo "Tel: " . $test->getTel() . "\n";
echo "Mail: " . $test->getMail() . "\n";
echo "Mdp: " . $test->getMdp() . "\n";

$test->setNom("Car")->setPrenom("Romano")->setTel("0606060607")->setMail("carette.romain2@gmail.com")->setMdp("Pasazerty123!");
echo "Nom2: " . $test->getNom() . "\n";
echo "Prénom2: " . $test->getPrenom() . "\n";
echo "Tel2: " . $test->getTel() . "\n";
echo "Mail2: " . $test->getMail() . "\n";
echo "Mdp2: " . $test->getMdp() . "\n";
 
?>