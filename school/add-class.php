<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>student-data</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script> 

    </head>
    <body>
        <?php
        include("menu.php");
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

        <form action="save-data.php" method="POST" id="formids">
            <table font-size="25px" border="1" cellspacing="0" cellpadding="3" width="400">
                <tr>
                <tr>
                    <th>Class</th>
                    <td>
                      <input type="text" name="class" value="<?php echo(isset($_SESSION['class']))? $_SESSION['class']:'';?>"/>
                    </td>
                <tr>
                    <td>Status</td>
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

                <tr>
                    <th><a href="menu.php" ><button type="submit" name="class_submit">Save</button></th></a>
                </tr>
            </table>
        </form>
        <?php
 
    // $add_class =0;
    // $add_status=0;
 
        
        // if(isset($_REQUEST["submit"])){
        //       $add_class = $_REQUEST["class"];
        //       $add_status = $_REQUEST["status"];


        //           $set_value = "INSERT INTO `classes`(`class`,`status`) values ('$add_class','$add_status')";
        //            $con->query($set_value);
        //           header("Location:class.php");
        // }
        ?>
        <!-- <script>

$(document).ready(function(){
        $("#formids").validate({
            rules:{
                'class'     : 'required'
                
            },
            messages:{
                'class'     : 'class Name is required...',
               
            }
        });
    });
   
</script> -->

    </body>
</html>
<?php
       session_destroy();
