<?php
require_once("config.php");
include("menu.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>student-data</title>
        <style>
            .add {
  font-size: 20px;
}
.ac {
  margin-left: 462px;
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
    </head>
    <body>
        <h1>Class</h1>

        <?php 
            if(isset($_SESSION['success'])) {?>
                <div class="success">
                    <?php echo $_SESSION['success'];?>
                </div>
        <?php 
            unset($_SESSION['success']);
        } 
        ?>
        <form class="add" action="" method="POST">
            <table class="tb" border="1" cellspacing="0" cellpadding="3" width="400">
                <a class= "ac" href="add-student.php">Add Student</a>
                <tr>
                        <th>ID</th>
                        <th>Student_Name</th>
                        <th>Student_Class</th>
                        <th>Number</th>
                        <th>Email</th>
                        
                <tr>
                <?php
                $selectQuery = "SELECT * FROM `students`";
                $classData = $con->query($selectQuery);
                if($classData->num_rows > 0) {
                    while($studentRows = $classData->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $studentRows['id'];?></td>
                            <td><?php echo $studentRows['Student_Name'];?></td>
                            <td><?php echo $studentRows['Student_Class'];?></td>
                            <td><?php echo $studentRows['Number'];?></td>
                            <td><?php echo $studentRows['Email'];?></td>

                        </tr>
                        <?php
                    }
                }    
                ?>

            </table>
        </form>
    </body>
</html>