<?php
 
 include "header.php";
 
 ?>
<?php
    if(isset($_POST["send"])){
        if(isset($_FILES["profilepic"])){
            $target_dir="profilepic/";
            $target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
            $uploadOK = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
            if($check !== false){
                echo "A fájl sikeresen fel lett töltve - " .$check["mime"];
                
                $uploadOK = 1;
            }else {
                echo "nem yo a kép";
                $uploadOK = 0;
            }
        }else{
             //  $sql = "UPDATE student_registration SET username='$_POST[felh]', firstname='$_POST[firstname]', lastname='$_POST[lastname]',email='$_POST[mail]', contact='$_POST[tel]' WHERE username='$_SESSION[username]'";
             //  $_SESSION['username'] = $_POST['felh'];
             //  mysqli_query($link,$sql);
        }



            
}            
?>
 
 <!-- page content area main -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Profil</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row" style="min-height:500px">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Profil szerkesztése</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php
                                $sql = "SELECT * FROM student_registration WHERE username='$_SESSION[username]'";
                                $res = mysqli_query($link,$sql)->fetch_array();
                               // print_r($res);
                                
                                ?>


                                <form method="post" name="form1" enctype="multipart/form-data">
                                    <p>Felhasználó név : </p>
                                    <input type="text" name="felh" value=" <?php echo "$res[username]"?>" class="form-control">
                                    <p>Profilkép : </p>
                                    <input type="file" name="profilepic" class="form-control">
                                    <p>Vezetéknév : </p>
                                    <input type="text" name="firstname" value="<?php echo "$res[firstname]"?>" class="form-control"> 
                                    <p>Keresztnév : </p>
                                    <input type="text" name="lastname" value="<?php echo "$res[lastname]"?>" class="form-control">
                                    <p>E-mail : </p>
                                    <input type="mail" name="mail" value="<?php echo "$res[email]"?>" class="form-control">
                                    <p>Telefonszám : </p>
                                    <input type="text" name="tel" value="<?php echo "$res[contact]"?>" class="form-control">
                                    <br>
                                    <p>SEM szám : </p>
                                    <?php echo "$res[sem]"?>
                                    <br>
                                    <p>Enrollment szám : </p>
                                    <?php echo "$res[enrollmentno]"?>
                                    <hr>
                                    <button type="submit" name="send" class="form-control">Változtatások mentése</button>
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