<?php
	include("../header.php"); 
 	include "../conn.php";

 	$korid=$_GET['korid'];

 	$korisnici = "SELECT * FROM korisnik WHERE id= '$korid' ";
	$result = $conn->query($korisnici);

	if ($result->num_rows == 1) 
	{
		 while($row = $result->fetch_assoc()) 
		 {
?>

<div class="ui container text basic very padded segment" >
  <div class="ui fluid card">
    <div class="image">
      <img src= <?php if($row['avatar'] != '')  { echo  $row["avatar"];} else { echo  "../images/avatar-def.jpg";} ?>>
    </div>
    <div class="content">
      <div class="header"><?php echo $row["ime"]; ?></div>
      <div class="description">
        <span> <?php if($row['rodjendan'] == '')  { echo ' '; } else {echo "Datum rođenja: ". date("j F Y ", strtotime($row["rodjendan"]));} ?> </span><br>
        <span><?php if($row['skola'] == '')  { echo ' '; } else {echo  "Obrazovanje: " .$row["skola"];} ?></span><br>
        <span>
        <?php if($row['grad'] == '')  { echo ' '; } else {echo  "Mesto: " .$row["grad"];} ?>
      </span>
      </div>
      <div class="description">
       <p> <?php if($row['omeni'] == '')  { echo ' '; } else {echo  "Nešto o meni: " .$row["omeni"];} ?></p>
      </div>
    </div>
    <div class="extra content">
      
      <span>
      <?php if($row['citat'] == '')  { echo ' '; } else {echo  "Omiljeni citat: " .$row["citat"];} ?>
      </span>
    </div>
  </div>
</div>
  <?php
}
}
	include "../footer.php";
?>