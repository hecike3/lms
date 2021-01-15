<?php
 
 include "header.php";
 include "connection.php";

 
 ?>
 
 
 <!-- page content area main -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Könyvek keresése</h3>
                        </div>

                      
                    </div>

                    <div class="clearfix"></div>
                    <div class="row" style="min-height:500px">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                            
                            <form action="" name="form1" method="post">
                                <table class="table">
                                    <tr>
                                        <td><input type="text" name="t1" placeholder="Írd ide a könyv nevét" required class="form-control"></td>
                                        <td><input type="submit" name="submit1" value="Keresés" class="form-control btn btn-default"></td>
                                    </tr>
                                </table>
                            </form>


                            <?php

                            if(isset($_POST["submit1"])){
                                $i=0;
                            $res=mysqli_query($link,"select * from add_books where book_name like ('%$_POST[t1]%')");
                            echo "<table class='table table-bordered'>";
                            echo "<tr>";
                            if($res->num_rows === 0)
                            {
                                echo 'Sajnos nincs ilyen könyv amit keresel :( ';
                            }
                            while($row=mysqli_fetch_array($res))
                            {
                                $i=$i+1;
                                echo "<td>";
                                ?> <img src="../librarian/<?php echo $row["cover"];?>" height="100" width="100" > <?php
                                echo "<br>";
                                echo "<b>".$row["book_name"]."</b>";
                                echo "<br>";
                                echo "<b>". "Elérhető :".$row["available_qty"]."</b>";
                                echo "</td>";

                                if($i==2){
                                    echo "</tr>";
                                    echo "<tr>";
                                    $i=0;

                                }
                            }
                            echo "</table>";
                            ?> 
                            <a href="/search_books.php"> Vissza az összes könyvhöz (még ne kattints rá nem működik :( )</a>
                            
                            <?php

                            }else{
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
                                echo "<b>". "Elérhető :".$row["available_qty"]."</b>";
                                echo "</td>";

                                if($i==2){
                                    echo "</tr>";
                                    echo "<tr>";
                                    $i=0;

                                }
                            }
                            echo "</table>";
                            }


                            
                            ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->


<?php
 
 include "footer.php";
 
 ?>           