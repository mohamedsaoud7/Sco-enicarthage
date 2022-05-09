<?php
   session_start();
   @$login=$_POST["email"];
   @$pass=md5($_POST["password"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexion.php");
      $sel=$pdo->prepare("select * from enseignant where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:index.php");
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
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
            margin:0px;
            padding:0px;
            background-image: url("download.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            height:100vh;
            
                       
         }
         input{
            border:solid 1px #2222AA;
            margin-bottom:10px;
            padding:16px;
            outline:none;
            border-radius:6px;

         }
         .erreur{
            color:#CC0000;
            margin-bottom:10px;
            margin-left:220px;
         }
         img{
            width:200px;
            height:100px;
            margin-left:1200px;
            float:right;
         }
         a{
            font-size:16pt;
            color:blue;
            text-decoration:none;
            font-weight:normal;
         }
         a:hover{
            text-decoration:underline;
         }
         h1{
            margin-left:370px;
            color:brown;
            text-shadow:2px 2px brown;
            text-decoration-line: underline;
            text-decoration-thickness: auto;
         }
         h2{
            margin-left:220px;
            color:brown;
         }

      </style>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   </head>
   <body onLoad="document.fo.login.focus()">
      <img src="Logo_ENICarthage.jpg" alt="Logo">
      <h2>Authentification [ <a href="inscription.php">Je n'ai pas un compte </a> ]</h2>
      
      <div class="erreur"><?php echo $erreur ?></div>
      <div class="container">
  
  <form name="fo" method="post" action="">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <br>
    <input type="submit" name="valider" value="S'authentifier" />
  </form>
  <h1>Sco-enicar<h1\>
  <br>
  
      
   </body>
</html>