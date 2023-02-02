<?php
$fiches=$pdo->getFiches();
$etats=$pdo->getEtat();
include("vues/v_modif.php");
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
        $etat = $_REQUEST['etat'];
        $id = $_REQUEST['idFiche'];
		$pdo->changeEtat($id, $etat);
        header('Location: /GSB-Frais-main/GSB-Frais-main/index.php?uc=modifLibelle');
	}
}