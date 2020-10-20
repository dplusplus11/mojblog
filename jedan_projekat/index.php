<?php
include "../header.php";
include "../conn.php";


$projekatid= $_GET['projekatid'];

$sql = "SELECT * FROM projekti WHERE id='$projekatid' ";

$result = $conn->query($sql);

	if ($result->num_rows === 1) 
	{
		 while($row = $result->fetch_assoc()) 
    	{
			echo "<div class='ui main text container segment'>
				<div class='ui huge pro header'> ".$row["naslov"]."</div>
				<div class='ui top attached'>
					<div class='item'>
						<img class='ui centered rounded image' src='" .$row['slika']. "'>
						<div class='content'>
							<span>" . date("j F Y", strtotime($row["datum"])). " </span>
						</div><br>
						<div class='description'>
							<p>". $row["opis"]."</p>
						</div>";
						if($row['link'] == null){
							echo "<iframe style='display:none;' src='" .$row['link']. "'</iframe>";
						}else{
							echo "<iframe width='666' src='" .$row['link']. "'</iframe>";
						}
						
					echo "</div>
				</div>
			</div>";
		}
	}



include "../footer.php";
?>