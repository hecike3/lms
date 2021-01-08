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
                                    <select name="enr" class="form-control selectpicker">

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
                                echo $_POST["enr"];
                                $res5=mysqli_query($link,"select * from student_registration where enrollmentno='$_POST[enr]'");
                                while($row5=mysqli_fetch_array($res5))
                                {
                                    $firstname=$row5["firstname"];
                                    $lastname=$row5["lastname"];
                                    $username=$row5["username"];
                                    $email=$row5["email"];
                                    $contact=$row5["contact"];
                                    $sem=$row5["sem"];
                                    $enrollment=$row5["enrollmentno"];
                                    $_SESSION["enrollmentno"]=$enrollment;
                                    $_SESSION["username"]=$username;

                                }


                                ?>

                                <table class="table table-bordered">

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="enrollmentno" value="<?php echo $enrollment?>"  placeholder="enrollmentno" disabled>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="studentname" value="<?php echo $firstname.' '.$lastname?>" placeholder="studentname" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="studentsem" value="<?php echo $sem?>" placeholder="studentsem" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="studentcontact" value="<?php echo $contact?>" placeholder="studentcontact" required>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="studentemail" value="<?php echo $email?>" placeholder="studentemail" required>
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
                                            <input type="text" class="form-control" name="bookissuedate" value="<?php echo date("d/M/Y");?>" placeholder="bookissuedate" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" --name="studentusername" placeholder="studentusername" value="<?php echo $username?>" disabled>
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
                            <?php
                            if(isset($_POST["submit2"]))
                            {
                                mysqli_query($link,"insert into issue_books values('','$_SESSION[enrollmentno]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[bookname]','$_POST[bookissuedate]','','$_SESSION[username]')");
                                mysqli_query($link,"update add_books set available_qty=available_qty-1 where book_name='$_POST[bookname]'");
                                ?>
                               <script type="text/javascript">
                                alert("A könyv kölcsönzésd sikeresen felkerült az adatbázisba!");
                                window.location.href=window.location.href;
                                </script>

                                <?php
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