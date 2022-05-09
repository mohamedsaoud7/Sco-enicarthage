<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         a{
            color:#EE6600;
            text-decoration:none;
         }
         a:hover{
            text-decoration:underline;
         }
         
      </style>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   </head>
   <body onLoad="document.fo.login.focus()">
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Sco-Enicar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestion Des Groupes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="afficheretudiants.php">Lister les etudiants</a>
          <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
          <a class="dropdown-item" href="ajoutergroup.php">Ajouter Groupe</a>
          <a class="dropdown-item" href="#">Modifier Groupe</a>
          <a class="dropdown-item" href="supprimerGroup.php">supprimer Groupe</a>
          
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestion Des Etudiants
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="AjouterEtudiant.php">ajouter etudiant</a>
          <a class="dropdown-item" href="chercherEtudiant.php">chercher etudiant</a>
          <a class="dropdown-item" href="modifierEtudiant.php">modifier etudiant</a>
          <a class="dropdown-item" href="supprimerEtudiant.php">supprimer etudiant</a>
          
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestion Des Absences
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Absence.php">Saisir Absence</a>
          <a class="dropdown-item" href="afficherAbsence.php">Etat des absence pour un groupe</a>
         
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="deconnexion.php">Deconnexion</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    
  </div>
</nav>

<div class="jumbotron text-center">
  <h1><?php echo $bienvenue?></h1>
  <p>Voulez-Vous faire un mise à jour de la scolarité ?</p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3><button type="button" class="btn btn-primary" href="#">Info A</button>
</h3>
      <p>Vous pouvez ajouter , supprimer ou modifier les étudiants</p>
      <p>Du Groupe A</p>
    </div>
    <div class="col-sm-4">
      <h3><button type="button" class="btn btn-primary">info B</button>
</h3>
      <p>Vous pouvez ajouter , supprimer ou modifier les étudiants</p>
      <p>Du Groupe B</p>
    </div>
    <div class="col-sm-4">
      <h3><button type="button" class="btn btn-primary">Info C</button>
</h3>        
      <p>Vous pouvez ajouter , supprimer ou modifier les étudiants</p>
      <p>Du Groupe C</p>
    </div>
  </div>
</div>

   </body>
</html>