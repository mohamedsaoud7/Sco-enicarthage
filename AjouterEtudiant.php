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
    <title>Title</title>
    <style>
    h1{
        border-bottom: 3px solid #cc9900;
        color: #996600;
        font-size: 30px;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
        body{
            background-image: url("class.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            height:100vh;
        }
    </style>    
<body> 

 


<h1>Ajouter un etudiant</h1>
<a href="index.php">Retour</a>
<p>
    <form id="myForm" method="POST">
    Nom:
    <br><input type="text" id="nom" name="nom" required/><br>
    Prenom:
    <br><input type="text" id="prenom" name="prenom" required/><br>
    CIN:
    <br><input type="number" id="cin" name="cin" required/><br>
    Mot de passe:
    <br><input type="password" id="pwd" name="pwd" required/><br>
    Confirmer Mot de passe:
    <br><input type="password" id="cpwd" name="cpwd" required/><br>
    E-mail:
    <br><input type="email" id="email" name="email" required/><br>
    Classe:
    <br><input type="text" id="classe" name="classe" required/><br>
    Adresse:
    <br><input type="text" id="adresse" name="adresse" required/><br>
    <p>male</p><input type="radio" name="sexe" value="male" />
    <p>femelle</p><input type="radio" name="sexe" value="femelle" /><br />
    <button type="button" onclick="ajouter()">Ajouter</button>
</form>
</p>
<div id="demo"></div>
<script>
    function ajouter()
    {
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/projectweb/ajouter.php";
        
        //Envoie Req
        xmlhttp.open("POST",url,true);

        form=document.getElementById("myForm");
        formdata=new FormData(form);

        xmlhttp.send(formdata);

        //Traiter Res

        xmlhttp.onreadystatechange=function()
            {   
                if(this.readyState==4 && this.status==200){
                // alert(this.responseText);
                    if(this.responseText=="OK")
                    {
                        document.getElementById("demo").innerHTML="L'ajout de l'étudiant a été bien effectué";
                        document.getElementById("demo").style.backgroundColor="green";
                    }
                    else
                    {
                        document.getElementById("demo").innerHTML="L'étudiant est déjà inscrit, merci de vérifier le CIN";
                        document.getElementById("demo").style.backgroundColor="#fba";
                    }
                }
            }
        
        
    }
    </script>
</body>
</html>