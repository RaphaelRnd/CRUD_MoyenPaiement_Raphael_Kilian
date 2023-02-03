<?php
include("vues/v_admin.php");
$fiches=$pdo->getFiches();
$etats=$pdo->getEtat();
$paiements=$pdo->getPaiement();
include("vues/v_listeFiche.php");
include("vues/v_modif.php");
$action = $_REQUEST['action'];


switch($action){
	case 'changerEtat':{
            $etat = $_REQUEST['etat'];
            $id = $_REQUEST['idFiche'];
			$pdo->changeEtat($id, $etat);
            header('Crud_Kilian_Raphael-main/index.php?uc=ficheFrais');
		break;
	}
	case 'changerLibelle':{
			$pdo->majEtatLibelle($nouveauLibelle,$ancienLib);
			header('Crud_Kilian_Raphael-main/index.php?uc=ficheFrais');
			echo "ok";
		break;
	}
	case 'changerPaiement':{
			$pdo->getPaiement();
			header('Location: Crud_Kilian_Raphael-main/index.php?uc=ficheFrais');
		break;
	}
}	