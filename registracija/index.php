
<?php

	include "../header.php";
	require("../conn.php");

	if(isset($_REQUEST['submit_reg']))
	{
		$ime = $_POST['ime'];
		$pass = md5($_POST['pass']);
		$email = $_POST['email'];
		$user = $_POST['user'];
		$rodjendan = $_POST['rodjendan'];


		$insert =$conn->prepare("INSERT INTO korisnik (`ime`, `pass`, `email`, `user`, `rodjendan`, `reg_date`)
		VALUES (?,?,?,?,?, NOW())");	
        if($insert == false)
        {
        	echo "Error: " . $conn->error;
        }
        $result = $insert->bind_param('sssss', $ime, $pass,$email, $user, $rodjendan);
        $result = $insert->execute();
		if ($result === TRUE) {
			echo "<div class='ui text main container' >";
           // echo "<h1> DOBRO DOŠLI, " . $SESSION['user'] . " </h1> ";
			echo "Uspesno ste se registrovali! <br><br>";
			echo "<a class='ui teal basic button' href='../login/index.php' >Ulogujte se </a>";
		    echo " <br /> <br/> <p> *Novi korisnik je uspesno upisan u bazu. </p>";
		    echo "</div>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();

	}	
	

?>

   <div class="ui main text container segment"  <?php if(isset($_POST["submit_reg"])){ echo 'style="display:none;"'; } ?>>
   	<div class="ui huge header"> Registracija</div>
   		<p class="ui horizontal divider">
             <i class="edit outline icon"></i> 
         </p>
		<form class="ui form" action="" method="post" >
			<div class="field required">
				<label>Ime i prezime </label>
				<input id="ime" type="text" placeholder="ime i prezime" name="ime" maxlength="21" pattern=".{4,21}" required title="4 to 21 characters" required>
				<span id="validacija"></span>
			</div>
			<div class="field required">
				<label> Email </label>
				<input id="em1" type="email" placeholder="email" name="email" required>
				<span id="dostupno"></span>
			</div>
			<div class="field required">
				<label> Lozinka </label>
				<input id="pass" type="password" placeholder="lozinka" name="pass" minlength="4" required>
			</div>
			<div class="field required">
				<label> Ponovite lozinku </label>
				<input id="confirm_pass" type="password" placeholder="ponovite lozinku" name="confirm_pass" minlength="4" required>
				<span id="poruka"></span>
			</div>
			<div class="field required">
				<label> Korisničko ime </label>
				<input id="user1" type="text" placeholder="korisnicko ime" name="user" required>
				<span id="korisnicko_ime"></span>
			</div>
			<div class="field">
				<label> Datum rođenja </label>
				<input type="date" placeholder="datum" name="rodjendan" >
				
			</div>
			<br>
			
			
			<button id="register" name="submit_reg" class="ui teal small button" disabled> Registruj se </button>
		</form>
	</div> 

	
</body>
</html>
<script type="text/javascript">
		$(document).ready(function(){
			$('#em1').blur(function(){
				var email= $(this).val();
				var regEx= /^([\w\.\-\_]*)@([\w]*)/;
				if(email != "" && email.match(regEx)){
					$.ajax({
						url:'../provera.php',
						method: 'POST',
						data:{email: email},
						dataType: "text",
						success: function(html)
						{
							
							$('#dostupno').html(html);
						}
					})
				}else{
					$('#dostupno').html("Greška. Email adresa mora biti formata: test@email.com. ⚠").css('color', '#db3334');
				}
			});

			$('#user1').blur(function(){
				var user= $(this).val();
				var regEx= /^\w+$/;
				if( user != "" && user.match(regEx)){
					$.ajax({
						url:'../provera.php',
						method: 'POST',
						data:{user: user},
						dataType: "text",
						success: function(data)
						{
							
							if(data == true)
					       {
						        $('#korisnicko_ime').html('<span class="danger"> Korisničko ime je zauzeto. Izaberite drugo. ⚠</span>');
						        $('#register').attr("disabled", true);
					       }
					       else
					       {
						        $('#korisnicko_ime').html('<span class="success">Korisničko ime je dostupno.  &#10004;  </span>');
						        $('#register').attr("disabled", false);
					       }
						}
					})
				}else{
					$('#korisnicko_ime').html("Greška. Korisnicko ime mora da sadrzi samo slova, brojeve i .-_ ⚠").css('color', '#db3334');
				}

				

			});

			$('#pass, #confirm_pass').on('blur', function () {
				if($('#pass').val() == ""  || $('#confirm_pass').val() == ""){
					$('#poruka').html('Niste uneli lozinku. ⚠').css('color', 'red');
				}else{
					 if($('#pass').val() == $('#confirm_pass').val()) 
					  {
					      $('#poruka').html('Lozinke su iste. &#10004; ').css('color', 'green');
					     
					  }else 
					  {
					      $('#poruka').html('Lozinke se ne poklapaju. ⚠').css('color', '#db3334'); 
					      
					  }

				}
				 
				});
	       $('#ime').blur(function() {
			    var ime = $(this).val();

			    if ( ime !="" && ime.match(/^[a-zA-Z\s]*$/) && ime.length > 3 ) 
			    {
			         $('#validacija').html('Ime ispunjava kriterijume. &#10004; ').css('color', 'green');
			    
			    }else{
			    	$('#validacija').html('Ime sme da sadrži samo slova i razmak. Dužina je minimalno 4 karaktera. ⚠').css('color', '#db3334');
			        
			    	 
			    }
			});
		});
	</script>