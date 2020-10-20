<?php
	include "../conn.php";
	include "../header.php";
	include "../session.php";
	ob_start();
	
	if(isset($_SESSION["user"]))
    {
    	$user = $_SESSION['user'];
    	$pass = $_SESSION["pass"];
		$korisnici = "SELECT * FROM korisnik WHERE user= '$user' ";
		$result = $conn->query($korisnici);

		if ($result->num_rows == 1) 
		{
			echo "<div class='ui main  text container segment'> <div class='ui huge header'> Korisnički podaci </div>";
		    while($row = $result->fetch_assoc()) 
		    {
		        echo "<form class='ui form' method='post' enctype='multipart/form-data' >
		       <div class='ui two columns grid'>
		       <div class='row'>
			       <div class='eight wide column'>
					<div class='field'>
						<label>Ime i prezime </label>
						<input type='text'  name='ime' value='".$row["ime"]."'>
					</div>
					<div class='field'>
						<label> Email </label>
						<input type='email'  name='email' value='".$row["email"]."'>
					</div>
					<div class='field'>
						<label> Korisnicko ime </label>
						<input type='text'  name='user' value='".$row["user"]."'>
					</div>
					<div class='field'>
						<label> Lozinka </label>
						<input type='password'  name='pass' value='".$_SESSION["pass"]."'>
					</div>
					
					</div>";
					if($row['avatar'] == null){
						echo "<div class='eight wide column'>

								<img class='ui centered bordered  image' width='250' src='../images/avatar-def.jpg'>
								<br>
								<div class='field'>
									<input type='file'  name='avatar'>
								</div>
							</div>";
					} else{
						echo "<div class='eight wide column'>
						<div class='image'>
								<img class='ui centered bordered  image' width='250' src='".$row['avatar']. "'>
								</div>
								<br>
								<div class='field'>
									<input type='file'  name='avatar'>
								</div>
							</div>";
					}
					

				echo "</div>
				</div>
				<br>
				<hr>
				<div class=' field'>
					<label> O meni </label>
					<textarea  rows='3' name='omeni'>".$row["omeni"]." </textarea>
				</div>
				<div class=' field'>
					<label> Datum rodjenja </label>
					<input type='date'  name='rodjendan' value='".$row["rodjendan"]."'>
				</div>
				<div class=' field'>
					<label> Obrazovanje </label>
					<input type='text'  name='skola' value='".$row["skola"]."'>
				</div>
				<div class=' field'>
					<label> Omiljeni citat </label>
					<input type='text'  name='citat' value='".$row["citat"]."'>
				</div>
				
				<hr>
				<div class='ui fields'>
					<div class='eight wide field'>
						<label> Grad </label>
						<input type='text'  name='grad' value='".$row["grad"]."'>
					</div>
					<div class='eight wide field'>
						<label> Telefon </label>
						<input type='text'  name='tel' value='".$row["tel"]."'>
					</div>

					<div class=' field'>
						<input type='hidden'  name='id' value='".$row["id"]."'>
					</div>
				</div>
				<br>
				<input name='update_user' type='submit' class='ui orange tiny basic button' value='Promeni podatke'> 
				<input name='delete_user' type='submit' class='ui red tiny basic button' value='Obriši nalog'> 
			</form>";
		    }
		    
		} 
		else 
		{
			
		    echo "Error: " . $conn->error;
		}
		echo"</div> </div>";
?>
<?php

	function update($jedan, $tri, $cetiri, $pet, $sest,  $osam, $devet, $deset, $jedanaest, $dvanaest, $trinaest, $sedam)
	{
		include "../conn.php";

		$ime = $jedan;
		$email = $tri;
		$grad = $cetiri;
		$tel = $pet;
		$user = $sest;
		
		$pass= $osam;
		$omeni= $devet;
		$rodjendan= $deset;
		$avatar= $jedanaest;
		$skola= $dvanaest;
		$citat= $trinaest;
		$id = $sedam;
		$update =$conn->prepare("UPDATE korisnik SET `ime` = ?, `email` = ?, `grad` = ?, `tel` = ?, `user` = ?, `pass` = ? , `omeni` = ? , `rodjendan` = ? , `avatar` = ? , `skola` = ?, `citat` = ?   WHERE `id` = ?");
		$update->bind_param("sssssssssssi",$ime, $email, $grad, $tel, $user, $pass, $omeni, $rodjendan, $avatar, $skola, $citat, $id);
		
		$update->execute();
		$update->close();
		
	}
	function update2($jedan, $tri, $cetiri, $pet, $sest,  $osam, $devet, $deset, $dvanaest, $trinaest, $sedam)
	{
		include "../conn.php";

		$ime = $jedan;
		$email = $tri;
		$grad = $cetiri;
		$tel = $pet;
		$user = $sest;
		
		$pass= $osam;
		$omeni= $devet;
		$rodjendan= $deset;
		
		$skola= $dvanaest;
		$citat= $trinaest;
		$id = $sedam;
		$update =$conn->prepare("UPDATE korisnik SET `ime` = ?, `email` = ?, `grad` = ?, `tel` = ?, `user` = ?, `pass` = ? , `omeni` = ? , `rodjendan` = ? , `skola` = ?, `citat` = ?   WHERE `id` = ?");
		$update->bind_param("ssssssssssi",$ime, $email, $grad, $tel, $user, $pass, $omeni, $rodjendan, $skola, $citat, $id);
		
		$update->execute();
		$update->close();
		
	}
	if(isset($_POST["update_user"]))
	{	
		
		$ime = $_POST['ime'];
		$email = $_POST['email'];
		$grad = $_POST['grad'];
		$tel = $_POST['tel'];
		$user = $_POST['user'];
		$pass= md5($_POST['pass']);
		$omeni= $_POST['omeni'];
		$rodjendan= $_POST['rodjendan'];

		$skola= $_POST['skola'];
		$citat= $_POST['citat'];
		$id= $_POST['id'];
		// if(md5($_POST['pass']) == "" || $avatar != $row['avatar' ]){
		// 	$pass = $row['pass'];
		// 	$avatar = $row['avatar'];
		// }
		if($_FILES['avatar']['name'] == null){
			update2($ime, $email, $grad,  $tel, $user, $pass, $omeni, $rodjendan, $skola, $citat, $id);
			header("Location: " .$_SERVER["PHP_SELF"]);
			exit();
		}else{
			$file= strtolower($_FILES["avatar"]['name']);
			$avatar= "../images/";
			$avatar= $avatar.basename($_FILES["avatar"]['name']);
			move_uploaded_file($_FILES["avatar"]['tmp_name'], $avatar);	

			update($ime, $email, $grad,  $tel, $user, $pass, $omeni, $rodjendan, $avatar, $skola, $citat, $id);
			header("Location: " .$_SERVER["PHP_SELF"]);
			exit();

		}

		
			if($_SESSION[user] != $user){
				session_destroy();
				header("Location: ../login/index.php");
			}
			// if($_POST['pass'] != null){
			// 	session_destroy();
			// 	header("Location: ../login/index.php");
			// }
			header("Location: " .$_SERVER["PHP_SELF"]);
			exit();
			
	}
		
			// echo '<pre>';
			// print_r($_POST);
			// echo '</pre>';
	
	function delete($jedan, $dva, $tri, $cetiri, $pet,  $osam, $devet, $deset, $jedanaest, $dvanaest, $trinaest, $sedam)
	{
		include "../conn.php";
		$ime = $jedan;
		$email = $tri;
		$grad = $cetiri;
		$tel = $pet;
		$user = $sest;
		$pass= $osam;
		$omeni= $devet;
		$rodjendan= $deset;
		$avatar= $jedanaest;
		$skola= $dvanaest;
		$citat= $trinaest;
		$id= $sedam;
		$delete = $conn->prepare("DELETE FROM korisnik WHERE `id` = ? ");
		$delete->bind_param("i", $id);
		
		
		
		$delete->execute();
		$delete->close();
	}
	if(isset($_POST["delete_user"]))
	{
		$ime = $_POST['ime'];
		$email = $_POST['email'];
		$grad = $_POST['grad'];
		$tel = $_POST['tel'];
		$user = $_POST['user'];
		$pass= md5($_POST['pass']);
		$omeni= $_POST['omeni'];
		$rodjendan= $_POST['rodjendan'];
		$avatar= $_POST['avatar'];
		$skola= $_POST['skola'];
		$citat= $_POST['citat'];
		$id= $_POST['id'];

		delete($ime, $email, $grad,  $tel, $user, $pass, $omeni, $rodjendan, $avatar, $skola, $citat, $id);
		session_destroy();
		header("Location: ../pocetna/index.php");
		
			
	}

}

?>

<?php
	include "../footer.php";
?>