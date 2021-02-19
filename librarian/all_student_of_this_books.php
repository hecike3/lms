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

            
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    
                    <div class="x_content">
                        <?php
                        $res=mysqli_query($link," select * from issue_books where books_name='$_GET[book_name]' && books_return_date=''");
                        echo "<table class='table table-bordered'>";
                        echo "<tr>";
                        echo "<th>"; echo "Diák neve";  echo "</th>";
                        echo "<th>"; echo "Diák Enrollment No";  echo "</th>";
                        echo "<th>"; echo "Könyv neve";  echo "</th>";
                        echo "<th>"; echo "Diák email";  echo "</th>";
                        echo "<th>"; echo "Diák telefonszám";  echo "</th>";
                        echo "<th>"; echo "Mikor kölcsönözte ki";  echo "</th>";
                        echo "</tr>";
                        while($row=mysqli_fetch_array($res)){
                                echo "<tr>";
                                echo "<td>"; echo $row["student_name"]; echo "</td>";
                                echo "<td>"; echo $row["student_enrollment"]; echo "</td>";
                                echo "<td>"; echo $row["books_name"]; echo "</td>";
                                echo "<td>"; echo $row["student_email"]; echo "</td>";
                                echo "<td>"; echo $row["student_contact"]; echo "</td>";
                                echo "<td>"; echo $row["books_issue_date"]; echo "</td>";


                                echo "</tr>";
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