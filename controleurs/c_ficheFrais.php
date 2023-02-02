<?php
include("vues/v_admin.php");
$fiches=$pdo->getFiches();
$etats=$pdo->getEtat();
$paiements=$pdo->getPaiement();
include("vues/v_listeFiche.php");
include("vues/v_modif.php");
include('vues/v_listeFraisHorsForfait.php');
$action = $_REQUEST['action'];


switch($action){
	case 'changerEtat':{
            $etat = $_REQUEST['etat'];
            $id = $_REQUEST['idFiche'];
			$pdo->changeEtat($id, $etat);
            header('Location: /GSB-Frais-main/GSB-Frais-main/index.php?uc=ficheFrais');
		break;
	}
	case 'changerLibelle':{
			$pdo->majEtatLibelle($nouveauLibelle,$ancienLib);
			header('Location: /GSB-Frais-main-dep/index.php?uc=ficheFrais');
			echo "ok";
		break;
	}
	case 'changerPaiement':{
			$pdo->getPaiement();
			header('Location: /GSB-Frais-main-dep/index.php?uc=ficheFrais');
			echo "ok";
		break;
	}
}	