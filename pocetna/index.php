<?php

include "../conn.php";
include "../header.php";


$sql = "SELECT * FROM clanci WHERE id=1";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	?>

<div id="pocetni" class="ui main container">
	
	<div class="ui three column divided grid">
		 <div class="row">
		   
		   <?php 	while($row = $result->fetch_assoc()) 
   				 { ?>
   				<div class="four wide column">
			      	<img class="ui image" height="200" src="<?php echo $row['slika']; ?>" alt="slon kod doktora">
			     	<h2 class="head"><?php echo $row['naslov']; ?></h2>
			     	<div class="meta"><span> <?php echo date("j F Y", strtotime($row["datum"])); ?> </span> </div>
			     	<h4 class="subheader"> <?php echo substr($row["tekst"], 0, 50); ?> </h4>
			     	<a class='ui grey basic button' href='../clanak/index.php?clanakid=<?php echo $row['id']; ?>'> Čitaj još </a>
		       <hr>
		     <?php }    } 
				else 
				{
				    echo "No data in DB";
				} ?>
		<?php
		$sql2 = "SELECT * FROM clanci WHERE id=2";
		$result = $conn->query($sql2);
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
   		 	{ 
				?>
		       	<img  class="ui  image" height="200" src="<?php echo $row['slika']; ?>" alt="macka sef">
		      	<h2 class="head"> <?php echo $row['naslov']; ?> </h2>
		      	<div class="meta"><span>  <?php echo date("j F Y", strtotime($row["datum"])); ?> </span> </div>
		      	<h4 class="subheader"><?php echo substr($row["tekst"], 0, 50) .'...'; ?> </h4>
		      	<a class='ui grey basic button' href='../clanak/index.php?clanakid=<?php echo $row['id']; ?>'> Čitaj još </a>
		      	
		      </div>
	      	<?php }    } 
			else 
			{
			    echo "No data in DB";
			} ?>

		<?php

		$sql5 = "SELECT * FROM clanci WHERE id=5";
		$result = $conn->query($sql5);

		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
   		 	{ 
				?>
		    <div class="eight wide column">
		    	<img  class="ui massive image" src="<?php echo $row['slika']; ?>" alt="muzika">
		    	<h2 class="head"> <?php echo $row['naslov']; ?> </h2>
		    	<div class="meta"><span>  <?php echo date("j F Y", strtotime($row["datum"])); ?> </span> </div>
		    	<h4 class="subheader"><?php echo substr($row["tekst"], 0, 1000) .'...'; ?> </h4>
		      	<a class='ui grey basic button' href='../clanak/index.php?clanakid=<?php echo $row['id']; ?>'> Čitaj još </a>
		      	
		    </div> 
		    <?php }    } 
				else 
				{
				    echo "No data in DB";
				} ?>

		<?php
		$sql3 = "SELECT * FROM clanci WHERE id=3";
		$result = $conn->query($sql3);

		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
   		 	{ 
				?>
		    <div class="four wide column">
		      <img  class="ui massive image" height="200" src="<?php echo $row['slika']; ?>" alt="macka">
		      <h2 class="head"> <?php echo $row['naslov']; ?> </h2>
		      <div class="meta"><span>  <?php echo date("j F Y", strtotime($row["datum"])); ?> </span> </div>
		      <h4 class="subheader"><?php echo substr($row["tekst"], 0, 40)  .'...'; ?> </h4>
		      <a class='ui grey basic button' href='../clanak/index.php?clanakid=<?php echo $row['id']; ?>'> Čitaj još </a>
		      <hr>
		      <?php }    } 
				else 
				{
				    echo "No data in DB";
				} ?>
				<?php
				$sql4 = "SELECT * FROM clanci WHERE id=4";
				$result = $conn->query($sql4);
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc()) 
		   		 	{ 
				?>
		       	<img  class="ui massive image"  height="200" src="<?php echo $row['slika']; ?>" alt="price">
		      	<h2 class="head"> <?php echo $row['naslov']; ?> </h2>
		      	<div class="meta"><span>  <?php echo date("j F Y", strtotime($row["datum"])); ?> </span> </div>
		      	<h4 class="subheader"><?php echo substr($row["tekst"], 0, 50) .'...'; ?> </h4>
		      	<a class='ui grey basic button' href='../clanak/index.php?clanakid=<?php echo $row['id']; ?>'> Čitaj još </a>
		      	
	      	<?php }    } 
			else 
			{
			    echo "No data in DB";
			} ?>
		    </div>
		
		
	</div>
</div>
</div>

<?php

	include("../footer.php"); 
?>