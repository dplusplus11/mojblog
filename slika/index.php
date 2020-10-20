
<?php

include_once "../header.php";
include_once "../conn.php";



$slikaid= $_GET['slikaid'];

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

$likes_sql = "SELECT COUNT(*) AS lajkovi FROM g_lajkovi WHERE lajk = 'like' AND slika_id = $slikaid";
$likes = $conn->query($likes_sql);
$like=  mysqli_fetch_array($likes);
$totalLikes = $like['lajkovi'];


$dislikes_sql = "SELECT COUNT(*) AS dislajkovi FROM g_lajkovi WHERE lajk = 'dislike' AND slika_id = $slikaid";
$dislikes = $conn->query($dislikes_sql);
$dislike=  mysqli_fetch_array($dislikes);
$totalDislikes = $dislike['dislajkovi'];



$sql = "SELECT putanja FROM galerija  WHERE id='$slikaid'  ";

$result = $conn->query($sql);



if ($result->num_rows > 0) 
{
	?> <div class="ui main container text basic padded segment" >
			<div class="ui padded segment">
	<?php
	while($row = $result->fetch_assoc()) 
	{
		?>
			

			    <div class="image">
			      <img class="ui fluid  image" src= <?php echo $row["putanja"]; ?>>
			    </div>
			    <br> <br>
			    <div class="extra content">
			    	<div class='content'>
			    	 <span class='hello'>
			    	 	<?php

							    	 	?>
			    		 <a class='strelica right floated' href=<?php echo  "../slika/index.php?slikaid=".$slikaid."&type=1" ;?> > 
			    		 	<i style="
			    		  	<?php 
			    		  	$polje_sql = "SELECT lajk as li FROM g_lajkovi WHERE user_id = '$userid' AND slika_id= '$slikaid'";
							$rest = $conn->query($polje_sql);
							if ($rest->num_rows === 1) {
								if($red2 = $rest->fetch_assoc()) {
										$poljel= $red2['li'];
								}
							}
							


			    		  	if($red2['li']  == 'like')
			    		  	{ echo "color: #3cc453;"; } 
			    		  	else {echo "<i class='fa fa-angle-up fa-2x'> </i>";}  ?>" 
			    		 	id='l1' class='fa fa-angle-up fa-2x'> </i></a>
			    		  &nbsp; <span><?php echo  $totalLikes . ' sviđanja ';?> </span></span>

			    		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    		  <a class='strelica' href=<?php echo  "../slika/index.php?slikaid=".$slikaid."&type=2"; ?>> 
			    		  	<i  style="
			    		  	<?php if($red2['li']  == 'dislike')
			    		  	{ echo "color: red;"; } 
			    		  	else {echo "<i class='fa fa-angle-down fa-2x'> </i>";}  ?>" 
			    		  	id='disl1' class='fa fa-angle-down fa-2x'> </i></a>
			    		  &nbsp; <span><?php echo $totalDislikes . ' nesviđanja' ; ?> </span>
			    		  </div>
			    
			    </div>
			  </div>
			
		<?php
		} 
	}
if(isset($_SESSION['user']))
{
	if(isset($_GET['type'], $_GET['slikaid'])  and !(empty($_GET['slikaid'])))
	{
		
		$id= (int) $_GET['slikaid'];
		$type= (int) $_GET['type'];
		$user_sql = "SELECT id FROM korisnik WHERE user = '".$_SESSION["user"]."' ";
		$res = $conn->query($user_sql);
		if ($res->num_rows === 1) {
			if($red = $res->fetch_assoc()) {
					$userid= $red['id'];
			}
		}
		$polje_lajk_sql = "SELECT lajk FROM g_lajkovi WHERE user_id = $userid AND slika_id= $id";
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

				$sql_like = "SELECT * FROM g_lajkovi WHERE slika_id = $id AND user_id = $userid";
				$check_like= $conn->query($sql_like);
				if($check_like->num_rows === 1)
				{
					if($polje_lajk == 'like')
					{
						$un_like = $conn->prepare("DELETE FROM g_lajkovi WHERE slika_id = ? AND user_id = ? ");
						$un_like->bind_param("ii", $id, $userid);
						$un_like->execute();
						
					}
					else if($polje_lajk == 'dislike')
					{
						$un_like = $conn->prepare("DELETE FROM g_lajkovi WHERE slika_id = ? AND user_id = ? ");
						$un_like->bind_param("ii", $id, $userid);
						$un_like->execute();
						$insert =$conn->prepare("INSERT INTO g_lajkovi (`slika_id`, `user_id`, `lajk`) VALUES (?,?, ?)");	
			        
			        	$result = $insert->bind_param('iis', $id, $userid, $di='like');
			        	$result = $insert->execute();
			        	if ($result != TRUE) {
							echo "Error: " . $conn->error;
							
						} 

					}
					
					

				} else {
					$insert =$conn->prepare("INSERT INTO g_lajkovi (`slika_id`, `user_id`, `lajk`) VALUES (?,?, ?)");	
		        
		        	$result = $insert->bind_param('iis', $id, $userid, $lajk='like');
		        	$result = $insert->execute();
		        	if ($result != TRUE) {
						echo "Error: " . $conn->error;
						
					} 

				}

				header("Location: ../slika/index.php?slikaid=$id");
					
			}else if($type == 2)
			{
				$sql_dislike = "SELECT * FROM g_lajkovi WHERE slika_id = $id AND user_id = $userid";
				$check_dislike= $conn->query($sql_dislike);
				if($check_dislike->num_rows === 1)
				{
					if($polje_lajk == 'dislike')
					{
						$un_like = $conn->prepare("DELETE FROM g_lajkovi WHERE slika_id = ? AND user_id = ? ");
						$un_like->bind_param("ii", $id, $userid);
						$un_like->execute();
					}
					else if($polje_lajk == 'like')
					{
						$un_like = $conn->prepare("DELETE FROM g_lajkovi WHERE slika_id = ? AND user_id = ? ");
						$un_like->bind_param("ii", $id, $userid);
						$un_like->execute();

						$insert =$conn->prepare("INSERT INTO g_lajkovi (`slika_id`, `user_id`, `lajk`) VALUES (?,?, ?)");
						
			        
			        	$result = $insert->bind_param('iis', $id, $userid, $di='dislike');
			        	$result = $insert->execute();
			        	if ($result != TRUE) {
							echo "Error: " . $conn->error;
							
						} 
					}


				}else
				{
					$insert =$conn->prepare("INSERT INTO g_lajkovi (`slika_id`, `user_id`, `lajk`) VALUES (?,?, ?)");	
		        
		        	$result = $insert->bind_param('iis', $id, $userid, $di='dislike');
		        	$result = $insert->execute();
		        	if ($result != TRUE) {
						echo "Error: " . $conn->error;
						
					} 
				}
				
				header("Location: ../slika/index.php?slikaid=$id");
			} 
			
			
			

		// }else{
		// 	echo "Big error";
		// }
	
 }
 }else{
		echo "<p class='description'> Morate biti <a class='ui link' href='../login/index.php'; > ulogovani  </a> da biste ocenili sliku. </p> </div>";
	}


 ?>


</body>
</html>

<!-- 
<script type="text/javascript">
	$(document).ready(function(){
		$('#l1').click(function(){
			$(this).toggleClass('hide');
			});

		$('#disl1').on('click', function(){
				
			$(this).toggleClass('hide');
		
			});
		});
</script> -->