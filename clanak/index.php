<?php
include "../header.php";
include "../conn.php";


$clanakid= $_GET['clanakid'];

$sql = "SELECT * FROM clanci WHERE id='$clanakid' ";

$result = $conn->query($sql);

	if ($result->num_rows === 1) 
	{
		 while($row = $result->fetch_assoc()) 
    	{
			echo "<div class='ui main text container segment'>
				<div class='ui huge header'> ".$row["naslov"]."</div>
				<div class='ui top attached'>
					<div class='item'>
						<img class='ui centered large rounded image' src='../postovi_slike/" .$row['slika']. "'>
						<div class='content'>
							<span>" . date("j F Y", strtotime($row["datum"])). " </span>
						</div><br>
						<div class='description'>
							<p>". $row["tekst"]."</p>
							<span> Izvor: ". $row["izvor"]." </span>
						</div>
						
					</div>
				</div>
			</div>";
		}
	}



include "../footer.php";
?>