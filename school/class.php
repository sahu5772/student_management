<?php
require_once("config.php");
include("menu.php");
session_start();
?>
   
<!DOCTYPE html>
<html>
    <head>
        <title>student-data</title>
    </head>
    <style>
.add {
  font-size: 20px;
}
.ac {
  margin-left: 300px;
  text-decoration: none;
  padding: 6px 10px;
  background: #ccc;
  border-radius: 17px;
  color: #000;
}
.tb {
  margin-top: 10px;
}
.ac:hover{
    background: #7ec8c8;
}
    </style>
    <body>
        <h1>Class</h1>
        <form action="" method="POST" class="add">

        <a class="ac" href="add-class.php">Add Class</a>
        <?php if(isset($_SESSION['success'])) {?>
            <div class="success">
                <?php echo $_SESSION['success'];?>
            </div>
        <?php 
        unset($_SESSION['success']);
        } ?>

            <table class="tb" border="1" cellspacing="0" cellpadding="3" width="400">
                
                <tr>
                        <th>ID</th>
                        <th>Class</th>
                        <th>Status</th>
                </tr>
                
                <?php
                $selectQuery = "SELECT * FROM `classes`";
                $classData = $con->query($selectQuery);
                if($classData->num_rows > 0) {
                    while($classRows = $classData->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $classRows['id'];?></td>
                            <td><?php echo $classRows['class'];?></td>
                            <td><?php echo ($classRows['status']==1)?"Enable":"Disable"; ?></td>
                        </tr>
                        <?php
                    }
                }else {
                    ?>
                        <tr align="center">
                            <td colspan="3">No data found...</td>
                        </tr>
                    <?php
                }
                ?>

            </table>
        </form>
    </body>
</html>