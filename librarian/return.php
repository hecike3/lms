<?php
include "connection_lib.php";
$id=$_GET["id"];
$res=mysqli_query($link,"update issue_books set books_return_date=now() where id=$id");

$books_name="";
$res=mysqli_query($link,"select * from issue_books where id=$id");
while($row=mysqli_fetch_array($res)){
    $books_name=$row["books_name"];
}
mysqli_query($link,"update add_books set available_qty=available_qty+1 where book_name='$books_name'");

?>

<script type="text/javascript">
window.location="return_book.php";
</script>