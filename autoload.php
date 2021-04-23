<?php
include("config.php");
$content_per_page = 3;	
$group_no  = strtolower(trim(str_replace("/","",$_REQUEST['group_no'])));
$start = ceil($group_no * $content_per_page);
$sql= "SELECT distinct * FROM `add_books`";
    if(isset($_REQUEST['author_name']) && $_REQUEST['author_name']!="") :
		$iro = explode(',',url_clean($_REQUEST['author_name']));	
	    $sql.=" AND author_name IN ('".implode("','",$author_name)."')";
        print_r($sql);
	endif;

    if(isset($_GET['publicator_name']) && $_GET['publicator_name']!="") :
		$kiado = explode(',',url_clean($_REQUEST['publicator_name']));	
        $sql.=" AND publicator_name IN ('".implode("','",$kiado)."')";
    endif;

    if(isset($_GET['category']) && $_GET['category']!="") :
		$kategoria = explode(',',$_REQUEST['category']);	
        $sql.=" AND category IN (".implode(',',$kategoria).")";
    endif;
	$sql.=" LIMIT $start, $content_per_page";
	$all_product=$db->query($sql);
    $rowcount=mysqli_num_rows($all_product);
	// echo $sql; exit;

    function url_clean($String)
    {
    	return str_replace('_',' ',$String); 
    }
?>

<!-- listing -->
        <?php if(isset($all_product) && count($all_product) && $rowcount > 0) : $i = 0; ?>
            <?php foreach ($all_product as $key => $products) : ?>
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
            <?php $i++; endforeach; ?> 
        <?php endif; ?>
                                
<!-- /.listing -->