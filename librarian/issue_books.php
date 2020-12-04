<?php
 session_start();
 include "header.php";
 include "connection_lib.php";
 ?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kikölcsönzött könyvek</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        
                        <form name="form1" action="" method="post">
                        
                            <table>
                            <tr>
                                <td>
                                    <select class="form-control selectpicker">

                                    <?php
                                    $res=mysqli_query($link,"select enrollmentno from student_registration");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        echo "<option>";
                                        echo $row["enrollmentno"];
                                        echo "</option>";
                                    }
                                    
                                    
                                    ?>

                                    </select>
                            
                                </td>
                                <td>
                                    <input type="submit" value="Keresés" name="submit1" class="form-control btn btn-default">
                                </td>
                            </tr>
                            </table>

                            <?php
                            if(isset($_POST["submit1"]))
                            {
                                ?>

                                <table class="table table-bordered">

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="enrollmentno" placeholder="enrollmentno" disabled>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="studentname" placeholder="studentname" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="studentsem" placeholder="studentsem" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="studentcontact" placeholder="studentcontact" required>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="studentemail" placeholder="studentemail" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <select name="bookname" class="form-control selectpicker">
                                                <?php
                                                $res = mysqli_query($link,"select book_name from add_books");
                                                    while($row=mysqli_fetch_array($res))
                                                    {
                                                        echo "<option>";
                                                        echo $row["book_name"];
                                                        echo "</option>";
                                                    }
                                                ?>
                                            
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="bookissuedate" placeholder="bookissuedate" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="studentusername" placeholder="studentusername" disabled>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <input type="submit" class="form-control btn btn-default" name="submit2"  value="Felvétel">
                                        </td>
                                    </tr>
                                
                                </table>

                                <?php
                            }
                            
                            
                            ?>
                                                
                        </form>

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