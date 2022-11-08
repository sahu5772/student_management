<?php
include_once("config.php");
include_once("validation.php");
$clsRecCount = $con->query("SELECT count(*) as total FROM `manage_section`");
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
// echo "<pre>";
// print_r($offSet);
// die;

// $selectQuery ="SELECT * FROM `manage_section`";
// $sectionData = $con->query($selectQuery);

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
                            <p>Manage Section</p>
                        </li>
                        <li class="us-box">
                            <p><a class= "ac" href="add_section.php">Add Section</a></p>
                        </li>
                    </ul>
                </section>
                <table >
                    <tr class="background-1">
                        <th>ID</th>
                        <th>class_name</th>
                        <th>section_count</th>
                    </tr>
                    <tr>
                <?php
                $selectQuery = "SELECT sec.*, cls.class FROM `manage_section` as sec, `classes` as cls where sec.class_id=cls.id  limit $offSet, $pageLimit";
                $sectionData = $con->query($selectQuery);
               
                if($sectionData->num_rows > 0) {
                    $i = $offSet+1;
                    while($sectionRows = $sectionData->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $sectionRows['class'];?></td>
                            <td><?php echo $sectionRows['section_name'];?></td>
                        </tr>
                        <?php
                    }
                }  
                ?>
                </tr>
                </table>
                <div class="page">
                    
                <?php
                if($pageNo>1){
                    echo '<a href="manage_section.php?page='.($pageNo-1).'">Pre</a>';
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
                    echo '<a href="manage_section.php?page='.($pageNo+1).'">Next</a>';
                }
                ?>
                </div>
            </aside>
		</div>	
	</section>
</body>
</html>