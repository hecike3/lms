<?php
include "assets/header.php";
include "connection.php";
?>
<script src="assets/js/contacthandler.js"></script>
<!--- Kapcsolat szöveg  -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Kapcsolat</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form id="my-form" action="https://formspree.io/f/xknpdzaa" method="POST">
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <div class="form-group mb-2">
                                <label>Név:</label>
                                <input type="text" name="name" class="form-control" />

                            </div>


                        </div>
                    </div>
                    <div class="col">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp" />
                        <small id="emailHelp" class="form-text text-muted">Ígérjük hogy nem mondjuk el senkinek
                            🥐</small>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <div class="form-group mb-2">
                                <label>Könyv:</label>
                                <input type="text" name="konyv" class="form-control" />

                            </div>


                        </div>
                    </div>
                    <div class="col">
                        <label for="szerzo">Szerző:</label>
                        <input type="text" name="szerzo" class="form-control" />
                        
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="uzenet">Üzenet</label>
                            <textarea class="form-control"  name="uzenet" rows="3"></textarea>
                          </div>
                    </div>
                </div>

                <button id="my-form-button" class="btn btn-success" >Küldés</button>
            </form>
            <div class="alert mt-3" style="display: none;" role="alert" id="status">

            </div>

        </div>
    </div>
</div>




<?php
include "assets/footer.php";
?>