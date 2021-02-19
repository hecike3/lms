<?php

 include "header.php";
 
 ?>
<title>Könyvek megjelenítése  | LMS </title>
<!-- page content area main -->
<div class="right_col" role="main">


        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Könyvek megjelenítése</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                    <form action="" name="form1" method="post">
                        <input type="text" name="t1" class="form-control" placeholder="Írd be a könyv nevét">
                        <input type="submit" name="submit1" value="Könyv keresése" class=" btn btn-default">
                    </form>


                    <?php

                    if(isset($_POST["submit1"])){
                                $res= mysqli_query($link,"select * from add_books where book_name like('$_POST[t1]%')");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Könyv neve"; echo "</th>";
                                echo "<th>"; echo "Könyv borító"; echo "</th>";
                                echo "<th>"; echo "Szerző"; echo "</th>";
                                echo "<th>"; echo "Kiadó"; echo "</th>";
                                echo "<th>"; echo "Megvásárlás időpontja"; echo "</th>";
                                echo "<th>"; echo "Könyv ára"; echo "</th>";
                                echo "<th>"; echo "Összesen"; echo "</th>";
                                echo "<th>"; echo "Elérhető"; echo "</th>";
                                echo "<th>"; echo "Törlés"; echo "</th>";
                                echo "</tr>";
                            while($row = mysqli_fetch_array($res)){
                                echo "<tr>";
                                echo "<td>"; echo $row["book_name"]; echo "</td>";
                                echo "<td>"; ?> <img src="<?php echo $row["cover"]; ?>" height="100" width="100"> <?php  echo "</td>";
                                echo "<td>"; echo $row["author_name"]; echo "</td>";
                                echo "<td>"; echo $row["publicator_name"]; echo "</td>";
                                echo "<td>"; echo $row["purchase_date"]; echo "</td>";
                                echo "<td>"; echo $row["price"]; echo "</td>";
                                echo "<td>"; echo $row["qty"]; echo "</td>";
                                echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                echo "<td>"; ?> <button id="<?=$row["id"]?>" class="btn btn-danger">Törlés</button> <?php echo "</td>";
                                echo "</tr>";

                            }
                            echo "</table>";
                    }
                    else {
                        $res= mysqli_query($link,"select * from add_books");
                        echo "<table class='table table-bordered'>";
                        echo "<tr>";
                        echo "<th>"; echo "Könyv neve"; echo "</th>";
                        echo "<th>"; echo "Könyv borító"; echo "</th>";
                        echo "<th>"; echo "Szerző"; echo "</th>";
                        echo "<th>"; echo "Kiadó"; echo "</th>";
                        echo "<th>"; echo "Megvásárlás időpontja"; echo "</th>";
                        echo "<th>"; echo "Könyv ára"; echo "</th>";
                        echo "<th>"; echo "Összesen"; echo "</th>";
                        echo "<th>"; echo "Elérhető"; echo "</th>";
                        echo "<th>"; echo "Törlés"; echo "</th>";
                        echo "</tr>";
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr class='fade-away'>";
                        echo "<td>"; echo $row["book_name"]; echo "</td>";
                        echo "<td>"; ?> <img src="<?php echo $row["cover"]; ?>" height="100" width="100"> <?php  echo "</td>";
                        echo "<td>"; echo $row["author_name"]; echo "</td>";
                        echo "<td>"; echo $row["publicator_name"]; echo "</td>";
                        echo "<td>"; echo $row["purchase_date"]; echo "</td>";
                        echo "<td>"; echo $row["price"]; echo "</td>";
                        echo "<td>"; echo $row["qty"]; echo "</td>";
                        echo "<td>"; echo $row["available_qty"]; echo "</td>";
                        echo "<td>"; ?> <button id="<?=$row["id"]?>" class="btn btn-danger">Törlés</button> <?php echo "</td>";
                        echo "</tr>";

                    }
                    echo "</table>";
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


<?php
 
 include "footer.php";
 
 ?>           


 
<script type="text/javascript" >
        $(function() {

            $(".btn-danger").click(function() {
                var del_id = $(this).attr("id");
                var info = 'id=' + del_id;
                if (confirm("Biztos szeretnéd törölni?")) {
                    $.ajax({
                        type : "POST",
                        url : "delete_books.php",
                        data : info,
                        success : function() {

                          console.log("yo");
                        }
                    });
                    $(this).parents(".fade-away").animate("fast").animate({
                        opacity : "hide"
                    }, "slow");
                }
                return false;
            });
        });
 </script>