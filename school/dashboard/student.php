<?php
require_once("config.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>student-data</title>
        <?php include_once('head.php');?>
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


       
         <section class="group-1">
		<div class="side">
			<?php
        include_once('navigation.php');
      ?>
<?php
if(isset($_SESSION['success'])) {?>
    <div class="success">
        <?php echo $_SESSION['success'];?>
    </div>
<?php 
unset($_SESSION['success']);
} 
?>
			<aside class="right">
               <?php
                  include_once('top-header.php');
               ?>
                <section class="second-header">
                    <ul class="search">   
                        <li class="us-box"> 
                            <p> <a class= "ac" href="add-student.php">Add Student</a></p>
                        </li>
                    </ul>
                </section>
        <form class="add" action="" method="POST">
            <table class="tb" border="1" cellspacing="0" cellpadding="3" width="400">
                
                <tr>
                        <th>ID</th>
                        <th>Student_Name</th>
                        <th>Student_Class</th>
                        <th>Number</th>
                        <th>Email</th>
                        
                </tr>
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
                </tr>
            </table>
        </form>
    </body>
</html>