<?php
include "assets/header.php";
include "connection.php";

if(isset($_GET['id'])){


    $id = $_GET['id'];
    $sql = "SELECT * FROM add_books WHERE id=$id";
    $res=mysqli_query($link,$sql);
    $row=mysqli_fetch_array($res);

?>

<link rel="stylesheet" href="assets/css/style.css" />

<div class="spacer"></div>

<div class="container pt-5">
    <div class="row">
        <div class="col-lg-3">
            <img src="librarian/<?php echo $row["cover"];?>" height="360px"  > 
            <ul class="list-group">
                <li class="list-group-item"> <b>Író : </b> <?php echo $row["author_name"]; ?></li>
                <li class="list-group-item"><b>Ár : </b> <?php echo $row["price"] ?> Ft </li>
                <li class="list-group-item"><b>Kiadó : </b> <?php echo $row ["publicator_name"]?></li>
                <li class="list-group-item"><b>Elérhető belőle : </b> <?php echo $row ["available_qty"]?></li>
            </ul>
        </div>
        <div class="col-lg-9">
            <h1><?php echo $row["book_name"];?></h1>  
            <hr/>      
            <p><?php echo $row["description"];?></p>
        </div>
    </div>
</div>
<?php
    }
else   {
    ?>

    <div class="container">
        <div class="row">
            <div class="flex">
                <h1>Úgy látszik eltévedtél, VAGY úgy nézelődtél az oldalon ahogy mi azt nem szerettük volna.</h1>
                <p>Kérlek fáradj vissza a főoldalra.</p>
                <a href="index.php" class="btn btn-success">Vissza a főoldalra</a>
            </div>
        </div>
    </div>


    <?php
}


include "assets/footer.php";
?>