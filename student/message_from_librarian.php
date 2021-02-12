<?php
 include "header.php";
 include "connection.php";
 $res=mysqli_query($link,"UPDATE messages SET read1='y' WHERE dusername='$_SESSION[username]'");
 ?>
 
 
 <!-- page content area main -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Üzeneteim</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row" style="min-height:500px">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              
                            <table class="table table-bordered">
                            <tr>
                            <th>Teljes név</th>
                            <th>Tárgy</th>
                            <th>Üzenet</th>
                            </tr>
                            <?php
                            $res=mysqli_query($link,"SELECT * FROM messages WHERE dusername='$_SESSION[username]' ORDER BY id desc");
                            while($row=mysqli_fetch_array($res)){

                                    $res1=mysqli_query($link,"SELECT * FROM librarian_registration WHERE email='$row[susername]'");
                                    $row1=mysqli_fetch_array($res1);
                                    $fullname=$row1["firstname"]." ".$row1["lastname"];
                                 
                                    
                                    
                                echo "<tr>";
                                echo "<td>"; echo $row[""]; echo "</td>";
                                echo "</tr>";
                            }

                            ?>
                            
                            </table>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->


<?php
 
 include "footer.php";
 
 ?>           