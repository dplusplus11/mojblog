<?php  
include "conn.php";

if(isset($_POST["email"]))
{
 
	 $sql = "SELECT * FROM korisnik WHERE email = '".$_POST["email"]."'";
	 $result = mysqli_query($conn, $sql);
	 if(mysqli_num_rows($result) > 0)
	 {
	 	echo "<span class='danger'> E-mail adresa je zauzeta. Izaberite drugu. ⚠ </span>";
	 } else{
	 	echo "<span class='success'> E-mail adresa je dostupna. &#10004; </span>";
	 }
}


if(isset($_POST["user"]))
{
 
	 $sql = "SELECT * FROM korisnik WHERE user = '".$_POST["user"]."'";
	 $result = mysqli_query($conn, $sql);
	
 	 echo (mysqli_num_rows($result)  > 0);
}
?>