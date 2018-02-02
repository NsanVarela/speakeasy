<?php

	if(isset($_POST['inputFirstname6']) && isset($_POST['inputName6']) && isset($_POST['inputPseudo6']) && isset($_POST['inputEmail6']) && isset($_POST['inputCity6']) && isset($_POST['inputSexe6']) && isset($_POST['bdaymonth']) && isset($_POST['inputLanguage'])/* && isset($_POST['comment'])*/){

		$nom = $_POST['inputName6'];
		$prenom = $_POST['inputFirstname6'];
		$pseudo = $_POST['inputPseudo6'];
		$email = $_POST['inputEmail6'];
		$city = $_POST['inputCity6'];
		$sexe = $_POST['inputSexe6'];
		$anniv = $_POST['bdaymonth'];
		$langue = $_POST['inputLanguage'];
		
		$commentaire = $_POST['inputDescription'];
echo $commentaire;
//$email = "test";

		// Controler la validité du formulaire avant l'inscription en BD.
		$valideForm = 0;

		// 
		if(!empty($email)){
			if(!valideEmail($email)){
				$valideForm++;
			}
		}
		
		// Valider la date
		if(!empty($anniv)){
			if(!valideDate($anniv)){
				$valideForm++;
			}
		}

		// Nom
		if(!empty($nom)){
			if(!valideTexte($nom)){
				$valideForm++;
			} else {
				$nom = maximalCaseTexte($nom);
			}
		}

		// Prénom
		if(!empty($prenom)){
			if(!valideTexte($prenom)){
				$valideForm++;
			} else {
				$prenom = maximalCaseTexte($prenom);				
			}
		}

		// Pseudo
		if(!empty($pseudo)){
			if(!valideTexte($pseudo)){
				$valideForm++;
			}
		}

		// Ville
		if(!empty($city)){
			if(!valideTexte($city)){
				$valideForm++;
			}
		}

		// Enregistrement des modifications.
		if($valideForm == 0){

			require_once(__DIR__.'\..\model\Membre.class.php');
			$nouveau = new Membre();		
			$nouveau->setNom($nom);		
			$nouveau->setPrenom($prenom);		
			$nouveau->setPseudo($pseudo);		
			$nouveau->setMail($email);		
			$nouveau->setAnniversaire($anniv);
			$nouveau->setType($sexe);		
			$nouveau->setAdresse($city);		
			$nouveau->setLangue($langue);

			require_once(__DIR__.'\..\dao\MembreDAO.class.php');
			$enregistrerMembre = new MembreDAO();
			$row = $enregistrerMembre->miseAJourMembre($nouveau);

		} else {
			echo "Validation = ".$validForm;
		}

	} else {
		// Redirection vers le formulaire d'inscription.

	}





	/**** Fonctions de controle ****/


	// Vérifier le format d'une adresse e-mail.
	function valideEmail($email){
		if(filter_var($email, FILTER_SANITIZE_EMAIL) == TRUE){
			return true;
		} else {
			return false;
		}
	}
		
	/*
	 * Valide le contenu d'un texte en fonction d'un nombre de caractères minimum.
	 * Par défaut la chaine doit faire dix caractères au minimum.
	 */
	function valideTexte($saisie){
		$saisie = trim($saisie);
		if((strlen($saisie) > 0) && (!is_numeric($saisie))){
			return true;
		}
		return false;
	}

	// 
	function minimalCaseTexte($texte){
		return strtolower($texte);
	}

	// 
	function maximalCaseTexte($texte){
		return strtoupper($texte);
	}

	// Vérification de la validité de la date saisie.
	function valideDate($date){
		list($annee, $mois, $jour) = explode("-", $date);
		$control = true;
		switch ($mois){
			case 2:{
				if($jour > nombreDeJourMax($mois,$annee)){
					$control = false;
				}
				break;
			}
			case 4: case 6: case 9: case 11:{
				if($jour > nombreDeJourMax($mois, $annee)){
					$control = false;
				}
				break;
			}
		}
		return $control;
	}

	// Nombre de jour maximum pour chaque mois. 
	function nombreDeJourMax($mois, $annee){
		$maximum = 31;
		switch ($mois){
			case 2:{
				(bissextile($annee) ? $maximum = 29 : $maximum = 28);
				break;
			}
			case 4: case 6: case 9: case 11:{
				$maximum = 30;
				break;
			}
		}
		return $maximum;
	}

	// Vérifier si l'année est bissextile.
	function bissextile($annee){
		$verif = 0;
		if(($annee % 400 == 0) || (($annee % 100 != 0) && ($annee % 4 == 0))){
			$verif = 1;
		}
		return $verif;
	}