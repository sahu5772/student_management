<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>student_data</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script> 
    </head>
    <body>
        <?php
        include("menu.php");
        ?>
        <h1>Add student data</h1>

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
            <table font-size: 29px; border="1" cellspacing="0" cellpadding="3" width="400">
               
                <tr>
                        <td>
                            <input font-size: 20px; type="text"  name="Student_Name" placeholder="Student Name" 
                        value="<?php echo(isset($_SESSION['Student_Name']))? $_SESSION['Student_Name']:'';?>"/>
                        </td>
                <tr>

                <tr>
                    
                    <td>
                       <select name="Student_Class" id="">
                       <?php
                            $selectQuery = "SELECT * FROM `classes` where status=1";
                            $classData = $con->query($selectQuery);
                            if($classData->num_rows > 0) {
                                while($classRows = $classData->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $classRows['class'];?>"><?php echo $classRows['class'];?></option>   
                        <?php
                    }
                }
                ?>
                       
                       </select>
                       </td>
                <tr>
                <tr>
                        <td>
                            <input type="number"  name="Number" placeholder="Number"  
                        value="<?php echo(isset($_SESSION['Number']))? $_SESSION['Number']:'';?>"/>
                        </td>
                <tr>
                <tr>
                        <td>
                            <input type="text"  name="Email" placeholder="Email"
                        value="<?php echo(isset($_SESSION['Email']))? $_SESSION['Email']:'';?>"/>
                        </td>
                <tr>
                <tr>
                    <th><a ><button type="submit" name="student_submit">Save</button></th></a>
                </tr>
            </table>
        </form>
        <?php
//     $add_name =0;
//     $add_class =0;
//     $add_Number =0;
//     $add_email =0;


//         if(isset($_REQUEST["submit"])){
//             $add_name = $_REQUEST["Student_Name"];
//             $add_class = $_REQUEST["Student_Class"];
//             $add_number= $_REQUEST["Number"];
//             $add_email= $_REQUEST["Email"];


//                   $set_value = " INSERT INTO `students`(Student_Name,Student_Class,`Number`,Email) values ('$add_name','$add_class','$add_number','$add_email')";
//                    $con->query($set_value);
//                    header("Location:student.php");
//         }
//         ?>
               <script>

// $(document).ready(function(){
//         $("#formids").validate({
//             rules:{
//                 'Student_Name'     : 'required',
//                 'Number'     : 'required',
//                 'Email'     : 'required'
//             },
//             messages:{
//                 'Student_Name'     : 'class Name is required...',
//                 'Number'     : 'Number is required...',
//                 'Email'     : 'Email is required...'
//             }
//         });
//     });
   




// </script>
    </body>
</html>