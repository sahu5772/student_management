<?php
include_once('config.php');

$dataId = $_REQUEST['id'];
// print_r ($dataId);
// echo "<pre>";
// die;
if($dataId) {
    $editSql = "SELECT * FROM `country` where id=$dataId";
    $data = $con->query($editSql);
//     print_r ($data);
// echo "<pre>";
// die;
    if($data->num_rows){
        $countryRecord= $data->fetch_assoc();
        // print_r($countryRecord);
        // die;
    }else{
        $_SESSION['error']="Record not found....";
        header("Location: manage-country.php");
    }
}else{
    header("Location:  manage-country.php");
}


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
                <form action="update_country.php" method="POST" id="formids">

                    <table font-size="25px"  cellspacing="0" cellpadding="3" >
                        <input type="hidden" name="id" value="<?=$countryRecord['id']?>">
                        <tr>
                            <th>country_name</th>
                            <th>Status</th>
                           
                        </tr>    
                        <tr>
                            <td>
                                <input type="text" name="country_name" value="<?=$countryRecord['country_name']?>"/>
                            </td>
                            <td>
                            <?php
                                $status_option =(isset($countryRecord['status']))?$countryRecord['status']: '';
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
                                <th>id</th>
                                <th>state_name</th>
                                <th>state_status</th>
                                <th>Action</th> 
                                
                            </tr>
                            
                                <?php
                                                $selectQuery = "SELECT * FROM `state` WHERE country_id=$dataId";
                                                $stateData = $con->query($selectQuery);
                                                
                                                if($stateData->num_rows > 0) {
                                                    $i=1;
                                                    while($stateRows = $stateData->fetch_assoc()) {
                                            ?>
                                           
                            <tr>      
                                <td> <input type="hidden" name="state_id[]" value="<?=$stateRows['id']?>"><?= $i++?></td>          
                            <td>
                                <input type="text" name="state_name[]" value="<?=$stateRows['state_name']?>">
                            </td>
                            <td>
                            <?php
                                $status_option =(isset($stateRows['state_status']))?$stateRows['state_status']: '';
                            ?>
                            
                                <select name="state_status[]" id="">
                                    <option value="">--Select Status--</option>
                                    <option value="1" <?php echo ($status_option==='1')?'selected':'';?> >Enable</option>
                                    <option value="0" <?php echo ($status_option==='0')?'selected':'';?> >Disable</option>

                                </select>
                            </td>
                            <td><a class="delete-data" id="removerows"><span>Remove</span></a></td>
                            </tr>
                             <?php
                                     }
                                }
                            ?>  
                             
                                <td>
                                    <a id="new_rows" href="#"><button Type="button">Add</button></a>
                                </td>
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
        var rowNo = '<tr> <input type="hidden" name="state_id[]" ><td><input type="text" name="state_name[]"> <td><?php
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