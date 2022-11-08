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
                            <p>Add City</p>
                        </li>
                    </ul>
                </section>
                <section class="table">
                <form action="all-save-data.php" method="POST" id="formids">
                    <table font-size="25px"  cellspacing="0" cellpadding="3" >
                        <tr>
                            <th>country_name</th>
                            <th>state_name</th>
                            <th>city_name</th>
                            <th>Status</th>
                           
                        </tr>    
                        <tr>
                        <td>
                                        <select name="country_id" id="country_id">
                                        <option value="">--Select country--</option>
                                        <?php
                                                $selectQuery = "SELECT * FROM `country`";
                                                $countryData = $con->query($selectQuery);
                                                if($countryData->num_rows > 0) {
                                                    while($countryRows = $countryData->fetch_assoc()) {
                                            ?>
                                                <option value="<?php echo $countryRows['id'];?>"><?php echo $countryRows['country_name'];?></option>   
                                            <?php
                                        }
                                    }
                                    ?>
                                            </select>

                            </td>
                            <td>
                                    <select name="state_name" id="state_id">
                                        <option value="">--Select state--</option>
                                    </select>
                                </td>  
                            <td>
                                <input type="text" name="city_name" value="<?php echo(isset($_SESSION['city_name']))? $_SESSION['city_name']:'';?>"/>
                            </td>
                            <td>
                            <?php
                                $status_option =(isset($_SESSION['city_status']))?$_SESSION['city_status']: '';
                            ?>
                                <select name="city_status" id="">
                                    <option value="">--Select Status--</option>
                                    <option value="1" <?php echo ($status_option==='1')?'selected':'';?> >Enable</option>
                                    <option value="0" <?php echo ($status_option==='0')?'selected':'';?> >Disable</option>

                                </select>
                            </td>
                        </tr>
                        
                    </table>
                    <a class="save-1"><button class="save" type="submit" name="submit_city">Save</button></a>
                 </form>

                </section>
            </aside>
		</div>	
	</section>
<script>
     $(document).ready(function(){
        $('#country_id').change(function(){
            countryId = $(this).val();

            $.ajax({
                url: "get-country-state.php",
                type: 'GET',
                data: {'cunId': countryId},
                success: function(result){
                    $('#state_id').html(result);
                },
                error: function(err){
                    alert("Error...");
                }
            });

        });
    });

</script>
</body>
</html>    