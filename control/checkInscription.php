<?php
	session_start();
	$urlRedirection = 'Location: ../view/inscription.php';

	//si le client a soumis le formulaire
	if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {

		// si les variables existent && si elles ne sont pas vides
		if ((isset($_POST['Nom']) && !empty($_POST['Nom'])) && (isset($_POST['Prenom']) && !empty($_POST['Prenom'])) && 
				(isset($_POST['Email']) && !empty($_POST['Email'])) && (isset($_POST['Pseudo']) && !empty($_POST['Pseudo'])) && 
				(isset($_POST['DateNaiss']) && !empty($_POST['DateNaiss'])) && (isset($_POST['Sexe']) && !empty($_POST['Sexe'])) && 
				(isset($_POST['Adresse']) && !empty($_POST['Adresse'])) && (isset($_POST['Langue']) && !empty($_POST['Langue'])) && 
				(isset($_POST['Mdp']) && !empty($_POST['Mdp'])) && (isset($_POST['Pass_confirm']) && !empty($_POST['Pass_confirm'])) && 
				(isset($_POST['Question2secu']) && !empty($_POST['Question2secu']))) {

			// Classe de vérification des formulaires.
			require_once('checkForm.class.php');

			// Instance d'un objet pour récupérer les champs saisies par l'utilisateur.
			require_once(__DIR__.'/../model/Membre.class.php');
			$nouveauMembre = new Membre();
			$nouveauMembre->setNom( checkForm::formatTexte($_POST['Nom'], 1));
			$nouveauMembre->setPrenom( checkForm::formatTexte($_POST['Prenom'], 2));
			$nouveauMembre->setMail( checkForm::formatTexte($_POST['Email'], 2));
			$nouveauMembre->setPseudo($_POST['Pseudo']);
			$nouveauMembre->setAnniversaire($_POST['DateNaiss']);
			$nouveauMembre->setType($_POST['Sexe']);
			$nouveauMembre->setAdresse( checkForm::formatTexte($_POST['Adresse'], 2));
			$nouveauMembre->setLangue($_POST['Langue']);
			$nouveauMembre->setPassword($_POST['Mdp']);
			$nouveauMembre->setReponse($_POST['Question2secu']);


			// on teste les deux mots de passe
			if (checkForm::validePassword($_POST['Mdp'], $_POST['Pass_confirm']) != 0) {
				
				$_SESSION['erreur'] = '<div id="erreur"> Les mots passes sont différents</div>';

			} else {

				// Obtenir une connexion à la base de données.
				require_once(__DIR__.'/../dao/Connexion.class.php');
				$base = Connexion::getMySQLIConnexion();
				// Communiquer avec la tables des utilisateurs.
				require_once(__DIR__.'/../dao/MembreDAO.class.php');
				$listeMembre = new MembreDAO();

				switch($listeMembre->rechercherMailOuPseudo($nouveauMembre->getMail(), $nouveauMembre->getPseudo())){

					case 0: {
						// Enregistrement en base de données.
						if($listeMembre->ajouterMembre($nouveauMembre) == 1){

							// Ajouter les informations de l'utilisateur dans sa session.
							$_SESSION['user'] = serialize($listeMembre->authentification($nouveauMembre->getMail(), $nouveauMembre->getPassword()));
							header('Location: ../home.php');
							exit();

						} else {
							$_SESSION['erreur'] = "<div id='erreur'> Echec de l'inscription </div>";
						}
						break;
					}
					case 1: {
						$nouveauMembre->setMail('');
						$nouveauMembre->setPseudo('');
						$_SESSION['erreur'] = '<div id="erreur"> Un membre possède déjà cette adresse mail ou ce pseudo </div>';
						break;
					}
				}
			}

		} else {
			$_SESSION['user'] = serialize($nouveauMembre);
			$_SESSION['erreur'] = '<div id="erreur"> Au moins un champs est vide, veuillez saisir tous les champs!</div>';
		}

		// Insertion des infos du membre dans sa session.
		$_SESSION['user'] = serialize($nouveauMembre);

		header($urlRedirection);
		exit();

	} else {
		header($urlRedirection);
		exit();
	}