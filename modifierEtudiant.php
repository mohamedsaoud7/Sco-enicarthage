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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="icon" href="download.png" >
    <title>  Modifier Etudiant</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        body{
            background-image: url("class.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            height:100vh;
        }
    </style>    
</head>
<body>
<a href="index.php">Retour</a>
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Modifier les étudiants</h1>
                 <div class="container">
 <?php
  include("connexion.php");
  global $pdo;
 $sql= "SELECT * from etudiant";
$stmt = $pdo->prepare($sql);
$stmt->execute();
while($etudiants = $stmt->fetch(PDO::FETCH_ASSOC)){
  $cin = $etudiants['cin'];
  $nom = $etudiants['nom'];
  $prenom = $etudiants['prenom'];
  $email = $etudiants['email'];
  $classe = $etudiants['Classe'];
?>
     <tr>
         <td>
             <?php echo $cin?>
         </td>
         <td>
              <?php echo $nom?>
         </td>
         <td>
              <?php echo $prenom?>
         </td>
         <td>
              <?php echo $email?>
         </td>
         <td>
              <?php echo $classe?>
         </td>
         <td> <br>
              <?php
                 if($_SESSION["autoriser"]!="oui"){
                   header("location:login.php");
                   exit();
                  }
                  else {
                    if(isset($_POST['editpost'])){
                      $cinu=trim($_POST['cin']);
                      $nom=trim($_POST['nom']);
                      $prenom=trim($_POST['prenom']);
                      $email=trim($_POST['email']);
                      $adresse=trim($_POST['adresse']);
                      $id = $_POST['id'];
                      $sql= "UPDATE etudiant SET cin = :cin, email = :email, nom = :nom, prenom = :prenom, adresse = :adresse WHERE cin = :id";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute([
                        ':cin' => $cinu,
                        ':email' => $email,
                        ':nom' => $nom,
                        ':prenom' => $prenom,
                        ':adresse' => $adresse,
                        ':id' => $id
                      ]);
                      $erreur ="La modification sera términer";
                    }
                  }
                }
                  
                  ?>
         <form action="modifierEtudiant.php" method="POST">
            <input type="hidden" name="id"  value="<?php echo $cin ?>" />
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
               Editer
            </button>

<!-- Modal -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Editer Etudiant</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                     <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $cin ?>" />
                        <label for="nom">Nom:</label><br>
                        <input type="text" id="nom" name="nom" class="form-control" required autofocus>
                        </div>
                        <!--Prénom-->
                        <div class="form-group">
                        <label for="prenom">Prénom:</label><br>
                        <input type="text" id="prenom" name="prenom" class="form-control" required>
                        </div>
                        <!--Email-->
                        <div class="form-group">
                            <label for="email">Email:</label><br>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <!--CIN-->
                        <div class="form-group">
                        <label for="cin">CIN:</label><br>
                        <input type="text" id="cin" name="cin"  class="form-control" required />
                        </div>
                         <!--Adresse-->
                        <div class="form-group">
                        <label for="adresse">Adresse:</label><br>
                        <textarea id="adresse" name="adresse" class="form-control" required>
                        </textarea>
                        </div>
                    </div>
                     <div class="modal-footer">
                       <button type="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                       <button type="submit" name="editpost" value="editer" class="btn btn-primary">Update</button>
                     </div>
                     </div> 
                   </div>
                 </div>
               </div>
        </form>
 </table>
 <br>
 </div>
 <button  type="button" onload="refresh()" class="btn btn-primary btn-block active">Actualiser</button>
</div>
</div>

</main>     
            </div>

     
          </div>
   
            <!-- Filter: https://css-tricks.com/gooey-effect/ -->
            <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
                <defs>
                    <filter id="goo"><feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />    
                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                        <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                    </filter>
                </defs>
            </svg>
            
            
        </div>
        
            </form>
            </form>
            </div>
            <ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>  
            </div>
            
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>