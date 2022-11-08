<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Student Data</title>
    </head>
    <body>
    <?php
        include("menu.php");
        ?>
        <h2>student data</h2>
        <table border= "1px" cellspacing="0" cellpadding = "3" width ="700">
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Father Name</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Email</th>
                </tr>
            <?php
                $get_Query = "SELECT * FROM `students`";
                $get_data = $con->query($get_Query);
    
                    while($getRows = $get_data->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $getRows['id'];?></td>
                            <td><?php echo $getRows['firstname'];?></td>
                            <td><?php echo $getRows['lastname'];?></td>
                            <td><?php echo $getRows['fathername'];?></td>
                            <td><?php echo $getRows['age'];?></td>
                            <td><?php echo $getRows['city'];?></td>
                            <td><?php echo $getRows['email'];?></td>
                        </tr>
                        <?php    
                    }
                    // $set_value = "INSERT INTO `students`(firstname,lastname,fathername,age,city,email) values ('rahul','choudhary','pawan',27,'jaipur','rahul@gmail.com')";
                    // $get_value = $con->query($set_value);
              
                ?>
        </table>
    </body>
</html>