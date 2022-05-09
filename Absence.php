<?php
include('connexion.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Saisir Absence</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY --> 
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
 <!--les style.css-->
 <link href="style.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
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
          <a class="dropdown-item" href="afficherAbsence">Etat des absence pour un groupe</a>
         
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

<main role="main">
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
        <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
      </div>
    </div>

    <div class="container">
      <?php
        if (isset($_POST['ajouter'])) {
          $dateAbs = trim($_POST['deb']);
          $classe = trim($_POST['classe']);
          $module = trim($_POST['module']);
          $type = trim($_POST['type']);
          $nom= trim($_POST['nom']);
          $sql = "INSERT INTO absence (nomEtd, classe, module, dateAbs, typeAbs) values (:nomEtd, :classe, :module, :dateAbs, :typeAbs)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute([
            ':dateAbs' => $dateAbs,
            ':classe' => $classe,
            ':module' => $module,
            ':typeAbs' => $type,
            ':nomEtd' => $nom,
          ]);
          $erreur = "Ajout effectué";
        }
      
      ?> 
      <div class="container">
        <form action="saisirAbsence.php" method="POST" id="myForm">
          <div class="form-group">
            <label for="deb">Selectionner la date d'absence:</label><br>
            <input type="date" id="deb" name="deb" value="2022-05-01" min="1980-01-01" max="2022-12-31">
          </div>
          <div class="form-group">
          <label for="module">Selectionner un module:</label><br>
            
            <select id="module" name="module"  class="custom-select custom-select-sm custom-select-lg">
               <option value="Tech.Web">Tech. Web</option>
               <option value="SGBD">SGBD</option>
               <option value="Struct.Don">Struct.Don</option>
               <option value="Anl.Num">Anl.Num</option>
               <option value="Stat">Stat</option>
               <option value="POO">POO</option>
               <option value="TP.POO">TP.POO</option>
               <option value="Ang">Ang</option>
               <option value="Fr">Fr</option>
            </select>
            <label for="classe">Selectionner la Classe:</label>
            <select name="classe" id="classe" class="custom-select custom-select-sm custom-select-lg">
               <option value="INFO1-A">INFO1-A</option>
               <option value="INFO1-B">INFO1-B</option>
               <option value="INFO1-C">INFO1-C</option>
               <option value="INFO1-D">INFO1-D</option>
               <option value="PINFO1-E">INFO1-E</option>
            
            </select>


            <label for="type">Selectionner le type d'absence:</label><br>
            <select id="type" name="type"  class="custom-select custom-select-sm custom-select-lg">
               <option value="Justifieé">Justifièe</option>
               <option value="NoNJustifieé">NoN Justifièe</option>
              </select>
          </div>
          <button type="submit" name="ajouter" value="ajouter" class="btn btn-primary btn-block">Valider</button>
        </form>
      </div>
    </div>
  </main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>