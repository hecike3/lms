<?php
 session_start();
 include "header.php";
 
 ?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kikölcsönzött könyvek</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        
                        <form name="form1" action="" method="post">
                        
                            <table>
                            <tr>
                                <td>
                                    <select class="form-control selectpicker">
                                        <option >A</option>
                                        <option >B</option>
                                    </select>
                            
                                </td>
                                <td>
                                    <input type="submit" value="Keresés" name="submit1" class="form-control btn btn-default">
                                </td>
                            </tr>
                            </table>
                                                
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->



<?php
 
 include "footer.php";
 
 ?>           