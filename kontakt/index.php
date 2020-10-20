
<?php 

/* 


use PHPMailer\PHPMailer\PHPMailer;

include_once 'PHPMailer/PHPMailer.php';
include_once 'PHPMailer/Exception.php';
include_once 'PHPMailer/SMTP.php';

 */
//require 'PHPMailer/PHPMailerAutoload.php';


 	// if(isset($_POST["submit_email"]))
  //   {

  //   		$ime= $_POST['ime'];
  //   		$email= $_POST['email'];
  //           $subject = $_POST['subject']; 
  //           $content = $_POST['content']; 

		// 	/* CONFIGURATION */
		// 	$crendentials = array(
		// 	    'email'     => 'magizoologistsdiary@gmail.com',    //Your GMail address
		// 	    'password'  => '123456'          //Your GMail password
		// 	    );

		// 	/* SPECIFIC TO GMAIL SMTP */
		// 	$smtp = array(

		// 	'host' => 'smtp.gmail.com',
		// 	'port' => 587,
		// 	'username' => $crendentials['email'],
		// 	'password' => $crendentials['password'],
		// 	'secure' => 'tls' //SSL or TLS

		// 	);




			// TO, SUBJECT, CONTENT 
			//$to         = 'gagilicmokili@gmail.com'; //The 'To' field
			//$subject    = 'PHP developer';
			//$content    = 'Proba, proba! Dragance salje mail sa svog novog naloga apreko smtp-a. Kidam... ali <b> stvarno!</b>';
			//$file       = 'attachment/haiku.jpg';

/*
			$mailer = new PHPMailer();

			//SMTP Configuration
			$mailer->isSMTP();
			$mailer->SMTPAuth   = true; //We need to authenticate
			$mailer->Host       = $smtp['host'];
			$mailer->Port       = $smtp['port'];
			$mailer->Username   = $smtp['username'];
			$mailer->Password   = $smtp['password'];
			$mailer->SMTPSecure = $smtp['secure']; 


			//Now, send mail :
			//From - To :
			$mailer->From       = $crendentials['email'];
			$mailer->FromName   = $ime; 
			
	    	// Add a recipient
	        $mailer->addAddress($email);

			//Subject - Body :
			$mailer->Subject        = $subject;
			$mailer->Body           = $content;

			$mailer->isHTML(true); //Mail body contains HTML tags


			//Check if mail is sent :
			if(!$mailer->send()) {
			    echo 'Error sending mail : ' . $mailer->ErrorInfo;
			    echo 'Molimo, pokusajte ponovo.';
			} else {
			    echo 'Sjajno! Poruka je poslata.';
			}

   } 

?> */

include "../header.php";
include "../conn.php";


if(isset($_REQUEST['submit_email']))
	{
		$ime= $_POST['ime'];
		$email= $_POST['email'];
		$naslov = $_POST['naslov'];
		$tekst = $_POST['tekst'];
		

		$insert =$conn->prepare("INSERT INTO kontakt (`ime`, `email`, `naslov`, `tekst`,  `vreme`) VALUES (?,?,?,?, NOW())");	
        if($insert == false)
        {
        	echo "Error: " . $conn->error;
        }
        $result = $insert->bind_param('ssss', $ime, $email, $naslov, $tekst);
        $result = $insert->execute();
		if ($result === TRUE) {
			echo "Novi post je upisan u bazu! <br><br>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}	

            
?>



<div class="ui text main container segment" style="margin-top: -100px;">
	<div class="ui huge header"> Pošalji mi poruku </div>
    <form class="ui form" action="" method="post">
    	<div class="field required">
            <label> Ime </label>
            <input type="text" placeholder="Ime" name="ime" required>
        </div>
        <div class="field required">
            <label> E-mail </label>
            <input type="text" placeholder="Email adresa" name="email" required>
        </div>
        <div class="field required">
            <label> Naslov poruke </label>
            <input type="text" placeholder="Naslov poruke" name="naslov" required>
        </div>
        <div class="field required">
            <label> Telo poruke </label>
            <textarea type="text" placeholder="Telo poruke" name="tekst" required></textarea>
        </div>
        <button name="submit_email" class="ui teal basic submit labeled icon button"> <i class="edit icon"></i> Pošalji </button>
        <br>
    </form>
</div>



