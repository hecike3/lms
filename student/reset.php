<?php
session_start();
include "connection.php";

print_r($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jelszó változtatás | Tanuló </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Dr.Code Könyvtár </h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>Jelszó változtatás</h1>

            <div>
                <input type="text" name="answer" class="form-control" placeholder="Válasz" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder=" Új jelszó" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit1" value="Küldés">
                
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
      $res=mysqli_query($link,"select * from student_registration where username='$_SESSION[username]' && securityanswer='$_POST[answer]'");
      $count=mysqli_num_rows($res);

      if($count==0){
            ?>

                <div class="alert alert-danger col-lg-6 col-lg-push-3">
                    <strong style="color:white">Hibás</strong> a biztonsági kérdésre adott válaszod! 
                </div>

        <?php
        
      }else
      {
        $sql = "UPDATE student_registration SET password='$pwhash' WHERE username='$_SESSION[username]'";
        print_r($sql);
        mysqli_query($link,$sql);
        ?>

        <script type="text/javascript">
        alert("Sikeresen megváltoztattad a jelszavad");
        window.location="login.php";
        </script>

        <?php
      }
    }
?>





</body>
</html>
