<?php
require_once("config-2.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once('head.php');?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>student-data</title>
        <style>
            
        </style>
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
                            <p>student_data</p>
                        </li>

                    </ul>
                </section>
            <?php
                if(isset($_SESSION['success'])){?>
                    <div>
                        <?php echo $_SESSION['success']?>
                    </div>
                <?php
                    unset($_SESSION['success']);    
                }
            ?>
         <form class="add" action="" method="POST">
            <table class="tb" border="1" cellspacing="0" cellpadding="3" >

                <tr>    
                        <th>id</th>
                        <th>candidate_name</th>
                        <th>father_name</th>
                        <th>mobile</th>
                        <th>tehsil</th>
                        <th>pin_code</th>
                        <th>Action</th>
                        
                <tr>
                <?php
                $selectQuery = "SELECT * FROM `school_data`";
                $mainData = $con->query($selectQuery);
                if($mainData->num_rows>0) {
                    $i=1;
                    while($mainRows = $mainData->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?php echo $mainRows['candidate_name'];?></td>
                            <td><?php echo $mainRows['father_name'];?></td>
                            <td><?php echo $mainRows['mobile'];?></td>
                            <td><?php echo $mainRows['tehsil'];?></td>
                            <td><?php echo $mainRows['pin_code'];?></td>
                            <td>
                                <a class="edit-data" href="edit-data.php?id=<?php echo $mainRows['id'];?>"><span>Edit</span></a>
                                <a class="delete-data" href="delete-data.php?id=<?php echo $mainRows['id'];?>"><span>Delete</span></a>
                            </td>
                        </tr>
                        <?php
                    }
                }    
                ?>

            </table>
        </form>

    </body>
<script>
$(document).ready(function(){
    $('.delete-data').click(function(e){
        confirmation = confirm("Are you sure want to delete this record...");
        if(!confirmation){
            e.preventDefault();
        }
    });
});            
</script>
</html>