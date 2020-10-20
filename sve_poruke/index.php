
<?php

include "../conn.php";
include "../header.php";
if(isset($_SESSION['user'])  && ($_SESSION['user'] == 'admin')){


$sql = "SELECT * FROM kontakt";

$result = $conn->query($sql);
$broj= $result->num_rows;
if ($result->num_rows > 0) 
{
    echo "<div class='ui main text container' > 
    <div class='ui huge header'> Sve poruke iz kontakt forme </div>";
    $i =0;
    while($row = $result->fetch_assoc()) 
    {
        $i++;
        ?> 
              <div class='ui padded segment'>
               <h4 class="ui horizontal divider header">
                  <i class="edit outline icon"></i> <?php echo $i. ". poruka"; ?> 
                </h4>
                <table class="ui definition table">
                  <tbody>
                    <tr>
                      <td class="three wide column">Od: </td>
                      <td><?php echo $row["ime"]; ?> </td>
                    </tr>
                    <tr>
                      <td>Email adresa:</td>
                      <td><?php echo  $row["email"]; ?> </td>
                    </tr>
                    <tr>
                      <td>Vreme: </td>
                      <td> <?php echo date("j F Y  H:i", strtotime($row["vreme"])); ?></td>
                    </tr>
                    <tr>
                      <td>Naslov poruke: </td>
                      <td><?php echo $row["naslov"]; ?></td>
                    </tr>
                    <tr>
                      <td>Tekst poruke: </td>
                      <td rowspan="3"><?php echo $row["tekst"]; ?></td>
                    </tr>
                   
                  </tbody>
                </table>
               

      <?php 
    } 
}else 
{
    echo "No data in DB";
}

echo" </div>";
echo "</div>";


}else{
  header("Location:  ../login/index.php");
}

?>