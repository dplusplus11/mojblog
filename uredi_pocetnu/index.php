<?php
	include "../header.php";
	if(isset($_SESSION['user'])  && ($_SESSION['user'] == 'admin')){
?>
<div class="ui main  container">
<div class="ui two column grid">
	 <div class="ui five wide column">
    
  		<div class="ui novi segment">
		<div class="ui huge header"> Novi članak </div>
			<form class="ui form" action="" method="post" >
				<div class="field">
					<label>Naslov članka </label>
					<input type="text" placeholder="Naslov članka" name="naslov">
				</div>
				<div class="field">
					<label>Slika  </label>
					<input type="text" placeholder="Putanja do slike" name="slika">
				</div>
				<div class="field">
					<label> Tekst članka  </label>
					<textarea type="text" placeholder="Tekst" name="tekst"> </textarea>
				</div>
				<div class="field">
					<label>Izvor  </label>
					<input type="text" placeholder="Izvor" name="izvor">
				</div>
				<button name="submit_clanak" class="ui grey small basic button"> Objavi članak </button>
			</form>
		</div> 
   </div>
<?php
	ob_start();
	include "../conn.php";
	



	if(isset($_REQUEST['submit_clanak']))
	{
		$naslov = $_POST['naslov'];
		$slika = $_POST['slika'];
		$tekst = $_POST['tekst'];
		$izvor = $_POST['izvor'];
		

		$insert =$conn->prepare("INSERT INTO clanci (`naslov`, `slika`, `tekst`, `izvor`, `datum`) VALUES (?,?,?,?, NOW())");	
        if($insert == false)
        {
        	echo "Error: " . $conn->error;
        }
        $result = $insert->bind_param('ssss', $naslov, $slika, $tekst, $izvor);
        $result = $insert->execute();
		if ($result === TRUE) {
			echo "Novi clanak je upisan u bazu! <br><br>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}	
	

	$sql = "SELECT * FROM clanci";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		echo "<div class=' eleven wide column'>";
	    while($row = $result->fetch_assoc()) 
	    {
	        echo "<form method='POST'>
	        		<div class='ui fluid input'><input type='text' name='naslov' value='".$row["naslov"]."'></div>
	        		<div class='ui fluid input'><input type='text' name='slika' value='".$row["slika"]."'></div>
	        		<div class='ui fluid input'><input type='text' name='izvor' value='".$row["izvor"]."'></div>
        			<div class='ui fluid form'><textarea type='text' name='tekst'>" . $row["tekst"] ."</textarea></div>
        			<input type='hidden' name='id' value='".$row['id']."'>
	         		<input class='ui olive tiny basic button' type='submit' name='update_clanak' value='Izmeni'>
	         		<input class='ui red tiny button' type='submit' name='delete_clanak' value='Obriši'>
	    		</form> <br >";
	    }
	    
	} 
	else 
	{
	   // echo "No data in DB";
	}
	echo"</div>";



	
	if(isset($_POST["update_clanak"]))
	{
		
		$naslov = $_POST['naslov'];
		$slika = $_POST['slika'];
		$tekst = $_POST['tekst'];
		$izvor = $_POST['izvor'];
		$id = $_POST['id'];

		update($naslov, $slika, $tekst, $izvor, $id);
		header("Location: " .$_SERVER["PHP_SELF"]);
		exit();
	}


	function update($jedan, $dva, $tri, $cetiri, $pet)
	{
		include "../conn.php";
		$naslov = $jedan;
		$slika = $dva;
		$tekst = $tri;
		$izvor = $cetiri;
		$id = $pet;
		$update = $conn->prepare("UPDATE `clanci` SET `naslov` = ?, `slika` = ?, `tekst` = ?, `izvor` = ? WHERE `id` = ?");
		$update->bind_param("ssssi",$naslov, $slika, $tekst, $izvor, $id);
		
		
		$update->execute();
		$update->close();
	}

	if(isset($_POST["delete_clanak"]))
	{
		$naslov = $_POST['naslov'];
		$slika = $_POST['slika'];
		$tekst = $_POST['tekst'];
		$izvor = $_POST['izvor'];
		$id = $_POST['id'];

		delete($naslov, $slika, $tekst, $izvor, $id);
		header("Location: " .$_SERVER["PHP_SELF"]);
		exit();
	}


	function delete($jedan, $dva, $tri, $cetiri, $pet)
	{
		include "../conn.php";
		$naslov = $jedan;
		$slika = $dva;
		$tekst = $tri;
		$izvor = $cetiri;
		$id = $pet;
		$delete = $conn->prepare("DELETE FROM `clanci` WHERE `id` = ?");
		$delete->bind_param("i", $id);
		
		
		$delete->execute();
		$delete->close();
	}
	ob_end_flush();
?>




	
</div>
</div>
<?php
	include "../footer.php";

	}else{
	header("Location:  ../login/index.php");
}
?>