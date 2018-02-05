<?php

	class checkForm {

		/**** Fonctions de controle ****/

		// Vérifier le format d'une adresse e-mail.
		public static function valideEmail($email){
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
		public static function valideTexte($saisie){
			$saisie = trim($saisie);
			if((strlen($saisie) > 0) && (!is_numeric($saisie))){
				return true;
			}
			return false;
		}

		// Formater le texte.
		public static function formatTexte($texte, $choix){
			$texte = trim($texte);
			switch ($choix) {
				case 1:{		// Majuscule
					$texte = strtoupper($texte);
					break;
				}
				case 2:{		// Minuscule
					$texte = strtolower($texte);
					break;
				}
			}
			return $texte;
		}

		//	Vérifier si deux chaines de caractères sont identiques.
		public static function validePassword($password1, $password2){
			return strcmp($password1, $password2);
		}

		// Vérification de la validité de la date saisie.
		public static function valideDate($date){
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
		private static function nombreDeJourMax($mois, $annee){
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
		private static function bissextile($annee){
			$verif = 0;
			if(($annee % 400 == 0) || (($annee % 100 != 0) && ($annee % 4 == 0))){
				$verif = 1;
			}
			return $verif;
		}
	}