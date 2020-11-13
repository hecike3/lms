<?php
 
 include "header.php";
 include "connection_lib.php";
 
 ?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Dashboard</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Diákok megjelenítése</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                            
                        <?php
                        
                        $res=mysqli_query($link,"select * from student_registration");
                        echo "<table class='table table-bordered'>";

                        echo "<tr>";

                        echo "<th>"; echo "Keresztnév"; echo "</th>";
                        echo "<th>"; echo "Vezetéknév"; echo "</th>";
                        echo "<th>"; echo "Felhasználónév"; echo "</th>";
                        echo "<th>"; echo "E-mail"; echo "</th>";
                        echo "<th>"; echo "Kontakt"; echo "</th>";
                        echo "<th>"; echo "Sem"; echo "</th>";
                        echo "<th>"; echo "Enrollment"; echo "</th>";
                        echo "<th>"; echo "Státusz"; echo "</th>";

                        echo "</tr>";

                        while($row=mysqli_fetch_array($res))
                            {
                                echo "<tr>";

                                echo "<th>"; echo $row["firstname"]; echo "</th>";
                                echo "<th>"; echo $row["lastname"]; echo "</th>";
                                echo "<th>"; echo $row["username"]; echo "</th>";
                                echo "<th>"; echo $row["email"]; echo "</th>";
                                echo "<th>"; echo $row["contact"]; echo "</th>";
                                echo "<th>"; echo $row["sem"]; echo "</th>";
                                echo "<th>"; echo $row["enrollmentno"]; echo "</th>";
                                echo "<th>"; echo $row["status"]; echo "</th>";
        
                                echo "</tr>";

                            }


                        echo "</table>"
                        
                        
                        
                        
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