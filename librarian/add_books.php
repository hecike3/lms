<?php
 session_start();
 include "header.php";
 ?>

<!-- page content area main -->
<div class="right_col" role="main">

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Könyv hozzáadása</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        
                    <form action="" name="form1" method="post" class="col-lg-6" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Könyv címe" name="bookname" required="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Borító</label>
                                    <input type="file" name="cover" required="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Szerző" name="author" required="">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Kiadó" name="publicator" required="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Megvásárlás időpontja" name="purchase" required="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Ár" name="price" required="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Darabszám" name="qty" required="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Elérhető darabszám" name="avaliable_qty" required="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="submit" class="form-control" class="btn btn-default submit" name="submit1" value="Könyv felvétele">
                                </td>
                            </tr>
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
if(isset($_POST["submit1"])){
   
    $tm=md5(time());
    $fnm=$_FILES["cover"] ["name"];
    $dst="./book_images/".$tm.$fnm;
    $dst1="book_images/".$tm.$fnm;

    move_uploaded_file($_FILES["cover"] ["tmp_name"],$dst);

    mysqli_query($link,"insert into add_books values('','$_POST[bookname]','$dst1','$_POST[author]','$_POST[publicator]','$_POST[purchase]','$_POST[price]','$_POST[qty]','$_POST[avaliable_qty]','$_SESSION[librarian]')");

    ?>
    <script type="text/javascript">
    alert("yo");
    </script>

<?php

}


?>

<?php
 
 include "footer.php";
 
 ?>           