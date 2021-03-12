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
            <form  id="contact" action="https://formspree.io/f/xknpdzaa" method="POST">

                <div class="row">
                    <div class="col">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Teljes neved*</label>
                            <input type="text" class="form-control" id="name"  required>
                            </div>
                    </div>
               
                    <div class="col">

                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail cím</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">Kisujj eskü soha senki nem látja majd az e-mail címed. Még mi sem. 🤞🏼</small>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col">

                        <div class="form-group">
                            <label for="bookrecommended">Milyen könyvet szeretnél ajánlani?</label>
                            <input type="text" class="form-control" id="book">
                        </div>
                    </div>
               
                    <div class="col">

                        <div class="form-group">
                            <label for="authername">Ki írta?</label>
                            <input type="text" class="form-control" id="auther">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="message">Üzeneted</label>
                            <textarea class="form-control" id="message" rows="3"></textarea>
                          </div>
                    </div>
                </div>
                    <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Elfogadom az <a href="https://www.websiteplanet.com/hu/blog/tegye-adatvedelmi-iranyelveit-gdpr-kompatibilisse/" target="_blank">adatvédelmi irányelveket</a>.</label>
                </div>
                <button type="submit" class="btn btn-primary" id="send">Küldés</button>
            </form>

        <div class="alert alert-success mt-3" style = "display: none; " role="alert" id="status">
            
        </div>

        </div>
    </div>
</div>




<?php
include "assets/footer.php";
?>