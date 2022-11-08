<?php
include_once('config.php');
?>
<!DOCTYPE html>
<html>
    <head>
    <?php include_once('head.php');?>
    <?php
        ?>
        <h1>Add Class</h1>
        <?php
            if(isset($_SESSION['validation_Error'])){?>
                <div class="Error">
                    <?php echo $_SESSION['validation_Error'];?>
                </div>
        <?php
            unset($_SESSION['validation_Error']);
            }

        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script> 
        
        
<style>


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
                            <p>Add Country</p>
                        </li>
                    </ul>
                </section>
                <section class="table">
                <form action="all-save-data.php" method="POST" id="formids">
                    <table font-size="25px"  cellspacing="0" cellpadding="3" >
                        <tr>
                            <th>country_name</th>
                            <th>Status</th>
                           
                        </tr>    
                        <tr>
                            <td>
                                <input type="text" name="country_name" value="<?php echo(isset($_SESSION['country_name']))? $_SESSION['country_name']:'';?>"/>
                            </td>
                            <td>
                            <?php
                                $status_option =(isset($_SESSION['status']))?$_SESSION['status']: '';
                            ?>
                                <select name="status" id="">
                                    <option value="">--Select Status--</option>
                                    <option value="1" <?php echo ($status_option==='1')?'selected':'';?> >Enable</option>
                                    <option value="0" <?php echo ($status_option==='0')?'selected':'';?> >Disable</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                           <table id="tabletbody" font-size="25px" cellspacing="0" cellpadding="3" >
                            <tr>
                                <th>state_name</th>
                                <th>Action</th> 
                                
                            </tr>
                            <tr>
                            <td>
                                <input type="text" name="state_name[]">
                            </td>
                            <td>
                            <?php
                                $status_option =(isset($_SESSION['state_status']))?$_SESSION['state_status']: '';
                            ?>
                                <select name="state_status[]" id="">
                                    <option value="">--Select Status--</option>
                                    <option value="1" <?php echo ($status_option==='1')?'selected':'';?> >Enable</option>
                                    <option value="0" <?php echo ($status_option==='0')?'selected':'';?> >Disable</option>

                                </select>
                            </td>
                                <td>
                                    <a id="new_rows" href="#"><button Type="button">Add</button></a>
                                </td>
                            </tr>
                                    
                           </table>   
                        </tr>
                    </table>
                    <a class="save-1"><button class="save" type="submit" name="submit_country">Save</button></a>
                 </form>

                </section>
            </aside>
		</div>	
	</section>
<script>




$(document).ready(function(){
    $('#new_rows').click(function(){
        var rowNo = '<tr><td><input type="text" name="state_name[]"> <td><?php
                                $status_option =(isset($_SESSION['status']))?$_SESSION['status']: '';
                            ?><select name="state_status[]" id=""><option value="">--Select Status--</option> <option value="1" <?php echo ($status_option==='1')?'selected':'';?> >Enable</option> <option value="0" <?php echo ($status_option==='0')?'selected':'';?> >Disable</option> </select></td></td><td> <input type="button" id="removerows" value="Remove"/> </td> </tr>';
        $('#tabletbody').append(rowNo);
    });

    $('body').delegate("#removerows", "click", function(){
        $(this).closest('tr').remove();
    });

});

</script>




</body>
</html>    