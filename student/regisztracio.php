<?php
include "connection.php";
?>



<!DOCTYPE html>
<html lang="hu">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Diák regisztrációs űrlap | LMS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Dr.Code Könyvtár</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

        <section class="login_content" style="margin-top: -40px;">
            <form name="form1" action="" method="post">
                <h2>Diák regisztrációs űrlap</h2><br>

                <div>
                    <input type="text" class="form-control" placeholder="Keresztnév" name="firstname" required="" />
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Vezetéknév" name="lastname" required="" />
                </div>

                <div>
                    <input type="text" class="form-control" placeholder="Felhasználónév" name="username" required="" />
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Jelszó" name="password" required="" />
                </div>
                <div>
                    <input type="email" class="form-control" placeholder="E-mail" name="email" required="" />
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Telefonszám" name="contact" required="" />
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Azonosító" name="sem" required="" />
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Félév azonosító" name="enrollmentno"
                        required="" />
                </div>
                <div>
                    <select name="securityquestion" class="form-control">
                        <option value="1">Mi volt az első jószágod neve?</option>
                        <option value="2">Mi volt?</option>
                        <option value="3">Mi volt előbb a tyűk vagy a tojás?</option>
                        <option value="4">Ki a kedvenc énekesed?</option>
                    </select>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Biztonásgi kérdés válasz:" name="securityanswer"
                        required="" />
                </div>
                <div class="col-lg-12  col-lg-push-3">
                    <input class="btn btn-default submit " type="submit" name="submit1" value="Regisztráció">
                </div>

            </form>
        </section>

    <?php
    
    if(isset($_POST["submit1"])){
        
        $password=hash("sha256",$_POST['password']);
        $res1=mysqli_query($link,"insert into student_registration values('','$_POST[firstname]','$_POST[lastname]','$_POST[username]','$password','$_POST[email]','$_POST[contact]','$_POST[sem]','$_POST[enrollmentno]','no','profilepic/defaultpic.jpg','$_POST[securityquestion]','$_POST[securityanswer]')") or die($res1);
        ?>
            <div class="alert alert-success col-lg-12 col-lg-push-0">
                Sikeresen regisztráltál! <a href="login.php">Vissza a bejelentkezésre</a>
            </div>
        <?php
    }
    
    ?>


    </div>




</body>

</html>