<?php
include_once("config.php");
include_once("validation.php");
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
                            <p>SELECT DATA</p>
                        </li>

                    </ul>
                </section>
                    
        <form action="save_section.php" method="POST" id="formids">
            <table >
                <tr>
                    <td>
                       <select name="class_id" id="">
                       <?php
                            $selectQuery = "SELECT * FROM `classes` ";
                            $classData = $con->query($selectQuery);
                            if($classData->num_rows > 0) {
                                while($classRows = $classData->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $classRows['id'];?>"><?php echo $classRows['class'];?></option>   
                        <?php
                            }
                         }
                        ?>
                       
                       </select>
                       </td>
                <tr>
                    <td>
                        <input type="text"  name="section_name" placeholder="section-name" value=""/>
                    </td>
                <tr>
                <tr>
                    <th><a ><button type="submit" name="section_submit">Save</button></th></a>
                </tr>
            </table>
        </form>
            </aside>
		</div>	
	</section>
</body>
</html>