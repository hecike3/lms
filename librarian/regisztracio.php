<?php
include "connection_lib.php";
?>



<!DOCTYPE html>
<html lang="hu">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Könyvtáros regisztrációs űrlap | LMS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Spooktober Könyvtár</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

        <section class="login_content" style="margin-top: -40px;">
            <form name="form1" action="" method="post">
                <h2>Könyvtáros regisztrációs űrlap</h2><br>

                <div>
                    <input type="text" class="form-control" placeholder="FirstName" name="firstname" required="" />
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="LastName" name="lastname" required="" />
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                </div>
                <div>
                    <input type="email" class="form-control" placeholder="email" name="email" required="" />
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="contact" name="contact" required="" /> 
                </div>
                <div class="col-lg-12  col-lg-push-3">
                    <input class="btn btn-default submit " type="submit" name="submit1" value="Regisztráció">
                </div>

            </form>
        </section>

    <?php
    
    if(isset($_POST["submit1"])){
        
        $password=hash("sha256",$_POST['password']);
        $res1=mysqli_query($link,"insert into librarian_registration values('','$_POST[firstname]','$_POST[lastname]','$password','$_POST[email]','$_POST[contact]')") or die($res1);
        ?>
            <div class="alert alert-success col-lg-12 col-lg-push-0">
                Sikeresen regisztráltál!
            </div>
        <?php
    }
    
    ?>


    </div>




</body>

</html>