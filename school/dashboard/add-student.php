
<?php
require_once("config.php");
include_once("validation.php");
?>
<!DOCTYPE html>
<html>
    <head>
    <?php include_once('head.php');?>
    <title>student_data</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script> 
    </head>
  
    <body>
        <?php
            if(isset($_SESSION['validation_Error'])){?>
                <div class="Error">
                    <?php echo $_SESSION['validation_Error'];?>
                </div>
        <?php
            unset($_SESSION['validation_Error']);
            }

        ?>
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
                    <p>Dashboard</p>
                </li>
            </ul>
        </section>
                <form action="save-data.php" method="POST" id="formids">
                    <table>
                        <tr>
                            <td>
                                <input font-size: 20px; type="text"  name="Student_Name" placeholder="Student Name" 
                                value="<?php echo(isset($_SESSION['Student_Name']))? $_SESSION['Student_Name']:'';?>"/>
                            </td>
                        </tr>
                        
                            <tr>
                                <th>student class</th>
                                <th>student section</th>
                            </tr>
                            <tr>
                                <td>
                                <select name="Student_Class" id="class_id">
                                <?php
                                        $selectQuery = "SELECT * FROM `classes` where status=1";
                                        $classData = $con->query($selectQuery);
                                        if($classData->num_rows > 0) {
                                            while($classRows = $classData->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $classRows['id'];?>"><?php echo $classRows['class'];?></option>   
                                    <?php
                                }
                            }
                            ?>
                                    </select>

                                </td>
                                <td>
                                    <select name="section_name" id="section_name">
                                        <option value="">--Select Section--</option>
                                    </select>
                                </td>  
                                  
                            </tr>
                             <tr>
                                <td>
                                <input type="number"  name="Number" placeholder="Number" value="<?php echo(isset($_SESSION['Number']))? $_SESSION['Number']:'';?>"/>
                                </td>
                        </tr>
                        <tr>
                                <td>
                                <input type="text"  name="Email" placeholder="Email" value="<?php echo(isset($_SESSION['Email']))? $_SESSION['Email']:'';?>"/>
                                </td>
                        </tr>
                    </table>
                        <a ><button type="submit" name="student_submit">Save</button> </a>
                </form>
    </aside>

        
<script>
     $(document).ready(function(){
        $('#class_id').change(function(){
            classId = $(this).val();

            $.ajax({
                url: "get-class-section.php",
                type: 'GET',
                data: {'clsId': classId, 'name': 'TestName'},
                success: function(result){
                    $('#section_name').html(result);
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