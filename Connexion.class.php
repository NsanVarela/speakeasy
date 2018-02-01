<?php
	Class Connexion {
		
		public static function getPDOConnexion(){
			try {
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES utf8';
				$db = new PDO('mysql:host=localhost;dbname=bdd_speakeasy', 'root', '', $pdo_options);
				return $db;
			} catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
			}
		}
		
		public static function getMySQLIConnexion(){
			try {
				$mysqli = new mysqli("localhost", "root", "", "bdd_speakeasy");
				return $mysqli;
			} catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
			}
		}
	}
