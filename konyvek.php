<?php
include "assets/header.php";
include "connection.php";


$all_kiado=$link->query("SELECT  publicator_name FROM `add_books`  GROUP BY publicator_name");
$all_iro=$link->query("SELECT  author_name FROM `add_books` GROUP BY author_name");
$all_kategoria=$link->query("SELECT  category FROM `add_books`  GROUP BY category");

// Filter query
$sql= "SELECT distinct id FROM `add_books` ";
if(isset($_GET['publicator_name']) && $_GET['publicator_name']!="") :
    $kiado = $_GET['publicator_name'];
    $sql.=" AND publicator_name IN ('".implode("','",$kiado)."')";
endif;

if(isset($_GET['author_name']) && $_GET['author_name']!="") :
    $iro = $_GET['author_name'];
    $sql.=" AND author_name IN ('".implode("','",$iro)."')";
endif;

if(isset($_GET['category']) && $_GET['category']!="") :
    $kategoria = $_GET['category'];
    $sql.=" AND category IN (".implode(',',$kategoria).")";
endif;


$minden_konyv=$link->query($sql);
$content_per_page = 3;
$rowcount=mysqli_num_rows($minden_konyv);
$total_data = ceil($rowcount / $content_per_page);
function data_clean($str)
{
    return str_replace(' ','_',$str);
}

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


<!-- Pagenation -->

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


<!-- ///Pagenation -->


<div class="container">
<form method="get" id="search_form">
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
                                    <h6 class="title">Író</h6>
                                </header>
                                <div class="filter-content">
                                    <div class="card-body">
                                    <ul class="list-group">
                                            <?php foreach ($all_iro as $key => $new_iro) :
                                                if(isset($_GET['iro'])) :
                                                    if(in_array(data_clean($new_iro['author_name']),$_GET['author_name'])) : 
                                                        $check='checked="checked"';
                                                    else : $check="";
                                                    endif;
                                                endif;
                                            ?>
                                                <li class="list-group-item">
                                                    <div class="checkbox"><label> <input type="checkbox" class="szokoz" value="<?=data_clean($new_iro['author_name']);?>" <?=@$check?> name="author_name[]" > <?=ucfirst($new_iro['author_name']); ?></label></div>
                                                </li>
                                            <?php endforeach; ?>
                                            </ul>
                                    </div>

                                </div>
                            </article>

                            <article class="card-group-item">
                                <header class="card-header">
                                    <h6 class="title">Kiadó</h6>
                                </header>
                                <div class="filter-content">
                                    <div class="card-body">
                                                <ul class="list-group">
                                            <?php foreach ($all_kiado as $key => $new_kiado) :
                                                if(isset($_GET['kiado'])) :
                                                    if(in_array(data_clean($new_kiado['publicator_name']),$_GET['publicator_name'])) : 
                                                        $check='checked="checked"';
                                                    else : $check="";
                                                    endif;
                                                endif;
                                            ?>
                                                <li class="list-group-item">
                                                    <div class="checkbox"><label><input type="checkbox" class="szokoz" value="<?=data_clean($new_kiado['publicator_name']);?>" <?=@$check?> name="publicator_name[]" > <?=ucfirst($new_kiado['publicator_name']); ?></label></div>
                                                </li>
                                            <?php endforeach; ?>
                                            </ul>
                                    </div>

                                </div>
                            </article>


                            <article class="card-group-item">
                                <header class="card-header">
                                    <h6 class="title">Kategória </h6>
                                </header>
                                <div class="filter-content">
                                    <div class="card-body">
                                    <ul class="list-group">
                                            <?php foreach ($all_kategoria as $key => $new_kategoria) :
                                                if(isset($_GET['kategoria'])) :
                                                    if(in_array(data_clean($new_kategoria['category']),$_GET['category'])) : 
                                                        $check='checked="checked"';
                                                    else : $check="";
                                                    endif;
                                                endif;
                                            ?>
                                                <li class="list-group-item">
                                                    <div class="checkbox"><label><input type="checkbox" class="szokoz" value="<?=data_clean($new_kategoria['category']);?>" <?=@$check?> name="category[]" > <?=ucfirst($new_kategoria['category']); ?></label></div>
                                                </li>
                                            <?php endforeach; ?>
                                            </ul>
                                    
                                </div>
                            </article>
                        </div>


                    </section>
                    <!-- Section: Sidebar -->
        </div>
        <section class="col-lg-9 col-md-8">
            <div class="row">
                <div id="results"></div>
            </div>
        </section>

    </div>
</form>
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

<script src="assets/js/script.js"></script>


<script type="text/javascript">

$(document).ready(function() {
    var total_record = 0;
    var iro=check_box_values('author_name'); //brand
    var kiado=check_box_values('publicator_name'); //material
    var kategoria=check_box_values('category'); //size
    var total_groups = <?php echo $total_data; ?>;
    $('#results').load("autoload.php?author_name="+iro+"&publicator_name="+kategoria+"&category="+kategoria,  function() {
        total_record++;
    });
    $(window).scroll(function() {       
        if($(window).scrollTop() + $(window).height() == $(document).height())  
          
        {    
            if(total_record <= total_groups)
            {
                loading = true;
                $('.loader').show();
                $.get("autoload.php?group_no="+total_record+"&author_name="+iro+"&publicator_name="+kiado+"&category="+kategoria,
                function(data){ 
                if (data != "") {                               
                    $("#results").append(data);
                    $('.loader').hide();                  
                    total_record++;
                }
                });     
            }
                // total_record ++;
        }
    });
    function check_box_values(check_box_class){
        var values = new Array();
            $("."+check_box_class+":checked").each(function() {
               values.push($(this).val());
            });
        return values;
    }
    $('.sort_rang').change(function(){
        $("#search_form").submit();
        return false;
    });
});



</script>


<?php
include "assets/footer.php";
?>