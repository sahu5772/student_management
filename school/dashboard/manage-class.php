<?php
include_once("config.php");
include_once('validation.php');

$clsRecCount = $con->query("SELECT count(*) as total FROM `classes`");
$fetchData = $clsRecCount->fetch_assoc();
$totalRow=$fetchData['total'];
// echo "<pre>";
// print_r($totalRow);
// die;
$pageLimit = 5;

$pageCount=ceil($totalRow/$pageLimit);
if(isset($_REQUEST['page'])){
    $pageNo =$_REQUEST['page'];
    // echo"<pre>";
    // print_r($pageNo);
    // die;
}else{
    $pageNo =1;
}

$offSet=($pageNo-1)*$pageLimit;


$selectQuery = "SELECT cls.*, count(sec.section_name) FROM `classes` as cls LEFT JOIN  `manage_section` as sec ON cls.id=sec.class_id group by id limit $offSet, $pageLimit";
// "SELECT cls.*, count(sec.section_name) FROM `manage_section` as 
// sec, `classes` as cls  where cls.id=sec.class_id group by class_id";
$classData = $con->query($selectQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <?php include_once('head.php');?>

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
                            <p>Manage class</p>
                        </li>
                    <li class="us-box">
                        <p><a class="ac" href="add-class-1.php">Add Class</a></p>
                    </li>    
                    </ul>
                </section>
                <table>
                    <tr class="background-1">
                        <th>ID</th>
                        <th>Class Name</th>
                        <th>Status</th>
                        <th>section(count)</th>
                        <th>Action</th>
  
                    </tr>                

                    <?php
                        if($classData->num_rows > 0) {
                            $i=$offSet+1;
                            while($classRows = $classData->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $classRows['class'];?></td>
                                    <td><?php echo ($classRows['status']==1)?"Enable":"Disable"; ?></td>
                                    <td><?php echo $classRows['count(sec.section_name)'];?></td>
                                    <td>
                                        <a class="edit-data" href="editClass-data.php?id=<?php echo $classRows['id'];?>"><span>Edit</span></a>
                                        <a class="delete-data" href="deleteClass-data.php?id=<?php echo $classRows['id'];?>"><span>Delete</span></a>
                                    </td>
            
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
                    <div class="page">
                    
                <?php
                if($pageNo>1){
                    echo '<a href="manage_class.php?page='.($pageNo-1).'">Pre</a>';
                }
                    for($i=1; $i<=$pageCount; $i++){
                        if($i==$pageNo){
                            $active="active";
                        }else{
                            $active="";
                        }
                        ?>
                        <a class="<?=$active?>"href="?page=<?= $i?>"><?= $i?></a>&nbsp;<?php  
                    }
                if($pageCount>$pageNo){
                    echo '<a href="manage_class.php?page='.($pageNo+1).'">Next</a>';
                }
                ?>
                </div>
            </aside>
		</div>	
	</section>
</body>
</html>