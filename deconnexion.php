<html>
	<head>
	</head>
	<body  bgcolor="#333">
		<style>
		.row{

		}
		.titre{
			font-size: 100px;
			margin:auto;
			text-align: center;
		}
		</style>
<?php
		session_start();
		if($_SESSION['user']){

			// Récupérer les informations de l'utilisateur dans sa session.
			require_once(__DIR__.'/view/userInSession.php');
			// Charger la classe d'interface avec la table des utilisateurs.
			require_once(__DIR__.'/dao/MembreDAO.class.php');
			$listeMembre = new MembreDAO();
			$listeMembre->deconnexion($user->getID());
			echo('<div> <a class="titre"> <b><font color="#b4cc83" >A </font>  <font color="#154854"> BIENTOT </font> </b></a></div>');

			session_unset();
			session_destroy();
			exit();
		}
?>
	</body>
</html>