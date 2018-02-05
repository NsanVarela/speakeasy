<?php

	class Membre {
		
		private $id;
		private $nom;
		private $prenom;
		private $pseudo;
		private $photo;
		private $password;
		private $reponse;
		private $mail;
		private $anniversaire;
		private $type;
		private $adresse;
		private $langue;
		private $description;

		/********** Constructeurs **********/
		function __construct(){
			$this->nom = '';
			$this->prenom = '';
			$this->pseudo = '';
			$this->photo = '';
			$this->password = '';
			$this->reponse = '';
			$this->mail = '';
			$this->anniversaire = '';
			$this->type = '';
			$this->adresse = '';
			$this->langue = '';
			$this->description = '';
		}

		/********** Accesseurs **********/
		public function getID(){
			return $this->id;
		}
		
		public function getNom(){
			return $this->nom;
		}
		
		public function getPrenom(){
			return $this->prenom;
		}
		
		public function getPseudo(){
			return $this->pseudo;
		}
		
		public function getPhoto(){
			return $this->photo;
		}
		
		public function getPassword(){
			return $this->password;
		}
		
		public function getReponse(){
			return $this->reponse;
		}
		
		public function getMail(){
			return $this->mail;
		}
		
		public function getAnniversaire(){
			return $this->anniversaire;
		}
		
		public function getType(){
			return $this->type;
		}
		
		public function getAdresse(){
			return $this->adresse;
		}
		
		public function getLangue(){
			return $this->langue;
		}
		
		public function getDescription(){
			return $this->description;
		}
		
		
		/********** Mutateurs **********/
		public function setID($id){
			$this->id = $id;
		}
		
		public function setNom($nom){
			$this->nom = $nom;
		}
		
		public function setPrenom($prenom){
			$this->prenom = $prenom;
		}
		
		public function setPseudo($pseudo){
			$this->pseudo = $pseudo;
		}
		
		public function setPhoto($photo){
			$this->photo = $photo;
		}
		
		public function setPassword($password){
			$this->password = $password;
		}
		
		public function setReponse($reponse){
			$this->reponse= $reponse;
		}
		
		public function setMail($mail){
			$this->mail = $mail;
		}
		
		public function setAnniversaire($anniversaire){
			$this->anniversaire = $anniversaire;
		}
		
		public function setType($type){
			$this->type = $type;
		}
		
		public function setAdresse($adresse){
			$this->adresse = $adresse;
		}
		
		public function setLangue($langue){
			$this->langue = $langue;
		}
		
		public function setDescription($description){
			$this->description = $description;
		}
	}