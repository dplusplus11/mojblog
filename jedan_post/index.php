<?php
include "../header.php";
include "../conn.php";

if(isset($_SESSION['user']))
{
		$user_sql = "SELECT id FROM korisnik WHERE user = '".$_SESSION["user"]."' ";
		$res = $conn->query($user_sql);
		if ($res->num_rows === 1) {
			if($red = $res->fetch_assoc()) {
					$userid= $red['id'];
			}
		}
}
$postid= $_GET['postid'];

$likes_sql = "SELECT COUNT(*) AS lajkovi FROM p_lajkovi WHERE lajk = 'like' AND postovi_id = $postid";
$likes = $conn->query($likes_sql);
$like=  mysqli_fetch_array($likes);
$totalLikes = $like['lajkovi'];


$dislikes_sql = "SELECT COUNT(*) AS dislajkovi FROM p_lajkovi WHERE lajk = 'dislike' AND postovi_id = $postid";
$dislikes = $conn->query($dislikes_sql);
$dislike=  mysqli_fetch_array($dislikes);
$totalDislikes = $dislike['dislajkovi'];
ob_start();

if(isset($_SESSION['user']))
	{
		$user_sql = "SELECT id FROM korisnik WHERE user = '".$_SESSION["user"]."' ";
		$res = $conn->query($user_sql);
		if ($res->num_rows === 1) {
			if($red = $res->fetch_assoc()) {
					$userid= $red['id'];
			}
		}

		if(isset($_REQUEST['submit_kom']))
		{

			
			$komentar = $_POST['komentar'];
			$postovi_id = $postid;
			$user_id = $userid;
			
			$insert =$conn->prepare("INSERT INTO komentari (`komentar`, `postovi_id`, `user_id`, `datum`) VALUES (?,?,?, NOW())");	
	        if($insert == false)
	        {
	        	echo "Error: " . $conn->error;
	        }
	        $result = $insert->bind_param('sii', $komentar, $postovi_id, $user_id);
	        $result = $insert->execute();
			if ($result != TRUE) {
				  echo "Error: " . $conn->error;
				  	
				
			} 
				
		}

	}

if(isset($_SESSION['user'])){
	if(isset($_POST['submit_kom']))
	{
		

        header("Location: ../jedan_post/index.php?postid=".$postid.""); 
		die();
		
	}
}
$postovi_sql = "SELECT * FROM postovi WHERE postovi_id='$postid' ";

$result = $conn->query($postovi_sql);

if ($result->num_rows === 1) 
{
	$komentari_sql= "SELECT komentari.komentar AS kkom, komentari.datum AS kdat, korisnik.ime AS kime, komentari.user_id AS korid, korisnik.avatar AS kava FROM komentari LEFT JOIN postovi ON postovi.postovi_id = komentari.postovi_id LEFT JOIN korisnik ON korisnik.id = komentari.user_id WHERE postovi.postovi_id = '$postid' ORDER BY kdat DESC ";
	$result2 = $conn->query($komentari_sql);


	while($row = $result->fetch_assoc()) 
	{
		?> 
		<div class='ui main text container'>
		<div class='ui segment'>
			<div class='ui huge header'> <?php echo $row["naslov"]; ?></div>
			<div class='content'>
				<div class='item'>
					<img class='ui centered rounded medium image' src= <?php echo "../postovi_slike/".  $row["slika"]; ?>>
					<div class='description'>
						<span class="datum"> <?php echo date("j F Y ", strtotime($row["reg_date"])); ?> </span>
					</div>
					<div class='description'>
						<p><?php echo $row["tekst"];?></p>
					</div>
					
				</div>
                
                <div class="extra content">
		    	<div class='content'  style="margin: 20px auto;">
		    	 <span class='hello'>
		    		 <a class='strelica right floated' href=<?php echo  "../jedan_post/index.php?postid=".$postid."&type=1" ;?> > 
		    		 	<i style="<?php
		    		  	$polje_sql = "SELECT lajk as li FROM p_lajkovi WHERE user_id = '$userid' AND postovi_id= '$postid'";
						$rest = $conn->query($polje_sql);
						if ($rest->num_rows === 1) {
							if($red2 = $rest->fetch_assoc()) {
									$poljel= $red2['li'];
							}
						}	
		    		  	if($red2['li']  == 'like')
		    		  	{ echo "color: #3cc453;"; } 
		    		  	else {echo "<i class='fa fa-angle-up fa-2x'> </i>";}?>" 
		    		 	id='l1' class='fa fa-angle-up fa-2x'> </i></a>
		    		  &nbsp;  <span><?php echo  $totalLikes . '  &nbsp; sviđanja ';?> </span></span>
		    		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    		  <a class='strelica' href='<?php echo  "../jedan_post/index.php?postid=".$postid."&type=2";?>' > 
		    		  	<i  style="<?php if($red2['li']  == 'dislike')
		    		  	{ echo "color: red;"; } else {echo "<i class='fa fa-angle-down fa-2x'> </i>";}?>"  
		    		  	id='disl1' class='fa fa-angle-down fa-2x'> </i></a>
		    		  &nbsp;<span><?php echo $totalDislikes . ' nesviđanja';?></span>
		    		  </div>
					  <a class="ui button blue basic" href=<?php echo  "../../twitteroauth-master/index.php?postid=".$postid." ";?>  > 
					  Twitter </a>
		    </div>
			</div>
            <hr class='style-two'>
            <?php
				if($result2->num_rows > 0){
            		while($row2 = $result2->fetch_assoc())
            		{
            			?>
            			<div class='ui small comments '>
					    	<div id="com2" class='comment'>
						      	<a class='avatar'>
						         	<img id="post" src= <?php if($row2['kava'] != '')  { echo  $row2["kava"];} else { echo  "../images/avatar-def.jpg";} ?>>
						      	</a>
						      	<div class='content'>
						      		<a id="author" class='author'  href= <?php echo "../korisnik/index.php?korid=".  $row2["korid"]; ?>> <?php echo $row2["kime"]; ?>  </a>
							      	<div class='metadata'>
							        	<div id="date" class='date'><?php echo date("j F Y  H:i", strtotime($row2["kdat"])); ?></div>
							      	</div>
							      	<div class='text'>
							        	<p id="komentar"> <?php echo $row2["kkom"]; ?> </p>
							       
							      	</div>
					      
					    		</div>
					  		</div><?php
					}
				}else {
				 		echo "Nema komentara";
				 		
        		}
        }
	} 				?> 			
					<form id="submit-form" class='ui reply form' method='POST' action="">
						
					    <div class='fluid input field'>
					      	<textarea id="kom1" name='komentar'> </textarea>
					    </div>
					    <button id="submit_com" name="submit_kom" class='ui grey basic submit labeled icon button'>
					      	<i class='icon edit'></i> Dodaj komentar
					    </button>
					    <span id='por1'></span>
					</form>
					
			</div>
		</div>
	</div>
	<?php
 
if(isset($_SESSION['user']))
{
	if(isset($_GET['type'], $_GET['postid'])  and !(empty($_GET['postid'])))
	{
		
		$id= (int) $_GET['postid'];
		$type= (int) $_GET['type'];
		$user_sql = "SELECT id FROM korisnik WHERE user = '".$_SESSION["user"]."' ";
		$res = $conn->query($user_sql);
		if ($res->num_rows === 1) {
			if($red = $res->fetch_assoc()) {
					$userid= $red['id'];
			}
		}
		$polje_lajk_sql = "SELECT lajk FROM p_lajkovi WHERE user_id = $userid AND postovi_id= $id";
		$resu = $conn->query($polje_lajk_sql);
		if ($resu->num_rows === 1) {
			if($rd = $resu->fetch_assoc()) {
					$polje_lajk= $rd['lajk'];
			}
		}
		// $prov_sql = "SELECT id FROM galerija WHERE id = '$id'";
		// $check = $conn->query($prov_sql);
		// if ($check->num_rows === 1) 
		// {
   			
			if($type === 1 )
			{

				$sql_like = "SELECT * FROM p_lajkovi WHERE postovi_id = $id AND user_id = $userid";
				$check_like= $conn->query($sql_like);
				if($check_like->num_rows === 1)
				{
					if($polje_lajk == 'like')
					{
						$un_like = $conn->prepare("DELETE FROM p_lajkovi WHERE postovi_id = ? AND user_id = ? ");
						$un_like->bind_param("ii", $id, $userid);
						$un_like->execute();
						
					}
					else if($polje_lajk == 'dislike')
					{
						$un_like = $conn->prepare("DELETE FROM p_lajkovi WHERE postovi_id = ? AND user_id = ? ");
						$un_like->bind_param("ii", $id, $userid);
						$un_like->execute();
						$insert =$conn->prepare("INSERT INTO p_lajkovi (`postovi_id`, `user_id`, `lajk`) VALUES (?,?, ?)");	
			        
			        	$result = $insert->bind_param('iis', $id, $userid, $di='like');
			        	$result = $insert->execute();
			        	if ($result != TRUE) {
							echo "Error: " . $conn->error;
							
						} 

					}
					
					

				} else {
					$insert =$conn->prepare("INSERT INTO p_lajkovi (`postovi_id`, `user_id`, `lajk`) VALUES (?,?, ?)");	
		        
		        	$result = $insert->bind_param('iis', $id, $userid, $lajk='like');
		        	$result = $insert->execute();
		        	if ($result != TRUE) {
						echo "Error: " . $conn->error;
						
					} 

				}

				header("Location: ../jedan_post/index.php?postid=$id");
					
			}else if($type == 2)
			{
				$sql_dislike = "SELECT * FROM p_lajkovi WHERE postovi_id = $id AND user_id = $userid";
				$check_dislike= $conn->query($sql_dislike);
				if($check_dislike->num_rows === 1)
				{
					if($polje_lajk == 'dislike')
					{
						$un_like = $conn->prepare("DELETE FROM p_lajkovi WHERE postovi_id = ? AND user_id = ? ");
						$un_like->bind_param("ii", $id, $userid);
						$un_like->execute();
					}
					else if($polje_lajk == 'like')
					{
						$un_like = $conn->prepare("DELETE FROM p_lajkovi WHERE postovi_id = ? AND user_id = ? ");
						$un_like->bind_param("ii", $id, $userid);
						$un_like->execute();

						$insert =$conn->prepare("INSERT INTO p_lajkovi (`postovi_id`, `user_id`, `lajk`) VALUES (?,?, ?)");
						
			        
			        	$result = $insert->bind_param('iis', $id, $userid, $di='dislike');
			        	$result = $insert->execute();
			        	if ($result != TRUE) {
							echo "Error: " . $conn->error;
							
						} 
					}


				}else
				{
					$insert =$conn->prepare("INSERT INTO p_lajkovi (`postovi_id`, `user_id`, `lajk`) VALUES (?,?, ?)");	
		        
		        	$result = $insert->bind_param('iis', $id, $userid, $di='dislike');
		        	$result = $insert->execute();
		        	if ($result != TRUE) {
						echo "Error: " . $conn->error;
						
					} 
				}
				
				header("Location: ../jedan_post/index.php?postid=$id");
			} 
	
 }
}else{
			echo "<p> Morate biti <a class='ui link' href='../login/index.php'; > ulogovani  </a> da biste poslali komentar i ocenili post. </p> ";
		}
 


include '../footer.php';
?>