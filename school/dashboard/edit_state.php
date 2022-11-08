<?php
include_once('config.php');

$dataId = $_REQUEST['id'];
// print_r ($dataId);
// echo "<pre>";
// die;
if($dataId) {
    $editSql = "SELECT * FROM `state` where id=$dataId";
    $data = $con->query($editSql);
//     print_r ($data);
// echo "<pre>";
// die;
    if($data->num_rows){
        $stateRecord= $data->fetch_assoc();
        
        $cunId=$stateRecord['country_id'];
        //  print_r($cunId);
        // die;
    }else{
        $_SESSION['error']="Record not found....";
        header("Location: manage-state.php");
    }
}else{
    header("Location:  manage-state.php");
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
                            <p>Add state</p>
                        </li>
                    </ul>
                </section>
                <section class="table">
                <form action="update_state.php" method="POST" id="formids">

                    <table font-size="25px"  cellspacing="0" cellpadding="3" >
                        <input type="hidden" name="id" value="<?=$stateRecord['id']?>">
                        <tr>
                            <th>country_name</th>
                            <th>state_name</th>
                            <th>Status</th>
                           
                        </tr>    
                        <tr>
                        <td>
                                        <select name="country_id" id="country_name" >
                                        <option value="">--Select Country--</option>
                                        <?php
                                                 
                                                $selectQuery = "SELECT * FROM `country` ";
                                               
                                                $countryData = $con->query($selectQuery);
                                                if($countryData->num_rows > 0) {
                                                    
                                                    while($countryRows = $countryData->fetch_assoc()) {
                                            ?>
                                                
                                                <option value="<?php echo $countryRows['id'];?>" <?= ($countryRows['id']==$cunId)?'selected':'';?> ><?php echo $countryRows['country_name'];?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                            </select>

                            </td>
                            <td>
                                <input type="text" name="state_name" value="<?=$stateRecord['state_name']?>"/>
                            </td>
                            <td>
                            <?php
                                $status_option =(isset($stateRecord['state_status']))?$stateRecord['state_status']: '';
                            ?>
                                <select name="state_status" id="">
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
                                <th>city_name</th>
                                <th>city_status</th>
                                <th>Action</th> 
                                
                            </tr>
                            
                                <?php
                                   
                                                $selectQuery = "SELECT * FROM `city` WHERE state_id=$dataId";
                                                $cityData = $con->query($selectQuery);                                                
                                                if($cityData->num_rows > 0) {
                                                    $i=1;
                                                    while($cityRows = $cityData->fetch_assoc()) {
                                            ?>
                                           
                            <tr>      
                                <td> <input type="hidden" name="city_id[]" value="<?=$cityRows['id']?>"><?= $i++?></td>          
                            <td>
                                <input type="text" name="city_name[]" value="<?=$cityRows['city_name']?>">
                            </td>
                            <td>
                            <?php
                                $status_option =(isset($cityRows['city_status']))?$cityRows['city_status']: '';
                            ?>
                            
                                <select name="city_status[]" id="">
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
                    <a class="save-1"><button class="save" type="submit" name="submit_state">Save</button></a>
                 </form>

                </section>
            </aside>
		</div>	
	</section>
<script>




$(document).ready(function(){
    $('#new_rows').click(function(){
        var rowNo = '<tr> <input type="hidden" name="city_id[]" ><td><input type="text" name="city_name[]"> <td><?php
                                $status_option =(isset($_SESSION['status']))?$_SESSION['status']: '';
                            ?><select name="city_status[]" id=""><option value="">--Select Status--</option> <option value="1" <?php echo ($status_option==='1')?'selected':'';?> >Enable</option> <option value="0" <?php echo ($status_option==='0')?'selected':'';?> >Disable</option> </select></td></td><td> <input type="button" id="removerows" value="Remove"/> </td> </tr>';
        $('#tabletbody').append(rowNo);
    });

    $('body').delegate("#removerows", "click", function(){
        $(this).closest('tr').remove();
    });
   
                
        
        
});

</script>




</body>
</html>    