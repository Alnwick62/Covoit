<?php
include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';
include_once '../entity/CovoitUser.php';

function getUnCovoitUser($id){
   	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT id,nom,prenom,tel,mail,mdp 
    FROM CovoitUser WHERE id = :id ");
	$requete ->bindParam(':id',$id, PDO::PARAM_INT);
	$requete->execute();
        
        //Apr�s ex�cution de la requ�te, r�cup�ration d'un objet de la classe CovoitUser
		$requete->setFetchMode(PDO::FETCH_CLASS, 'CovoitUser');
	$unCovoitUser = $requete->fetch();
	  
	$requete->closeCursor();
	return $unCovoitUser;
}

function getLesCovoitUser(){
	$pdo = PDO2::getInstance();
    
        $requete = $pdo->prepare("SELECT id,nom,prenom,tel,mail,mdp 
        FROM CovoitUser ");
         
         
        $requete->execute();
         $tab = $requete->fetchAll(PDO::FETCH_CLASS, "CovoitUser");
         $requete->closeCursor();
	 return $tab;
}



function addCovoitUser($unCovoitUser){
    $pdo = PDO2::getInstance();

    $requete = $pdo->prepare("INSERT INTO CovoitUser(nom, prenom, tel, mail, mdp)
        VALUES (:nom, :prenom, :tel, :mail, :mdp)
    ");

    $requete->bindParam(':nom', $unCovoitUser->getNom(), PDO::PARAM_STR);
    $requete->bindParam(':prenom', $unCovoitUser->getPrenom(), PDO::PARAM_STR);
    $requete->bindParam(':tel', $unCovoitUser->getTel(), PDO::PARAM_STR);
    $requete->bindParam(':mail', $unCovoitUser->getMail(), PDO::PARAM_STR);
    $requete->bindParam(':mdp',password_hash($unCovoitUser->getMdp(), PASSWORD_DEFAULT)) ;
	return $requete->execute();
}

function updateUnCovoitUser($unCovoitUser){
    $pdo = PDO2::getInstance();

    $requete = $pdo->prepare("UPDATE CovoitUser
        SET nom = :nom, prenom = :prenom, tel = :tel, mail = :mail, mdp = :mdp
        WHERE id = :id
    ");

    $requete->bindParam(':nom', $unCovoitUser->getNom(), PDO::PARAM_STR);
    $requete->bindParam(':prenom', $unCovoitUser->getPrenom(), PDO::PARAM_STR);
    $requete->bindParam(':tel', $unCovoitUser->getTel(), PDO::PARAM_STR);
    $requete->bindParam(':mail', $unCovoitUser->getMail(), PDO::PARAM_STR);
    $requete->bindParam(':mdp', $unCovoitUser->getMdp(), PDO::PARAM_STR);
    $requete->bindParam(':id', $unCovoitUser->getId(), PDO::PARAM_INT);
    return $requete->execute();
}

function deleteCovoitUser($id) {
    $pdo = PDO2::getInstance();

    $requete1 = $pdo->prepare("DELETE FROM OffreCovoit WHERE chauffeur = :id");
    $requete1->bindValue(':id', $id, PDO::PARAM_INT);
    $result1 = $requete1->execute();
    $requete1->closeCursor();

    $requete2 = $pdo->prepare("DELETE FROM CovoitUser WHERE id = :id");
    $requete2->bindValue(':id', $id, PDO::PARAM_INT);
    $result2 = $requete2->execute();
    $requete2->closeCursor();

    if ($result1 && $result2) {
        true;
    } else {
        false;
    }
} 


?>
