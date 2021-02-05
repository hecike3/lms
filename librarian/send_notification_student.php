<?php
 session_start();
 include "header.php";
 include "connection_lib.php";
 ?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Üzenet küldése diáknak</h3>
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
                    <div class="x_content">
                        
                    <form action="" name="form1" method="post" class="col-lg-6" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <select class="form-control" name="dusername">
                                    <?php
                                    $res=mysqli_query($link,"select * from student_registration");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        ?>
                                        <option value="<?php echo $row["username"]?>">
                                        <?php echo $row["username"]."(". $row["enrollmentno"]. ")"; ?>
                                        </option> <?php
                                    }
                                    ?>
                                    
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>

                            <td> <input type="text" placeholder="Tárgy" class="form-control" name="title"> </td>

                            </tr>

                            <tr>
                                
                            <td>
                            Üzenet <br>
                             <textarea name="msg" class="form-control">
                             </textarea> 
                             </td>

                            </tr>
                           
                            <td> <input type="submit" name="submit1" value="Küldés 🤡" class="form-control"> </td>



                        </table>
                    </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link,"insert into messages value('','$_SESSION[librarian]','$_POST[dusername]','$_POST[title]','$_POST[msg]','n')");
?>

<script type="text/javascript">
alert("yooooo");
</script>


<?php
}

 include "footer.php";
 
 ?>           