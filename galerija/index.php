<?php
  include "../header.php";
  include "../conn.php";


?>

  <div class="ui main  container">
      <div class="ui huge header"> Galerija </div>  
            <div class="ui four column grid">
            <?php

            $sql = "SELECT * FROM galerija ORDER BY id DESC";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
              while($row = $result->fetch_assoc()) 
              {
                  $lid= $row['id'];
                  $lajkovi_sql= "SELECT COUNT(*) AS svi_lajkovi FROM `galerija` LEFT JOIN g_lajkovi ON galerija.id = g_lajkovi.slika_id WHERE g_lajkovi.slika_id = '$lid' AND g_lajkovi.lajk= 'like' ";
                  $result2 = $conn->query($lajkovi_sql);

                  $dislajkovi_sql= "SELECT COUNT(*) AS svi_dislajkovi FROM `galerija` LEFT JOIN g_lajkovi ON galerija.id = g_lajkovi.slika_id WHERE g_lajkovi.slika_id = '$lid' AND g_lajkovi.lajk= 'dislike' ";
                  $result3 = $conn->query($dislajkovi_sql); 


                ?>
              <div class="column">
                <div class="ui card">
                    <div class="image">
                        <a href="../slika/index.php?slikaid=<?php echo $row['id']; ?> "><img class=" ui medium image" style="height: 200px" src="<?php echo $row['putanja']; ?>"></a>
                    </div>
                    <div class="content">

                      <?php 
                       if($result3->num_rows > 0){
                        while($row3 = $result3->fetch_assoc())  { 
                      ?>
                        <span class="right floated">
                          <i class="angle down grey large icon"></i>
                          <?php echo $row3['svi_dislajkovi']; } }?> 
                        </span>
                        <i class="angle up grey large icon"></i>
                        <?php if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc())  {  echo $row2['svi_lajkovi']; }}?> 
                    </div>
                   <!--  <div class="extras">
                        <input class="ui fluid input" placeholder="Komentar..." type="text">
                    </div> -->
                </div>
              </div>
        <?php 

      }
    }else{
        echo "No data in DB";
    }
        ?>
      </div>
    </div>