<?php
include_once("config.php");
include_once("validation.php");

$countryCount = $con->query("SELECT count(*) as total FROM `country`");
$fetchData = $countryCount->fetch_assoc();
$totalRow=$fetchData['total'];
$pageLimit = 5;

$pageCount=ceil($totalRow/$pageLimit);
if(isset($_REQUEST['page'])){
    $pageNo =$_REQUEST['page'];

}else{
    $pageNo =1;
}

$offSet=($pageNo-1)*$pageLimit;


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
                            <p>Manage country</p>
                        </li>
                    <li class="us-box">
                        <p><a class="ac" href="add-country.php">Add Country</a></p>
                    </li>    
                    </ul>
                </section>
                <table>
                    <tr class="background-1">
                        <th>ID</th>
                        <th>country_name</th>
                        <th>Status</th>
                        <th>Action</th>
  
                    </tr>                
                    <tr>
                        <?php
                        $selectQuery = "SELECT cun.*, st.state_name FROM `country` as cun LEFT JOIN `state` as st ON cun.id=st.id ORDER BY id DESC limit $offSet, $pageLimit ";
                        $sectionData = $con->query($selectQuery);
                    
                        if($sectionData->num_rows > 0) {
                            $i = $offSet+1;
                            while($sectionRows = $sectionData->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $sectionRows['country_name'];?></td>
                                    <td><?php echo ($sectionRows['status']==1)?"Enable":"Disable"; ?></td>
                                    
                                    <td>
                                       <a class="edit-data" href="edit_country.php?id=<?php echo $sectionRows['id'];?>"><span>Edit</span></a>
                                        <a class="delete-data" href="?id=<?php echo $sectionRows['id'];?>"><span>Delete</span></a>
                                    </td>
                                    
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
                            echo '<a href="manage-country.php?page='.($pageNo-1).'">Pre</a>';
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
                            echo '<a href="manage-country.php?page='.($pageNo+1).'">Next</a>';
                        }
                        ?>
                    </div>
            </aside>
		</div>	
	</section>
</body>
</html>