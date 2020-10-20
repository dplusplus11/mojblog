<?php
	include "../header.php";
	if(isset($_SESSION['user'])  && ($_SESSION['user'] == 'admin')){
?>
<div class="ui main  container">
<div class="ui two column grid">
	 <div class="ui five wide column">
    
  		<div class="ui novi segment">
		<div class="ui huge header"> Novi projekat </div>
			<form class="ui form" action="" method="post" >
				<div class="field">
					<label>Ime projekta </label>
					<input type="text" placeholder="Naslov projekta" name="naslov">
				</div>
				<div class="field">
					<label>Slika projekta </label>
					<input type="text" placeholder="Putanja do slike projekta" name="slika">
				</div>
				<div class="field">
					<label>Link do projekta </label>
					<input type="text" placeholder="Link do projekta" name="link">
				</div>
				<div class="field">
					<label> Opis </label>
					<textarea type="text" placeholder="Opis projekta" name="opis"> </textarea>
				</div>
			
				<button name="submit_projekat" class="ui grey small basic button"> Objavi projekat </button>
			</form>
		</div> 
   </div>
<?php
	ob_start();
	include "../conn.php";
	



	if(isset($_REQUEST['submit_projekat']))
	{
		$naslov = $_POST['naslov'];
		$slika = $_POST['slika'];
		$link = $_POST['link'];
		$opis = $_POST['opis'];
		

		$insert =$conn->prepare("INSERT INTO projekti (`naslov`, `slika`, `link`, `opis`, `datum`) VALUES (?,?,?,?, NOW())");	
        if($insert == false)
        {
        	echo "Error: " . $conn->error;
        }
        $result = $insert->bind_param('ssss', $naslov, $slika, $link, $opis);
        $result = $insert->execute();
		if ($result === TRUE) {
			echo "Novi projekat je upisan u bazu! <br><br>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}	
	

	$sql = "SELECT * FROM projekti";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		echo "<div class=' eleven wide column'>";
	    while($row = $result->fetch_assoc()) 
	    {
	        echo "<form method='POST'>
	        		<div class='ui fluid input'><input type='text' name='naslov' value='".$row["naslov"]."'></div>
	        		<div class='ui fluid input'><input type='text' name='slika' value='".$row["slika"]."'></div>
	        		<div class='ui fluid input'><input type='text' name='link' value='".$row["link"]."'></div>
        			<div class='ui fluid form'><textarea type='text' name='opis'>" . $row["opis"] ."</textarea></div>
        			<input type='hidden' name='id' value='".$row['id']."'>
	         		<input class='ui olive tiny basic button' type='submit' name='update_projekat' value='Izmeni'>
	         		<input class='ui red tiny button' type='submit' name='delete_projekat' value='Obriši'>
	    		</form> <br >";
	    }
	    
	} 
	else 
	{
	   // echo "No data in DB";
	}
	echo"</div>";



	
	if(isset($_POST["update_projekat"]))
	{
		
		$naslov = $_POST['naslov'];
		$opis = $_POST['opis'];
		$slika = $_POST['slika'];
		$link = $_POST['link'];
		$id = $_POST['id'];

		update($naslov, $opis, $slika, $link, $id);
		header("Location: " .$_SERVER["PHP_SELF"]);
		exit();
	}


	function update($jedan, $dva, $tri, $cetiri, $pet)
	{
		include "../conn.php";
		$naslov = $jedan;
		$opis = $dva;
		$slika = $tri;
		$link = $cetiri;
		$id = $pet;
		$update = $conn->prepare("UPDATE `projekti` SET `naslov` = ?, `opis` = ?, `slika` = ?, `link` = ? WHERE `id` = ?");
		$update->bind_param("ssssi",$naslov, $opis, $slika, $link, $id);
		
		
		$update->execute();
		$update->close();
	}

	if(isset($_POST["delete_projekat"]))
	{
		$naslov = $_POST['naslov'];
		$opis = $_POST['opis'];
		$slika = $_POST['slika'];
		$link = $_POST['link'];
		$id = $_POST['id'];

		delete($naslov, $opis, $slika, $link, $id);
		header("Location: " .$_SERVER["PHP_SELF"]);
		exit();
	}


	function delete($jedan, $dva, $tri, $cetiri, $pet)
	{
		include "../conn.php";
		$naslov = $jedan;
		$opis = $dva;
		$slika = $tri;
		$link = $cetiri;
		$id = $pet;
		$delete = $conn->prepare("DELETE FROM `projekti` WHERE `id` = ?");
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