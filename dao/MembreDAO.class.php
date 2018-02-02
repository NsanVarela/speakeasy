<?php
	require_once('Connexion.class.php');		// Connexion à la base de données.
	require_once(__DIR__.'\..\model\Membre.class.php');
	
	class MembreDAO {

		private $db;
		
		/*
		 * Constructeur par défaut.
		 */
		function __construct(){
			$this->db = Connexion::getPDOConnexion();
		}
		
		/*
		 * Ajouter un nouveau membre.
		 */
		/*public function ajouterMembre($nouveauMembre){
			
			$query = $this->db->prepare('INSERT INTO user (email, nom, prenom, pseudo, mdp, typeProfil, type, adresse, dateInscription)
											VALUES (:email, :nom, :prenom, :pseudo, :passe, :profil, :type, :adresse, :temps)');
			
			$query->bindValue(':email', $nouveauMembre->getMail(), PDO::PARAM_STR);
			$query->bindValue(':nom', $nouveauMembre->getNom(), PDO::PARAM_STR);
			$query->bindValue(':prenom', $nouveauMembre->getPrenom(), PDO::PARAM_STR);
			$query->bindValue(':pseudo', $nouveauMembre->getPseudo(), PDO::PARAM_STR);
			$query->bindValue(':passe', $nouveauMembre->getPassword(), PDO::PARAM_STR);
			
			$query->bindValue(':profil', 2, PDO::PARAM_STR);
			$query->bindValue(':type', $nouveauMembre->gettype(), PDO::PARAM_STR);
			$query->bindValue(':adresse', $nouveauMembre->getAdresse(), PDO::PARAM_STR);
			$query->bindValue(':temps', $nouveauMembre->getDateInscription(), PDO::PARAM_STR);
			$query->execute();
			$query->CloseCursor();
		}*/
		
		/*
		 * Mise à jour du profil d'un membre.
		 */
		public function miseAJourMembre($membre){
			$query = $this->db->prepare("UPDATE user SET email = :email, nom = :nom, prenom = :prenom, pseudo = :pseudo, mdp = :passe, dateNaissance = :dateNaiss, type = :type, adresse = :adresse, langue = :langue WHERE id_user = :id_user");
			$query->bindValue(':email', $membre->getMail(), PDO::PARAM_STR);
			$query->bindValue(':nom', $membre->getNom(), PDO::PARAM_STR);
			$query->bindValue(':prenom', $membre->getPrenom(), PDO::PARAM_STR);
			$query->bindValue(':pseudo', $membre->getPseudo(), PDO::PARAM_STR);
			$query->bindValue(':passe', $membre->getPassword(), PDO::PARAM_STR);
			$query->bindValue(':dateNaiss', $membre->getAnniversaire(), PDO::PARAM_STR);
			$query->bindValue(':type', $membre->getType(), PDO::PARAM_INT);
			$query->bindValue(':adresse', $membre->getAdresse(), PDO::PARAM_STR);
			$query->bindValue(':langue', $membre->getLangue(), PDO::PARAM_STR);
			$query->bindValue(':id_user', 1/*$membre->getID()*/, PDO::PARAM_INT);
			$query->execute();
			$query->CloseCursor();
		}
		
		/*
		 * Utile pour assurer l'authentification de chaque participant au mooc.
		 */
		/*public function authentificationMembre($pseudo, $mdp, $date){
			
			$result = $this->db->prepare('SELECT id_user, email, nom, prenom, pseudo, mdp, typeProfil, type, adresse FROM user WHERE pseudo = :pseudo AND mdp = :passe');
			$result->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$result->bindValue(':passe', $mdp, PDO::PARAM_STR);
			$result->execute();
			
			$membre = new Membre();
			
			if($row = $result->fetch()){
				
				$membre->setID($row['id_user']);
				$membre->setNom($row['nom']);
				$membre->setPrenom($row['prenom']);
				$membre->setPseudo($row['pseudo']);
				$membre->setmdp($row['mdp']);
				$membre->setTypeProfil($row['typeProfil']);
				$membre->setMail($row['email']);
				$membre->setAdresse($row['adresse']);
				$membre->settype($row['type']);
				$result->CloseCursor();
				
				// Faire la MAJ de la dernière date de connexion.
				$result = $this->db->prepare('UPDATE user SET derniereVisite = :date WHERE id_user = :IdMembre');
				$result->bindValue(':date', $date, PDO::PARAM_STR);
				$result->bindValue(':IdMembre', $membre->getID(), PDO::PARAM_INT);
				$result->execute();
				$result->closeCursor();		
			}
			
			$result->closeCursor();
			return $membre;
		}*/
		
		/*
		 * Utiliser lors de la phase de réinitialisation du mot de passe
		 * afin d'envoyer le lien de modification dans un e-mail.
		 */
		/*public function rechercherMembreParMailPseudo($email, $pseudo){
			
			$result = $this->db->prepare('SELECT id_user, email, nom, prenom, pseudo, mdp, typeProfil, type, adresse FROM user WHERE email = :email AND pseudo = :pseudo');
			$result->bindValue(':email', $email, PDO::PARAM_STR);
			$result->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$result->execute();
			
			if($row = $result->fetch()){
					
				$membre = new Membre();
				$membre->setID($row['id_user']);
				$membre->setNom($row['nom']);
				$membre->setPrenom($row['prenom']);
				$membre->setPseudo($row['pseudo']);
				$membre->setmdp($row['mdp']);
				$membre->setTypeProfil($row['typeProfil']);
				$membre->setMail($row['email']);
				$membre->setAdresse($row['adresse']);
				$membre->settype($row['type']);		
			}
			
			$result->CloseCursor();
			return $membre;
		}*/
		
		/*
		 * Utiliser pour la phase de réinitialisation du mot de passe.
		 * Il faut s'assurer qu'un utilisateur n'a pas modifié les informations
		 * de l'URL qui lui ont été fournies par e-mail.
		 */
		/*public function rechercherMembreParIDPseudo($id, $pseudo){
			
			$result = $this->db->prepare('SELECT id_user, email, nom, prenom, pseudo, mdp, typeProfil, type, adresse FROM user WHERE id_user = :IdMembre AND pseudo = :pseudo');
			$result->bindValue(':IdMembre', $id, PDO::PARAM_INT);
			$result->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$result->execute();
			
			$membre = new Membre();
			
			if($row = $result->fetch()){

				$membre->setID($row['id_user']);
				$membre->setNom($row['nom']);
				$membre->setPrenom($row['prenom']);
				$membre->setPseudo($row['pseudo']);
				$membre->setmdp($row['mdp']);
				$membre->setTypeProfil($row['typeProfil']);
				$membre->setMail($row['email']);
				$membre->setAdresse($row['adresse']);
				$membre->settype($row['type']);	
			}
			
			$result->CloseCursor();
			return $membre;			
		}*/
		
		/*
		 * Utiliser lors de la phase de vérification de l'unicité du pseudo avant chaque nouvelle inscription.
		 */
		/*public function rechercherPseudo($pseudo){
			
			$query = $this->db->prepare('SELECT pseudo FROM user WHERE pseudo LIKE :pseudo');
			$query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$query->execute();
			$result = $query->fetch();
			$query->CloseCursor();
			
			if($result){		
				return true;
			} else {
				return false;
			}			
		}*/
		
		/*
		 * Utiliser lors de la phase de vérification de l'unicité de l'adresse mail avant chaque nouvelle inscription.
		 */
		/*public function rechercherEmail($email){
			$query = $this->db->prepare('SELECT id_user FROM user WHERE email LIKE :email');
			$query->bindValue(':email', $email, PDO::PARAM_STR);
			$query->execute();
			$result = $query->fetch();
			$query->CloseCursor();
			
			if($result){								
				return $result['id_user'];
			} else {
				return false;
			}
		}*/	
	}