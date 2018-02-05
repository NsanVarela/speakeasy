<?php
	//si le visiteur a soumis le formulaire de connexion
	if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
		if ((isset($_POST['Email']) && !empty($_POST['Email'])) && (isset($_POST['Mdp']) && !empty($_POST['Mdp']))) {

			require_once(__DIR__.'/dao/Connexion.class.php');
			$base = Connexion::getMySQLIConnexion();

			require_once(__DIR__.'/dao/MembreDAO.class.php');
			$listeMembre = new MembreDAO();

			// si une entrée de la base contient le login / pass
			$user = $listeMembre->authentification($_POST['Email'], $_POST['Mdp']);

			// si on obtient une réponse, alors l'utilisateur est un client2fodis
			if ($user->getID() > 0) {
				session_start();
				$_SESSION['user'] = serialize($user);
				header('Location: home.php');
				exit();
			} else {			// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
				$erreur =  '<div id="erreur">Email ou mot de passe incorrect!</div>';				   
			}
		} else {
			$erreur = '<div id="erreur">Veuillez remplir<br> tous les champs!!!</div>';
		}

	}

	if (isset($erreur)) echo '<br /><br />',$erreur;
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
    <style type="text/css" src="/view/css/styleIndex.css"></style>
</head>
<body>
<br><br><br><br><br>
<br><br><br>
	<div class="containerInscription">

		<a id="hovInscription" href="inscription.php">Inscription</a> 
		<a href="inscription.php"></a>
	 
		<a id="hovInscription" href="mdpOublie.php">Mot depasse oublié </a>
	</div>
	   <div class="row">
                       
              <div class=" col-md-6">
                  <a class="titre"> <b><font color="#b4cc83" >SPEAK</font>  <font color="#154854"> EASY </font> </b></a><hr class="hrIndexConnexion">
              </div> 

              <div  id="form1" class="col-md-6"><br>
                 <form class="formulaire" action="index.php" method="POST">
			
					<input onfocus="currentForm = this.form;" id="inputConnexion" type="text" placeholder="  Email" class="inputEmail" name="Email"  value="<?php if (isset($_POST['Email'])) echo htmlentities(trim($_POST['Email']));?>"/> <BR><BR>
				
					<input  onfocus="currentForm = this.form;" id="inputConnexion" type="password" placeholder="  Mot de passe" class="inputPass" name="Mdp" value="<?php if (isset($_POST['Mdp'])) echo htmlentities(trim($_POST['Mdp']));?>"/> <BR><BR>

					<input id="btnConnexion" type="submit" name="connexion" value="Connexion"/><br><br>
						
					<div class="formLien">
						<a id="aMDPoublie" href="view/mdpOublie.php" style="color:#b4cc83;text-decoration: none;"><u>Mot de passe oublié </u></a> 
						<a id="aSinscrire" href="view/inscription.php" style="color:#b4cc83;text-decoration: none; float: right;"><u>S'inscrire </u></a>
					</div>
					<div class="formLien800maxWidth">
						<a id="aMDPoublie" href="#" style="color:#b4cc83;text-decoration: none;"><u>Mot de passe oublié </u></a> 
						<a id="aSinscrire" href="#" style="color:#b4cc83;text-decoration: none;"><u>S'inscrire </u></a>
					</div>
				</form> <br>
			
              </div>
                    </div>

<!-- <div class="text_accueil">
	

</div> -->
<style>
body{
	background-color: #333; 
}
.containerInscription{
	position:fixed;
	height: 50px;
	width: 100%;
	background-color:#154854; 
	bottom:0;
	display: none;
	text-align: center;
}
.containerInscription a{
	 margin:50px;
	 color:white;
	 text-decoration: underline;
	 line-height: 40px;
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
.titre{
	margin:50px;
}
.formulaire{
	margin-bottom:35px;
}

#inputConnexion{
	height: 50px;
	width: 50%;
	border-radius:10px;
	border-style: none;

}
#btnConnexion{
	background-color:#154854;
	color:white;
	height: 50px;
	width: 50%;
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
	.containerInscription{
    	display: inline-block;
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

    .containerInscription{
    	display: inline-block;
     }
 }
</style>
</body>
</html>