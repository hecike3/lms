<?php
include "connection_lib.php";
$id=$_POST["id"];
mysqli_query($link,"DELETE FROM add_books WHERE id=$id");


?>
