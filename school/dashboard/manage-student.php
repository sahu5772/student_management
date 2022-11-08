<?php
include_once("config.php");
include_once('validation.php');

$selectQuery = "SELECT * FROM `students`";
$classData = $con->query($selectQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <?php include_once('head.php');?>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" >
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

   
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
                            <p>Manage student</p>
                        </li>
                        <li class="us-box">
                            <p><a class="ac" href="add-student.php">Add student</a></p>
                        </li> 
                    </ul>
                </section>
                <section class="second-header">
                    <ul class="search-dt">
                    <li>
                            <form action="" method="post" class="srch-form">
                                <input type="text" placeholder="search" name="search-data">
                                <button class="srch-btn" name="submit">search</button>
                            </form>
                        </li>
                        <div class="contain">
                            <table >
                          
                                 <?php
                                
                                 ?>       
                            </table>
                        </div>  
                    </ul>
                </section>
               
                <section class="table">


                <table class="student_table" id="stud">
                <thead>
                <tr class="background-1">
                        <th>ID</th>
                        <th>student name</th>
                        <th>student class</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>   
                </thead>  
                <?php
                 if(isset($_POST['submit'])){
                    $search=$_POST['search-data'];

                    $sql=" SELECT * from `students` where Student_Name='$search' or id='$search'";
                    $result=$con->query($sql);
                    if($result){
                    if($result->num_rows> 0) {
                        $i=1;
                        while($studentRows = $result->fetch_assoc()) {
                            ?>
                           
                               
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $studentRows['Student_Name'];?></td>
                                    <td><?php echo $studentRows['Student_Class'];?></td>
                                    <td><?php echo $studentRows['Number'];?></td>
                                    <td><?php echo $studentRows['Email'];?></td>
                                    <td>
                                    <a class="edit-data" href="#"><span>Edit</span></a>
                                        <a href="#"><span>Delete</span></a>
                                    </td>
        
                                </tr>
                        
                            <?php
                        }
                    }    

                    }
                }
                else{
                    if($classData->num_rows > 0) {
                    $i=1;
                    while($studentRows = $classData->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $studentRows['Student_Name'];?></td>
                            <td><?php echo $studentRows['Student_Class'];?></td>
                            <td><?php echo $studentRows['Number'];?></td>
                            <td><?php echo $studentRows['Email'];?></td>
                            <td>
                               <a class="edit-data" href="#"><span>Edit</span></a>
                                <a href="#"><span>Delete</span></a>
                            </td>

                        </tr>
                        <?php
                    }
                }   
                }
                ?>
                </table>
            </aside>
		</div>	
	</section>
    <script>
jQuery(document).ready(function(){
    jQuery("#stud").DataTable();
});
</script>
</body>



</html>









































