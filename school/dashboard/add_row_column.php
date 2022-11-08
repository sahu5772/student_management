<?php
require_once("config.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once('head.php');?>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>/ -->
        <title>student-data</title>
        <style>
            #tabletry td{
                height:25px;
        
            }
            #tabletry{
                border:1px;
            }
       

        </style>
    </head>
    <body>
    <section class="group-1">
		<div class="side">
			<?php
        include_once('navigation.php');
      ?>

			<aside class="right">
               <?php
                  include_once('top-header.php');
               ?>
                <section class="second-header">
                    <ul class="search">
                        <li class="notify">
                            <p>student_data</p>
                        </li>

                    </ul>
                </section>
                <button type="button" id="add_row">Add Row</button>
                <button type="button" id="add_column" >Add Column</button>
                <button type="button" id="add_row_column" >Add Row/Column</button>
                <button type="button" id="remove_row">Remove Row</button>
                <button type="button" id="remove_column" >Remove Column</button>
                <table id="table" border="1" cellpadding="0" cellspacing="0">
                    <tbody>
        
                    </tbody>
                </table>


</body>
<script>
jQuery(document).ready(function(){
    jQuery("#add_row").click(function(){
        if(jQuery("#table tr").length) {
            var rowHtml = jQuery("#table tr:first-child").clone();
            rowHtml.find('input[type="text"]').val("");
            jQuery("#table tbody").append(rowHtml);
        } else {
            var rowHtml = "<tr><td><input type='text' /></td></tr>";
            jQuery("#table tbody").append(rowHtml);
        }
        
    });
    jQuery("#add_column").click(function(){
        if(jQuery("#table tr").length) {
            var columnHtml = "<td><input type='text' /></td>";
            jQuery("#table tbody tr").append(columnHtml);
            // $('table > tbody  > tr').each(function(index, tr) { 
            //     var columnHtml = "<td></td>";
            //     jQuery(this).append(columnHtml);
            // });
        } else {
            var rowHtml = "<tr><td><input type='text' /></td></tr>";
            jQuery("#table tbody").append(rowHtml);
        }
    });

    jQuery("#add_row_column").click(function(){

        var rowHtml = jQuery("#table tr:first-child").clone();
        jQuery("#table tbody").append(rowHtml);

        var columnHtml = "<td></td>";
        jQuery("#table tbody tr").append(columnHtml);
    });

    jQuery("#remove_row").click(function(){
        jQuery("#table tbody tr:last-child").remove();
    });

    jQuery("#remove_column").click(function(){
        jQuery("#table tbody tr td:last-child").remove();
        if(!jQuery("#table tbody tr:first-child td").length) {
            jQuery("#table tbody tr").remove();
        }
    });

});
</script>
</html>







