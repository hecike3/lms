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

    print_r($page_count);
    




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

                       

                        <div class="form-check pl-0 mb-3">
                            <input type="checkbox" class="form-check-input filled-in" id="new">
                            <label class="form-check-label small text-uppercase card-link-secondary"
                                for="new">New</label>
                        </div>
                        <div class="form-check pl-0 mb-3">
                            <input type="checkbox" class="form-check-input filled-in" id="used">
                            <label class="form-check-label small text-uppercase card-link-secondary"
                                for="used">Used</label>
                        </div>
                        <div class="form-check pl-0 mb-3">
                            <input type="checkbox" class="form-check-input filled-in" id="collectible">
                            <label class="form-check-label small text-uppercase card-link-secondary"
                                for="collectible">Collectible</label>
                        </div>
                        <div class="form-check pl-0 mb-3 pb-1">
                            <input type="checkbox" class="form-check-input filled-in" id="renewed">
                            <label class="form-check-label small text-uppercase card-link-secondary"
                                for="renewed">Renewed</label>
                        </div>

                    </section>
                    <!-- Section: Condition -->

                    <!-- Section: Price -->
                    <section class="mb-4">

                        <h6 class="font-weight-bold mb-3">Price</h6>
                        <form>
                            <div class="d-flex align-items-center mt-4 pb-1">
                                <div class="md-form md-outline my-0">
                                    <input id="from" type="text" class="form-control mb-0">
                                    <label for="form">$ Min</label>
                                </div>
                                <p class="px-2 mb-0 text-muted"> - </p>
                                <div class="md-form md-outline my-0">
                                    <input id="to" type="text" class="form-control mb-0">
                                    <label for="to">$ Max</label>
                                </div>
                            </div>
                        </form>

                    </section>
                    <!-- Section: Price -->

                    <!-- Section: Price version 2 -->
                    <section class="mb-4">

                        <h6 class="font-weight-bold mb-3">Price</h6>

                        <div class="slider-price d-flex align-items-center my-4">
                            <span class="font-weight-normal small text-muted mr-2">$0</span>
                            <form class="multi-range-field w-100 mb-1">
                                <input id="multi" class="multi-range" type="range" />
                            </form>
                            <span class="font-weight-normal small text-muted ml-2">$100</span>
                        </div>

                    </section>
                    <!-- Section: Price version 2 -->



                </section>
                <!-- Section: Filters -->

            </section>
            <!-- Section: Sidebar -->
        </div>
        <div class="col-lg-9">
            <?php
                $sql = "SELECT * FROM add_books ORDER BY id ASC LIMIT $offset, $no_of_records_per_page";
                $res= mysqli_query($link,$sql);
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





<?php
include "assets/footer.php";
?>