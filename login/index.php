
<?php
   
    include "../header.php";
    require('../conn.php');
?>
<?php
    session_start();
     if(isset($_SESSION["user"]))
    {
        $user = $_SESSION['user'];
        $_SESSION['pass'] = $_POST['pass'];
        header("Location: ../pocetna/index.php");

            
    }
   
   // $pass = stripslashes($_REQUEST['pass']);
    
    if(isset($_POST["submit_login"]))
    {
            $user = stripslashes($_REQUEST['user']); // removes backslashes
            $user = mysqli_real_escape_string($conn, $user); //escapes special characters in a string
            $pass = stripslashes($_REQUEST['pass']);
            $_SESSION['pass'] = stripslashes($_REQUEST['pass']);
            $pass = mysqli_real_escape_string($conn, $pass);
            $pass =  md5($pass);

            //Checking is user existing in the database or not
            $query = $conn->prepare("SELECT * FROM korisnik WHERE user='$user' AND pass='$pass'");
            $result = $query->bind_param('ss', $pass, $user);
            $result = $query->execute();
            if($result == FALSE){
                echo "Error: " . $query->error;
            }
            $result = $query->get_result();
            if ($result == false) {
                echo 'Error: ' . $query->error;
            }
            $rows = mysqli_num_rows($result);
            if($rows==1){
                $_SESSION['user'] = $user;
                header("Location: ../pocetna/index.php"); 

                } else{
                     
                echo "<div class='ui main container segment'>";
               // echo "No data in db";
                echo "Niste registrovani. Molimo registrujte se i pokusajte ponovo. <br/>";
                // echo "$pass";
                echo "<a class='ui teal basic button' href='../registracija/index.php'; > Registruj se </a>";
                echo "</div"; }
        
        
    }else{
    
?>


    <div class="ui main text container segment"   <?php if(isset($_POST["submit_login"])){ echo 'style="display:none;"'; } ?> >
        <div class="ui huge header"> Prijava</div>
        <p class="ui horizontal divider">
             <i class="edit icon"></i> 
         </p>
        <form class="ui form" action="" method="post" >
            <div class="field required">
                <label> Korisničko ime </label>
                <input type="text" placeholder="korisnicko ime" name="user" required>
            </div>
            <div class="field required">
                <label> Lozinka </label>
                <input type="password" placeholder="pass" name="pass" required>
            </div>
            <button name="submit_login" class="ui teal small button"> Prijavi se </button>
            <br><br>
            <div class="extra">
                <p>Nemaš nalog?
                <a class="link" href="../registracija/index.php">  Registruj se. </a></p>
            </div>
        </form>
    </div>

    
</body>
<?php   } 


?>



</html>
