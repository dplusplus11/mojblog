
<?php

include "../conn.php";
include "../header.php";


$sql = "SELECT * FROM postovi";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    echo "<div class='ui main text container' > <div class='ui huge header'> Postovi </div>";
    echo "<div class='ui raised segment'> <div class='ui divided items'>";
    while($row = $result->fetch_assoc()) 
    {
        echo " <div class='item'>
                <div class='image'>
                        <img src='../postovi_slike/" .$row['slika']. "'>
                </div>
             <div class='content'>
                    <a class='ui medium header' href='../jedan_post/index.php?postid=". $row['postovi_id'] . "'>".$row["naslov"]."</a>
            <div class='meta'> 
                    <span> ". date("j F Y", strtotime($row["reg_date"])). " </span> 
             </div>";
        echo "<div class='description'> <p>". substr($row["tekst"], 0, 300) .'...' ."</p> </div>
              <div class='extras'><br>
                <a class='ui floated mini teal basic button' href='../jedan_post/index.php?postid=". $row['postovi_id'] . "'> VIŠE <i style='margin-bottom: 3px;' class='angle double right icon'></i></a>
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