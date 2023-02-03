<h3>Fiches frais :</h3>
<table class="listeLegere">
    <caption>Descriptif des éléments hors forfait
    </caption>
    <tr>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Mois</th>
        <th>Montant</th>
        <th>Date Modif.</th>
        <th>Justificatifs</th>
        <th>Etat</th>
        <th>Paiement</th>
    </tr>

    <?php    
        ob_start();
	    foreach($fiches as $fiche) 
		{
            $id = $fiche['id'];
            $prenom = $fiche['prenom'];
            $nom = $fiche['nom'];
			$mois = $fiche['mois'];
			$etat = $fiche['etat'];
			$montant = $fiche['montant'];
			$dateModif = $fiche['dateModif'];
            $nbJustificatifs = $fiche['nbJustificatifs'];
            $moyenPaiement = $unFraisHorsForfait['libPaiement'];
            echo $moyenPaiement;
	?>
    <tr>
        <td>
            <?php echo $prenom ?>
        </td>
        <td>
            <?php echo $nom ?>
        </td>
        <td>
            <?php echo $mois ?>
        </td>
        <td>
            <?php echo $montant ?>
        </td>
        <td>
            <?php echo $dateModif ?>
        </td>
        <td>
            <?php echo $nbJustificatifs ?>
        </td>
        <td>
            <form method='POST' action="index.php?uc=ficheFrais&action=changerEtat">
                <div>
                    <label for="etat-select">Etat : <?php echo $etat ?></label>
                </div>
                <div>
                    <select name="etat" id="etat-select">
                        <option value="">--Changer Etat--</option>
                        <?php
                        foreach($etats as $etat) 
                        {
                            $idEtat = $etat['id'];
                            $libEtat = $etat['libelle'];
                        ?>
                        <option value="<?php echo $idEtat ?>"><?php echo $libEtat ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="Valider">
                    <input hidden name="idFiche" type="text" value="<?php echo $id ?>">
                </div>
            </form>
        </td>
        <td>
            <form method='POST' action="index.php?uc=ficheFrais&action=changerMoyen">
                <div>
                    <label for="moyen-select">Moyen de paiement : <?php echo $etat ?></label>
                </div>
                <div>
                    <select name="etat" id="moyen-select">
                        <option value="">--Changer Etat--</option>
                        <?php
                        foreach($etats as $etat) 
                        {
                            $idEtat = $etat['id'];
                            $libEtat = $etat['libelle'];
                        ?>
                        <option value="<?php echo $idEtat ?>"><?php echo $libEtat ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="Valider">
                    <input hidden name="idFiche" type="text" value="<?php echo $id ?>">
                </div>
            </form>
        </td>
        

    </tr>
    
<?php } ?>
    <form method="post" action="index.php?uc=ficheFrais&action=changerLibelle">
    <select name="ancienLib" id="etat-select">
             <option name="ancienLib">Libellé changé</option>
             <?php
            foreach($etats as $etat) 
           {
                 $idEtat = $etat['id'];
                 $libEtat = $etat['libelle'];
            ?>
              <option name="ancienLib" value="<?php echo $libEtat ?>"><?php echo $libEtat ?></option>
            <?php } ?>
            </select>
            <p> en :</p>
           <input type="text" name="nouveauLibelle">
               <input type="submit" value="Valider" name="valid">
               <input hidden name="idEtat" type="text" value="<?php echo $libEtat?>">
               <p> Créer un moyen de paiement : </p>
               <input type="text" name="nouveauPaiement">
               <input type="submit" value="Valider" name="validPaiement">
               <input hidden name="idEtat" type="text" value="<?php echo $libPaiement?>">

<?php
if(isset($_POST["valid"])) {
    $nouveauLibelle = $_POST["nouveauLibelle"];
    $ancienLib = $_POST["ancienLib"];
    $pdo->changeEtat($nouveauLibelle, $ancienLib);

}

if(isset($_POST["validPaiement"])) {
    $nouveauMoyen = $_POST["nouveauPaiement"];
    $pdo->creeMoyen($nouveauMoyen);
}