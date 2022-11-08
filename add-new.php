<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Class List</title>
    </head>
    <body>
        <?php
        include("menu.php");
        ?>
        <h1>Add New student</h1>
        <form action="" method="POST">
            <table border="1" cellspacing="0" cellpadding="3" width="400">
                <tr>
                <tr>
                        <th>First Name</th>
                        <td><input type="text" name="firstname" /></td>
                        <th>Last Name</th>
                        <td><input type="text" name="lastname" /></td>
                        <th>Father Name</th>
                        <td><input type="text" name="fathername" /></td>
                        <th>Age</th>
                        <td><input type="text" name="age" /></td>
                        <th>City</th>
                        <td><input type="text" name="city" /></td>
                        <th>Email</th>
                        <td><input type="text" name="email" /></td>
                </tr>
                <tr>

                <tr>
                    <th><button type="submit" name="submit">Save</button></th>
                </tr>
            </table>
        </form>
        <?php
    $first_name =0;
    $last_name=0;
    $father_name=0;
    $add_age=0;
    $add_city=0;
    $add_email=0;
        if(isset($_REQUEST["submit"])){
              $first_name = $_REQUEST["firstname"];
              $last_name = $_REQUEST['lastname'];
              $father_name = $_REQUEST['fathername'];
              $add_age = $_REQUEST['age'];
              $add_city = $_REQUEST['city'];
              $add_email = $_REQUEST['email'];

                  $set_value = "INSERT INTO `students`(firstname,lastname,fathername,age,city,email) values ('$first_name','$last_name','$father_name',$add_age,'$add_city','$add_email')";
                   $con->query($set_value);
                   header("Location:connect.php");
        }
        ?>
    </body>
</html>