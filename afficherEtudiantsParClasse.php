<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et Bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et Bienvenue".
      $_SESSION["prenomNom"].
      "  dans votre espace personnel";
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
    <title>Ajouter Etudiant</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        body{
            background-color:green;
        }
    </style>    
</head>
<body>

      
<main role="main">
        <div class="jumbotron">
            <div class="container">
            
                 <h3><?php echo $bienvenue?></h3> 
              <h1 class="display-4">Afficher la liste d'étudiants par groupe</h1>
              <p>Cliquer sur la liste afin de choisir une classe!</p>
            </div>
          </div>
          <div class="container">
          <a href="index.php">Retour</a>

<div class="row">
<div class="table-responsive"> 
  
<div class="table table-striped table-hover ">
<p id="demo">     </p>
  </div>
  </div>
  </div>
  </div> 
<div class="container">
<form id ="myForm"  method="POST">
<div class="form-group">
<label for="classe" >Choisir une classe:</label><br>
<select id="classe"  name="classe"  class="custom-select custom-select-sm custom-select-lg">
    <option value="INFO1-A">INFO1-A</option>
    <option value="INFO1-B">INFO1-B</option>
    <option value="INFO1-C">INFO1-C</option>
    <option value="INFO1-D">INFO1-D</option>
    <option value="INFO1-E">INFO1-E</option>
</select>
</div>
<button type="button" onclick="rechercher()" class="btn btn-primary btn-block active" > selectioner</button>
</form>
</div>  
</main>



<script>
    function rechercher()
    {
        var xmlhttp = new XMLHttpRequest();
        var url="afficher_parCL.php";
        
        //Envoie Req
        xmlhttp.open("POST",url,true);
        form=document.getElementById("myForm");
        formdata=new FormData(form);
        xmlhttp.send(formdata);


     //Traiter la reponse
     xmlhttp.onreadystatechange=function()
            {  // alert(this.readyState+" "+this.status);
                if(this.readyState==4 && this.status==200){
                
                    myFunction(this.responseText);
                    alert(this.responseText);
                    console.log(this.responseText);
                    //console.log(this.responseText);
                }
            }


    //Parse la reponse JSON
	function myFunction(response){
		var obj=JSON.parse(response);
        //alert(obj.success);

        if (obj.success==1 && obj.etudiants!=[])
        {
		var arr=obj.etudiants;
		var i;
		var out="<table  bordre=1 class='table table-striped table-hover'  ><tr><th> CIN</th><th> Nom </th> <th> Prénom </th><th>adresse</th><th> Email</th><th>Classe </th></tr>"


		for ( i = 0; i < arr.length; i++) {
			out+="<tr><td>"+
			arr[i].cin +
			"</td><td>"+
			arr[i].nom+
			"</td><td>"+
			arr[i].prenom+
			"</td><td>"+
			arr[i].adresse+
			"</td><td>"+
			arr[i].email+
      "</td><td>"+
      arr[i].classe+
			"</td></tr> " ;
		}
		out +="</table>";
		document.getElementById("demo").innerHTML=out;
    document.getElementById("demo").style.backgroundColor="#98fb98";
   
       }
       else{
        document.getElementById("demo").innerHTML="dans ce classe n'existe aucun etudiant! ";
       document.getElementById("demo").style.backgroundColor="red";
       }

    }
}
</script>
         <!-- Filter: https://css-tricks.com/gooey-effect/ -->
         <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
                <defs>
                    <filter id="goo"><feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />    
                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                        <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                    </filter>
                </defs>
            </svg>
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
</html>