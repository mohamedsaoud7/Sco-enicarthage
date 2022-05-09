<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$id=$_REQUEST['id'];
$classe=$_REQUEST['classe'];
include("connexion.php");
         $sel=$pdo->prepare("select  id from groupe  where id=? limit 1");
         $sel->execute(array($id));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="NOT OK";// GROUPE existe déja
         else{
            $req="insert into groupe values ($id,'$classe')";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         }  
         echo $erreur;
}
?>
