<?php
	include "../header.php";

if(isset($_SESSION['user'])  && ($_SESSION['user'] == 'admin')){
		

?>
<div class="ui main  container">
<div class="ui two column grid">
	 <div class="ui five wide column">
    
  		<div class="ui novi segment">
		<div class="ui huge header"> Novi post </div>
			<form class="ui form" action="" method="post" >
				<div class="field">
					<label>Naslov </label>
					<input type="text" placeholder="naslov" name="naslov">
				</div>
				<div class="field">
					<label>Slika posta </label>
					<input type="text" placeholder="Naziv slike" name="slika">
				</div>
				<div class="field">
					<label> Tekst </label>
					<textarea type="text" placeholder="neki tekst" name="tekst"> </textarea>
				</div>
			
				<button name="submit_post" class="ui grey small basic button"> Objavi post </button>
			</form>
		</div> 
   </div>
<?php
	ob_start();
	include "../conn.php";



	if(isset($_REQUEST['submit_post']))
	{
		$naslov = $_POST['naslov'];
		$slika =$_POST['slika'];
		$tekst = $_POST['tekst'];
		

		$insert =$conn->prepare("INSERT INTO postovi (`naslov`, `slika`, `tekst`,  `reg_date`) VALUES (?,?, ?, NOW())");	
        if($insert == false)
        {
        	echo "Error: " . $conn->error;
        }
        $result = $insert->bind_param('sss', $naslov, $slika, $tekst);
        $result = $insert->execute();
		if ($result === TRUE) {
			//echo "Novi post je upisan u bazu! <br><br>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}	
	

	$sql = "SELECT * FROM postovi ORDER BY postovi_id DESC";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		echo "<div class=' eleven wide column'>";
	    while($row = $result->fetch_assoc()) 
	    {
	        echo "<form method='POST'>
	        		<div class='ui fluid input'><input type='text' name='naslov' value='".$row["naslov"]."'></div>
	        		<div class='ui fluid input'><input type='text' name='slika' value='".$row["slika"]."'></div>
        			<div class='ui fluid form'><textarea type='text' name='tekst'>" . $row["tekst"] ."</textarea></div>
        			<input type='hidden' name='id' value='".$row['postovi_id']."'>
	         		<input class='ui yellow tiny button' type='submit' name='update_post' value='Izmeni'>
	         		<input class='ui red tiny button' type='submit' name='delete_post' value='Obriši'>
	    		</form> <br >";
	    }
	    
	} 
	else 
	{
	   // echo "No data in DB";
	}
	echo"</div>";



	
	if(isset($_POST["update_post"]))
	{
		
		$naslov = $_POST['naslov'];
		$slika = $_POST['slika'];
		$tekst = $_POST['tekst'];
		$id = $_POST['id'];

		update($naslov, $slika, $tekst, $id);
		header("Location: " .$_SERVER["PHP_SELF"]);
		exit();
	}


	function update($jedan, $dva, $tri, $cetiri)
	{
		include "../conn.php";
		$naslov = $jedan;
		$slika = $dva;
		$tekst = $tri;
		$id = $cetiri;
		$update = $conn->prepare("UPDATE `postovi` SET `naslov` = ?, `slika` = ?, `tekst` = ? WHERE `postovi_id` = ?");
		$update->bind_param("sssi",$naslov, $slika, $tekst, $id);
		
		
		$update->execute();
		$update->close();
	}

	if(isset($_POST["delete_post"]))
	{
		$naslov = $_POST['naslov'];
		$slika = $_POST['slika'];
		$tekst = $_POST['tekst'];
		$id = $_POST['id'];

		delete($naslov, $slika, $tekst, $id);
		header("Location: " .$_SERVER["PHP_SELF"]);
		exit();
	}


	function delete($jedan, $dva, $tri, $cetiri)
	{
		include "../conn.php";
		$naslov = $jedan;
		$slika = $dva;
		$tekst = $tri;
		$id = $cetiri;
		$delete = $conn->prepare("DELETE FROM `postovi` WHERE `postovi_id` = ?");
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