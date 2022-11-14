<?php
try{
     $bdd = new PDO("mysql:host=localhost;dbname=jquerytest;charset=UTF8","root","");
}catch(PDOException $e)
{
 	echo $e->getMessage();
 	die();
 }

?>