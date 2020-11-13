<?php
include "connection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bejelentkezés | Tanuló </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Spooktober Könyvtár </h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>Tanuló belépés</h1>

            <div>
                <input type="text" name="username" class="form-control" placeholder="Felhasználónév" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Jelszó" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit1" value="Bejelentkezés">
                <a class="reset_pass" href="#">Elvesztetted a jelszavad?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">Új vagy oldalon?
                    <a href="regisztracio.php"> Csinálj egy fiókot! </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>


</div>

<?php
if(isset($_POST["submit1"]))
    {
    $count=0;
    $pwhash=hash("sha256",$_POST['password']);
      $res=mysqli_query($link,"select * from student_registration where username='$_POST[username]' && password='$pwhash' && status='yes' ");
      $count=mysqli_num_rows($res);

      if($count==0){
            ?>

                <div class="alert alert-danger col-lg-6 col-lg-push-3">
                    <strong style="color:white">Hibás</strong> a felhasználónév vagy a jelszó
                </div>

        <?php
      }else
      {
        ?>

        <script type="text/javascript">
        window.location="aa.php";
        </script>

        <?php
      }
    }
?>





</body>
</html>
