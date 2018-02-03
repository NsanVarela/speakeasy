<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
        exit();
    }

    require_once('/view/userInSession.php');

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
    <!-- MENU -->
    <div id="app" class=" bg-dark">
        <nav class="navbar bg-dark navbar-expand-lg navbar-light bg-faded nav bg-company-red">
            <a class="navbar-brand text-white" href="home.php">[ SpeakEasy ]  </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarNavDropdown" class="navbar-collapse collapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul id="menu" class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white current" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="service.php">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="library.php">Library</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="view/update_profil.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i><?php echo " ".htmlentities($user->getPseudo());?></a>
                    </li>
                      <li class="nav-item">
                      <a href="deconnexion.php" class="nav-link text-white" href="#">Log out</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script type="text/javascript" src="javascript.js"></script>
  </body>
</html>
