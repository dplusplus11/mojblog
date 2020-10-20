
<?php
session_start();
if((!isset($_SESSION["user"])))
{
	header("Location: /moj_blog/login/index.php");
	exit();
}
?>
