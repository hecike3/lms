<?php
include "connection_lib.php";
$id=$_GET["id"];

mysqli_query($link,"update student_registration set status='yes' where id=$id");

?>

<script type="text/javascript">
    alert("A diák el lett fogadva!");
    window.location="display_student_info.php";

</script>