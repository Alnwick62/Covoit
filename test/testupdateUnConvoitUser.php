<?php
include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';
include_once '../'.CHEMIN_MODELE.'DAOCovoitUser.php';

$test = getUnCovoitUser(1);

    var_dump($test);
    $test->setNom("Dupont");
    $test->setPrenom("Jean");
    $test->setTel("0612345678");
    $test->setMail("jean.dupont@example.com");
    $test->setMdp("testupdate");
    if (updateUnCovoitUser($test)) {
        echo "<br>L'test a été mis à jour avec succès !<br>";
        $testMisAJour = getUnCovoitUser($test->getId());
        echo "Informations mises à jour de l'test : <br>";
        var_dump($testMisAJour);
    } else {
        echo "Échec de la mise à jour de l'test.<br>";
    }
?>
