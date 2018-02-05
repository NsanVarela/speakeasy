<?php
	session_start();
	require_once(__DIR__.'/../model/Membre.class.php');
	$user = new Membre();

	if (!empty($_SESSION['user'])){
		$user = unserialize($_SESSION['user']);
		unset($_SESSION['user']);
	}

	if(!empty($_SESSION['erreur'])){
		echo $_SESSION['erreur'];
		unset($_SESSION['erreur']);
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	    <meta name="viewport" content="initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="stylesheet.css">
	    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans|Varela+Round" rel="stylesheet">

	    <title>Speakeasy</title>
	</head>
	<body>
		<br><br>
		<a class="titre" > <b><font color="#b4cc83" >SPEAK</font>  <font color="#154854"> EASY </font> </b></a><br>
		<div class="row" style="margin:auto;">
			<div id="col1" class="col-md-5">
                <form class="formulaire" action="../control/checkInscription.php" method="POST">
					<!--NOM-->
					<input onfocus="currentForm = this.form;"  id="inputConnexion" type="text" placeholder="  Nom" class="inputEmail" name="Nom" value="<?php echo $user->getNom(); ?>"/> <BR><BR>

					<!--Prenom-->
					<input onfocus="currentForm = this.form;" id="inputConnexion" type="text" placeholder="  Prenom" class="inputEmail" name="Prenom" value="<?php echo $user->getPrenom(); ?>"/> <BR><BR>

						<!--Sexe-->
					<div class="input-group mb-3">
						<div class="input-group-prepend"></div>
						<select onfocus="currentForm = this.form;" class="custom-select" id="inputGroupSelect03"  class="inputEmail" name="Sexe">
						    <option value="0" selected>Sexe</option>
						    <option value="1">Homme</option>
						    <option value="2">Femme</option>
						    <option value="3">Autre</option>
						</select>
					</div>


					<!--Date de naissance-->
					<input  onfocus="currentForm = this.form;" id="inputConnexion" type="date" placeholder="  Date de naissance" class="inputEmail" name="DateNaiss" value="<?php echo $user->getAnniversaire(); ?>"/> <BR><BR>

				    <!--Adresse-->
					<input onfocus="currentForm = this.form;" id="inputConnexion" type="text" placeholder="  Addresse" class="inputEmail" name="Adresse" value="<?php echo $user->getAdresse();; ?>"/> <BR><BR>

					<!--Langue-->
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					   
					  </div>
					  <select onfocus="currentForm = this.form;" class="custom-select" id="inputGroupSelect03"  class="inputEmail" name="Langue" value="<?php if (isset($_POST['Langue'])) echo htmlentities(trim($_POST['Langue'])); ?>">
					    <option selected> Choose</option>
					    <option value="Français">Français</option>
					    <option value="Anglais">Anglais</option>
					    <option value="Espagnol">Espagnol</option>
					    <option value="Arabe">Arabe</option>
					    <option value="Chinois">Chinois</option>
					    <option value="Portugais">Portugais</option>
					    <option value="Japonais">Japonais</option>
					    <option value="Italien">Italien</option>
					    <option value="Allemand">Allemand</option>
					    <option value="Russe">Russe</option>
					    <option value="Neerlandais">Neerlandais</option>
					  </select>
					</div>
              </div> 


              <div id="col1" class="col-md-5">

                	<!--Email-->
					<input onfocus="currentForm = this.form;" id="inputConnexion" type="text" placeholder="  Email" class="inputEmail" name="Email" value="<?php echo $user->getMail(); ?>"/> <BR><BR>

					<!--Pseudo-->
					<input onfocus="currentForm = this.form;"  id="inputConnexion" type="text" placeholder="  Pseudo" class="inputEmail" name="Pseudo" value="<?php echo $user->getPseudo(); ?>"/> <BR><BR>

					<!--Question des sécurité-->
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					   
					  </div>
					  <select class="custom-select" id="inputGroupSelect03">
					    <option selected>Question de sécurité</option>
					    <option value="1">Quel est le nom de votre père?</option>
					    <option value="2">Quelle est la couleur de ta première voiture</option>
					    <option value="3">Ton annimé préféré</option>
					  </select>
					</div>


					<!--Réponse-->
			  		 <input onfocus="currentForm = this.form;" id="inputConnexion" type="text" placeholder="  Réponse" class="inputEmail" name="Question2secu" value="<?php echo $user->getReponse(); ?>"/> <BR><BR>

					<!--Mot de passe -->	
					<input onfocus="currentForm = this.form;" id="inputConnexion" type="password" placeholder="  Mot de passe" class="inputEmail" name="Mdp" value="<?php if (isset($_POST['Mdp'])) echo htmlentities(trim($_POST['Mdp'])); ?>"/> <BR><BR>		
						
				
					<!--Confirmation du mot de passe-->
					<input onfocus="currentForm = this.form;" id="inputConnexion" type="password" placeholder="  Confirmez votre mot de passe" class="inputEmail" name="Pass_confirm" value="<?php if (isset($_POST['Pass_confirm'])) echo htmlentities(trim($_POST['Pass_confirm'])); ?>"/> 

				
				</div>
							<!--BTN inscription -->
				<div id="col1" class="col-md-2">
					<input class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="btnConnexion" type="submit" name="inscription" value="Inscription"/>
				</div>
				</form> 
			
             </div><!--fin div class row-->
                
<style>
body{
	background-color: #333; 
}
#erreur{
	height: 50px;
	width: 100%;
	border-style: none;
	text-align: center;
	top:0;
	font-style: bold;
	margin:auto;
	background-color: #BD3749;
	color:white;
	position: fixed;
}
.col1{
	padding-left:;
}
.titre{
	margin:auto;
}
.formulaire{
	margin-bottom:35px;
}

#inputConnexion{
	height: 50px;
	width: 60%;
	border-radius:10px;
	border-style: none;

}
.custom-select{
	height: 50px;
	width: 60%;
	border-radius:10px;
	border-style: none;
}
#btnConnexion{
	background-color:#154854;
	color:white;
	height: 50px;
	width: 60%;
	border-radius:10px;
	border-style: none;

}
#btnConnexion:hover{
	background-color:#b4cc83;
	color:white;
}
.formLien{
    padding-left:30px;
    padding-right:30px;
	height: 50px;
	width: 50%;
}

.titre{
	font-size: 100px;
}
.text_accueil{
	background-color: white;
	height: 200px;
    margin-left:20%;
    margin-right:20%;
    margin-top: 5%;
}
.hrIndexConnexion{
   width : 5px;
   height : 250px;
   display: inline-block;
   margin-bottom: 0px;
}
.formLien800maxWidth{
	display: none;
}


/*******************************************/

@media (max-width: 1024px){
  .hrIndexConnexion{
    display: none;
  }
  #inputConnexion{
		width: 80%;
	}
	#btnConnexion{
		width: 80%;
	}
	.titre{
		margin-left:40px;
		text-align:center;
	}
@media (max-width: 800px){
  .hrIndexConnexion{
    display: none;
  }
  .formulaire{
    margin-left:20%;
    margin-right: 10%;
  }

	#inputConnexion{
		width: 80%;
	}
	#btnConnexion{
		width: 80%;
	}
	#aSinscrire{
    display: none;
		
	}
	#aMDPoublie{
	     display: none;

	}
	.formLien800maxWidth{
	      display: block;
    }
}
   @media (max-width: 20px){
   .titre{
   	font-size: 80px;
   	text-align: center;
}
  .hrIndexConnexion{
    display: none;
  }
  .formulaire{
    margin-left:20%;
    margin-right: 10%;
  }

	#inputConnexion{
		width: 80%;
	}
	#btnConnexion{
		width: 80%;
	}
	#aSinscrire{
    display: none;
		
	}
	#aMDPoublie{
	     display: none;

	}
	.formLien800maxWidth{
	      display: block;
    }
     }
</style>
	

</body>
</html>