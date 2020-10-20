
<?php

include "../conn.php";
include "../header.php";


$sql = "SELECT * FROM projekti";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    echo "<div class='ui main text container' > <div class='ui huge header'> Portfolio </div>";
    echo "<div class='ui raised segment'> <div class='ui divided items'>";
    while($row = $result->fetch_assoc()) 
    {
        echo " <div class='item'>
                <div class='ui medium image'>
                        <img class='ui  image' src='" .$row['slika']. "'>
                </div>
             <div class='content'>
                    <a class='ui large port header' href='../jedan_projekat/index.php?projekatid=". $row['id'] . "'> ".$row["naslov"]."</a>
                     <div class='meta'> 
                    <span> ". date("j F Y", strtotime($row["datum"])). " </span> 
             </div>";
        echo "<div class='description'> <p>". substr($row["opis"], 0, 300) .'...' ."</p> </div>
              <div class='extras'>
                <a class='ui floated mini teal basic button' href='../jedan_projekat/index.php?projekatid=". $row['id'] . "'> VIŠE <i style='margin-bottom: 3px;' class='angle double right icon'></i></a>
              </div> 
              </div> </div>";
    }

     
} 
else 
{
    echo "No data in DB";
}

echo" </div> </div>";
echo "</div>";




?>