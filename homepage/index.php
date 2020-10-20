<?php
	include "../header2.php";
	require('../conn.php');
	include "../session.php"; 
?>

<div class="ui text main container">
		<h1> DOBRO DOŠLI, <?php echo ucwords($_SESSION['user']); ?> ! </h1> 
		<h1>
			Ovo je samo Vaša početna stranica. 
		</h1>
		<p>I, stoga... </p>
		<p> Evo slike slatkog mačeta! </p>
		<div class="ui basic compact segment">
			<img  class="ui medium image" src="http://www.topbestpics.com/wp-content/uploads/2017/05/cute-kitten-funny-cats-24.jpg" alt="mace">
		</div>
		

	</div>
<div class="ui text container segment">
		<h3> Izaberite stavku iz menija: </h3>
		<div class="ui text list">
			<a class="item" href="../svi_korisnici/index.php"> Prikaz svih korisnika</a>
			<a class="item" href="../pet_korisnika/index.php">Prikaz poslednjih pet korisnika</a>
			<a class="item" href="../svi_gradovi/index.php"> Prikaz svih gradova</a>
		</div>
	</div>
	<div class="ui text container">
		<a class='ui orange basic button' href='../logout/index.php' >Izlogujte se </a>
		<a id="delete" class='ui red basic button' href='../delete/index.php' >Obrisite nalog? </a>
	</div>
<br /><br />

</body>
</html>