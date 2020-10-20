<?php
	include "../header.php";
	include "../conn.php";
	if(isset($_SESSION['user'])  && ($_SESSION['user'] == 'admin')){

?>
<div class="ui main container">
<div class="ui two column grid">
	<div class="ui six wide column">
		<div class="ui segment" style="margin-top: 30px;">
		    <div class="ui big header"> Nova slika </div>
		    <form class="ui form" action="" method="post" enctype="multipart/form-data" >
		        <div class="field">
		            <input type="file" name="slika">
		        </div>
		        
		        <button name="submit_file" class="ui grey small basic button"> Dodaj sliku </button>
		        <br>
		    </form>
		        
		</div>
	</div>
<?php
	ob_start();
	

if(isset($_POST["submit_file"]))
{
                  
	if(isset($_FILES["slika"]['name'])  &&  $_FILES["slika"]['name'] != "")
	{
		$ime= strtolower($_FILES["slika"]['name']);
		$format= $_FILES["slika"]['type'];
		$putanja= "../galerija_slike/";
		$putanja= $putanja.basename($_FILES["slika"]['name']);
	
		if(move_uploaded_file($_FILES["slika"]['tmp_name'], $putanja)){
			$insert =$conn->prepare("INSERT INTO galerija (`ime`, `putanja`, `format` ) VALUES (?,?,?)");

			if($insert == false)
	        {
	        	echo "Error: " . $conn->error;
	        }
	        $result = $insert->bind_param('sss', $ime, $putanja, $format);
	        $result = $insert->execute();
			if ($result === TRUE) {
				//echo "Nova slika je upisana u bazu!";
			} else {
			    echo "Error: " . $insert . "<br>" . $conn->error;
			}

		}
	}else{
		echo "Molimo izaberite sliku.";
	}
}



$sql = "SELECT * FROM galerija ORDER BY id DESC";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		echo "<div class='ten wide column'>  <div class='item'>
            <div class='content'>";
	    while($row = $result->fetch_assoc()) 
	    {

	        echo "<form method='POST'>
	        		
        			<div class='ui image'> <img style='height: 200px' class='ui medium bordered image' src='". $row["putanja"]."'></div>
        			<input type='hidden' name='id' value='".$row['id']."'>
        			<div class='extras'>
	         		
	         		<input class='ui red tiny button' type='submit' name='delete_slika' value='Obriši'>
	         		<div>
	    		</form> </div> </div><br>";
	    }
	    
	} 
	else 
	{
	   // echo "No data in DB";
	}
	echo"</div> </div> </div>";



	//<input class='ui yellow tiny button' type='submit' name='update_slika' value='Izmeni'>
	// if(isset($_POST["update_post"]))
	// {
		
	// 	$putanja = $_POST['putanja'];
	// 	$id = $_POST['id'];

	// 	update($putanja, $id);
	// 	header("Location: " .$_SERVER["PHP_SELF"]);
	// 	exit();
	// }


	// function update($jedan, $dva)
	// {
	// 	include "../conn.php";
	// 	$putanja = $jedan;
	// 	$id = $dva;
		
	// 	$update = $conn->prepare("UPDATE `galerija` SET `putanja` = ? WHERE `id` = ?");
	// 	$update->bind_param("si",$putanja, $id);
		
		
	// 	$update->execute();
	// 	$update->close();
	// }

	function delete($jedan, $dva)
	{
		include "../conn.php";
		$putanja = $jedan;
		$id = $dva;
		$delete = $conn->prepare("DELETE FROM `galerija` WHERE `id` = ?");
		$delete->bind_param("i", $id);
		
		
		$delete->execute();
		$delete->close();
	}
	if(isset($_POST["delete_slika"]))
	{
		$putanja = $_POST['putanja'];
		$id = $_POST['id'];

		delete($putanja, $id);
		header("Location: " .$_SERVER["PHP_SELF"]);
		exit();
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