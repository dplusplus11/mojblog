<?php
	include("../header.php"); 
 	include "../conn.php";
?>


<div class="ui main text container omeni">
	<center class="ui huge header"> O meni </center>
	<div class="ui centered segment very padded grid">
	<?php

    $sql = "SELECT * FROM omeni";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        { ?>
		<div class="row">
		    <div class="float left four wide column">
		      	<img class="ui spaced large circular image" src="<?php echo $row['avatar']; ?>">
		    </div>
		    <div class="twelve wide column">
		    	<div class="ui huge header" style="margin: 20px  0 0 -100px;"> Dragana </div>
		    </div>
		</div>
		    <div class="sixteen wide column">
		    	
		      	<p><?php echo $row['informacije']; ?> </p>
		    </div>
	  	<br>
	  	<div class="row">
		  	<div class="sixteen wide column">
		  		<div class="ui small dividing header">  <i class="heart icon"></i> Interesovanja </div>
		      	<p> <?php echo $row['zanimljivosti']; ?> </p>
		  	</div>
	  	</div>
	  	<br>
	  	<div class="row">
		  	<div class="sixteen wide column">
		  		<div class="ui small dividing header"> <i class="book icon"></i> Omiljene knjige </div>
		      	<p> <?php echo $row['knjige']; ?> </p>
		  	</div>
	  	</div>
	  <br><br><br>
	  	<div class="row">
		  	<div class="sixteen wide padded column">
		  		<div class="ui small dividing header"> <i class="film icon"></i> Omiljeni filmovi </div>
		      	<p> <?php echo $row['filmovi']; ?> </p>
		  	</div>
		</div>
	  
	    <?php } 
			}else {
	            echo "No data in DB";
	        }
	    ?>
	    <br>
	    <center style="margin: 50px auto;">
			<a class="ui big teal centered button" href="../kontakt/index.php"> KONTAKT </a>
		</center>
	</div>

</div>



<?php
	include("../footer.php"); 
?>