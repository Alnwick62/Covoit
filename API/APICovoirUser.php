<?php
include_once '../libs/pdo2.php';
include_once '../entity/CovoitUser.php';
include_once '../modeles/DAOCovoitUser.php';

header('content-type:application/json');

$methode = $_SERVER['REQUEST_METHOD'];
switch($methode){
    case 'GET':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $covoitUser = getUnCovoitUser($id);
            echo(json_encode($covoitUser));
        } else {
            echo (json_encode(getLesCovoitUser()));
        }
        break;
    case 'POST':
        var_dump($_POST);
        if(isset($_POST['nom']) && isset($_POST['prenom'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $unCovoitUser = new CovoitUser(NULL,$nom, $prenom, "0609080507", "dylan.dcss@gmail.com", "mdpTest1234!");
            addCovoitUser($unCovoitUser);
            }
            else {
                http_response_code(500);
            }
            break;
            case 'PATCH':
                parse_str(file_get_contents('php://input'), $_PATCH);
                if(isset($_PATCH['nom']) && isset($_PATCH['prenom'])){
                    $nom = $_PATCH['nom'];
                    $prenom = $_PATCH['prenom'];
                    $unCovoitUser = getUnCovoitUser($_PATCH['id']);
                    if($unCovoitUser) {
                        $unCovoitUser->setNom($nom);
                        $unCovoitUser->setPrenom($prenom);
                        updateUnCovoitUser($unCovoitUser);
                        echo "Utilisateur changé";
                    } else {
                        echo "Utilisateur pas trouvé";
                    }
                } else {
                    echo "Pas possible";
                }
                break;
                case 'DELETE':
                    parse_str(file_get_contents('php://input'), $_DELETE);
                    if (isset($_DELETE['id'])) {
                        $id = $_DELETE['id'];
                        $unCovoitUser = getUnCovoitUser($id);
                        if ($unCovoitUser) {
                            deleteCovoitUser($id);
                            echo "Utilisateur supprimé";
                        } else {
                            echo "Utilisateur pas trouvé";
                        }
                    } else {
                        echo "ID manquant";
                    }
                    break;
                
        }
        

?>