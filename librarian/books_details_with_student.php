<?php
 
 include "header.php";
 include "connection_lib.php";
 ?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Könyvek kikölcsönözve</h3>
            </div>

  
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <?php
                            $i=0;
                            $res=mysqli_query($link,"select * from add_books");
                            echo "<table class='table table-bordered'>";
                            echo "<tr>";
                            while($row=mysqli_fetch_array($res))
                            {
                                $i=$i+1;
                                echo "<td>";
                                ?> <img src="../librarian/<?php echo $row["cover"];?>" height="100" width="100" > <?php
                                echo "<br>";
                                echo "<b>".$row["book_name"]."</b>";
                                echo "<br>";
                                echo "<b>". "Összesen :".$row["qty"]."</b>";
                                echo "<br>";
                                echo "<b>". "Elérhető :".$row["available_qty"]."</b>";
                                echo "<br>";
                                ?> <a href="all_student_of_this_books.php?book_name=<?php echo $row["book_name"];?>" style="color:red;">Kik kölcsönözték ki ezt a könyvet</a> <?php
                                echo "</td>";

                                if($i==2){
                                    echo "</tr>";
                                    echo "<tr>";
                                    $i=0;

                                }
                            }
                            echo "</table>";
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