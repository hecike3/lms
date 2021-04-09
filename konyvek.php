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
                            <h1 class="display-4">Könyvek</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Könyvek -->

<?php

    if(isset($_GET['page'])){
        $pageno = $_GET['page'];
    }else {
        $pageno = 1;
    }

    $no_of_records_per_page = 10;
    $offset = ($pageno-1) * $no_of_records_per_page; 


    //$total_pages = "SELECT COUNT(*) FROM add_books";
    //$result = mysqli_query($link,$total_pages);
    $page_count=mysqli_query($link,"SELECT (CEIL(COUNT(id)/$no_of_records_per_page)) AS page_count FROM add_books")->fetch_assoc()["page_count"];


?>




<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <!-- Section: Sidebar -->
            <section>

                <!-- Section: Filters -->
                <section>

                    <h5>Szűrők</h5>

                    <!-- Section: Condition -->
                    <section class="mb-4">


                        <div class="card">
                            <article class="card-group-item">
                                <header class="card-header">
                                    <h6 class="title">Ár</h6>
                                </header>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Minimum</label>
                                                <input type="number" class="form-control" id="ar1"
                                                    placeholder="1 000 Ft"  min="1" onchange="filterButtonEnable()">
                                            </div>
                                            <div class="form-group col-md-6 text-right">
                                                <label>Maximum</label>
                                                <input type="number" class="form-control" min="1" id="ar2" placeholder="10 000 Ft" onchange="filterButtonEnable()">
                                            </div>
                                            <button id="filter" class="btn">Szűrés</button>
                                        </div>
                                    </div>

                                </div>
                            </article>
                            <article class="card-group-item">
                                <header class="card-header">
                                    <h6 class="title">Kategória </h6>
                                </header>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <div class="custom-control custom-checkbox">
                                            <span class="float-right badge badge-light round">
                                                <?php 
                                    $res=mysqli_query($link,"SELECT COUNT(category) FROM add_books  WHERE category='irodalom'")->fetch_array();
                                    echo $res[0];
                                    ?>
                                            </span>
                                            <a href="?category=irodalom">Irodalom</a>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <span class="float-right badge badge-light round">
                                                <?php 
                                    $res=mysqli_query($link,"SELECT COUNT(category) FROM add_books  WHERE category='tudomany'")->fetch_array();
                                    echo $res[0];
                                    ?>
                                            </span>
                                            <a href="?category=tudomany">Tudomány</a>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <span class="float-right badge badge-light round">
                                                <?php 
                                    $res=mysqli_query($link,"SELECT COUNT(category) FROM add_books  WHERE category='scifi'")->fetch_array();
                                    echo $res[0];
                                    ?>
                                            </span>
                                            <a href="?category=scifi">Sci-fi</a>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <span class="float-right badge badge-light round">
                                                <?php 
                                    $res=mysqli_query($link,"SELECT COUNT(category) FROM add_books  WHERE category='humor'")->fetch_array();
                                    echo $res[0];
                                    ?>
                                            </span>
                                            <a href="?category=humor">Humor</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>


                    </section>
                    <!-- Section: Sidebar -->
        </div>
        <div class="col-lg-9">
            <?php

                if(isset($_GET['category'])){
                    $catagery = $_GET['category'];
                    print_r ($catagery);
                    $catagery_filter = "SELECT * FROM add_books WHERE category='$catagery'";
                    $res= mysqli_query($link,$catagery_filter);
                }
                else{
                    $sql = "SELECT * FROM add_books ORDER BY id ASC LIMIT $offset, $no_of_records_per_page";
                    $res= mysqli_query($link,$sql);
                }
                
                
                
                
                while($row=mysqli_fetch_array($res)){
                ?>


            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="librarian/<?php echo $row["cover"];?>" class="img-thumbnail" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row["book_name"];?>
                            </h5>
                            <p class="card-text">Író :
                                <?php echo $row["author_name"];?>
                            </p>
                            <p class="card-text"><small class="text-muted">Kiadó :
                                    <?php echo $row["publicator_name"];?>
                                </small></p>
                        </div>
                    </div>
                </div>
            </div>


            <?php
                }
                ?>
        </div>

    </div>
</div>




<div class="container">
    <div class="row d-flex justify-content-center">
        <nav>
            <ul class="pagination">
                <li class="page-item <?php if($pageno <= 1) { echo 'disabled'; } ?>">
                    <a class="page-link" href="<?php if($pageno <= 1 ) { echo '#'; } else { echo "
                        ?page=".($pageno - 1); } ?>">Előző</a>
                </li>
                <li class="page-item <?php if($pageno >= $page_count) { echo 'disabled'; } ?>">
                    <a class="page-link" href="<?php if($pageno >= $page_count ) { echo '#'; } else { echo "
                        ?page=".($pageno + 1); } ?>">Következő</a>
                </li>

            </ul>
        </nav>
    </div>
</div>




<script type="text/javascript">

var ar1 = document.getElementById("ar1");
var ar2 = document.getElementById("ar2");
var filter = document.getElementById("filter");

filter.style="pointer-events: none;";
filter.classList.add('btn-outline-danger');

function filterButtonEnable(){

    if(ar1.value > 0 || ar2.value > 0){
        filter.style = "pointer-events: auto;";
        filter.classList.remove('btn-outline-danger');
        filter.classList.add('btn-outline-success');

    }
    else{
        filter.style="cursor : wait; pointer-events: none;"
        filter.classList.add('btn-outline-danger');
    }


}

</script>


<?php
include "assets/footer.php";
?>