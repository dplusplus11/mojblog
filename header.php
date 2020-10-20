<!DOCTYPE html>
<html>
<head>
	<title>moj_blog</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.css">

	<link href="https://fonts.googleapis.com/css?family=EB+Garamond|Neucha|Raleway" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<body>
	<div class="ui top fixed inverted menu">
		<div class="ui gornji container">
			<div class="header item"> 	<a class="item" href="../pocetna/index.php"> <i class="lightbulb outline icon">  </i> Moj blog </a></div>
			<a class="item" href="../pocetna/index.php"> Početna</a>
			<a class="item" href="../omeni/index.php"> O meni</a>
			<a class="item" href="../portfolio/index.php"> Portfolio </a>
			<a class="item" href="../postovi/index.php"> Postovi </a>
			<a class="item" href="../galerija/index.php"> Galerija </a>
			<a class="item" href="../kontakt/index.php"> Kontakt </a>
			
				
<?php

session_start();
header('Content-Type: text/html; charset=utf-8');

if(isset($_SESSION["user"])) 
{ 
	$user= $_SESSION['user'];

	echo '<a style="display:none" class="item" href="../login/index.php"> Prijavi se </a>';
	echo '<a  style="display:none" class="item" href="../registracija/index.php"> Registruj se </a>';
	echo '<a class="item" href="../moj_profil/index.php"> Moj profil </a>';
	echo '<a class="item" href="../logout/index.php"> Izloguj se, ' .ucfirst($user) . '</a>';
 
  
	if($user === 'admin') 
	{ 
	  echo '<div class="ui simple dropdown item"> Admin <i class="dropdown icon"></i>
				<div class="menu">
					  <a class="item" href="../uredi_pocetnu/index.php"> Uredi početnu </a>
				      <a class="item" href="../uredi_portfolio/index.php"> Uredi portfolio </a>  
				      <a class="item" href="../uredi_postove/index.php"> Uredi postove </a>
				      <a class="item" href="../uredi_galeriju/index.php"> Uredi galeriju </a>
				      <a class="item" href="../sve_poruke/index.php"> Ispis svih poruka </a>
				</div>
			</div>';
	}

} else{
	echo '<a class="item" href="../login/index.php"> Prijavi se </a>';
	echo '<a class="item" href="../registracija/index.php"> Registruj se </a>';
}
?>  
</div>
	</div>
