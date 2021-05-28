<?php
include "assets/header.php";
include "connection.php";
?>


<!-- Ez ittni a Jumpbotron-->

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">

      <div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h1 class="display-4">Dr.Code <b>Online</b> könyvtára!</h1>
              <p class="lead">Ha esetleg szeretnél könyveket kölcsönözni <b> ONLINE </b> akkor a legjobb helyen jársz :3 </p>
              <hr class="my-4">
              <p>Ha nem találod a könyvek között amit keresel kérlek keress fel minket.</p>
              <a class="btn btn-primary btn-lg" href="#" role="button">Kapcsolat</a>
            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
</div>

<!-- Könyv lista -->
<div class="container">
  <div class="row">

<?php
$res= mysqli_query($link,"SELECT * FROM add_books ORDER BY id DESC LIMIT 4");
while($row=mysqli_fetch_array($res)){
  ?>
        <div class="col-lg-6">

          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="librarian/<?php echo $row["cover"];?>" class="img-thumbnail" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"> <?php echo $row["book_name"];?> </h5>
                  <p class="card-text">Író : <?php echo $row["author_name"];?></p>
                  <p class="card-text"><small class="text-muted">Kiadó : <?php echo $row["publicator_name"];?></small></p>
                  <a class="btn btn-success" href="konyv.php?id=<?php echo $row["id"];?>">Tovább olvasom</a>
                </div>
              </div>
            </div>
          </div>
       </div>

  <?php
}
?>

</div>
</div>

<!-- Rólunk snipet  -->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">

        <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Rólunk</h1>
    <p class="lead">Mi egy nagyon csodálatos könyvtár vagyunk ám. Ha többet szeretnél megtudni a történelmünkről illetve a könyvtár életéről akkor kattints az alábbi gombra 😘</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Rólunk</a>
  </div>
</div>



    </div>
  </div>
</div>






<?php
include "assets/footer.php";
?>