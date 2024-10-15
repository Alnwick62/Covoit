<?php
include_once '../entity/OffreCovoit.php';

/**
 * R�cup�re toutes les informations des OffresCovoit (sauf le chauffeur)
 * @return un tableau d'objet OffreCovoit
 */

 function getUneOffreCovoit($id){
	$pdo = PDO2::getInstance();

 $requete = $pdo->prepare("SELECT id,jour,heure,date,lieu,chauffeur 
 FROM OffreCovoit WHERE id = :id ");
 $requete ->bindParam(':id',$id, PDO::PARAM_INT);
 $requete->execute();
	 
	 //Apr�s ex�cution de la requ�te, r�cup�ration d'un objet de la classe CovoitUser
	 $requete->setFetchMode(PDO::FETCH_CLASS, 'OffreCovoit');
 $UneOffreCovoit = $requete->fetch();
   
 $requete->closeCursor();
 return $UneOffreCovoit;
}
function getLesOffresCovoitAnonyme(){
	$pdo = PDO2::getInstance();
    
        $requete = $pdo->prepare("SELECT id,jour,heure,date,lieu 
        FROM OffreCovoit ");
         
         
        $requete->execute();
         $tab = $requete->fetchAll(PDO::FETCH_CLASS, "OffreCovoit");
         $requete->closeCursor();
	 return $tab;
}

/**
 * R�cup�re toutes les informations des OffresCovoit, y compris les chauffeurs
 * @return un tableau d'objet OffreCovoit (chaque objet OffreCovoit contient l'objet CovoitUser correspondant )
 */
function getLesOffresCovoit(){
	$pdo = PDO2::getInstance();
    
        $requete = $pdo->prepare("SELECT id,jour,heure,date,lieu,chauffeur 
        FROM OffreCovoit ");
         
         
        $requete->execute();
         $tab = $requete->fetchAll(PDO::FETCH_CLASS, "OffreCovoit");
         $requete->closeCursor();
	 return $tab;
}


function addUneOffreCovoit($uneOffreCovoit){
    $pdo = PDO2::getInstance();

    $requete = $pdo->prepare("INSERT INTO OffreCovoit(jour, heure, date, lieu, chauffeur)
        VALUES (:jour, :heure, :date, :lieu, :chauffeur)
    ");

    $requete->bindParam(':jour', $uneOffreCovoit->jour, PDO::PARAM_STR);
    $requete->bindParam(':heure', $uneOffreCovoit->heure, PDO::PARAM_STR);
    $requete->bindParam(':date', $uneOffreCovoit->date, PDO::PARAM_STR);
    $requete->bindParam(':lieu', $uneOffreCovoit->lieu, PDO::PARAM_STR);
    $requete->bindParam(':chauffeur', $uneOffreCovoit->chauffeur, PDO::PARAM_STR);
	return $requete->execute();
}






?>
