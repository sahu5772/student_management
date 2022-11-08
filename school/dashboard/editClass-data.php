<?php
  require_once('config.php');
  require_once('validation.php');

$dataId = $_REQUEST['id'];
    // print_r ($dataId);
    // echo "<pre>";
    // die;
    if($dataId) {
        $editSql = "SELECT * FROM `classes` where id=$dataId";
        $data = $con->query($editSql);
    //     print_r ($data);
    // echo "<pre>";
    // die;
        if($data->num_rows){
            $classRecord= $data->fetch_assoc();
            // print_r($classRecord);
            // die;
        }else{
            $_SESSION['error']="Record not found....";
            header("Location: manage-class.php");
        }
    }else{
        header("Location: manage-class.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <?php include_once('head.php');?>
    <?php
        //include("menu.php");
        ?>
        <h1>Add Class</h1>
        <?php
            if(isset($_SESSION['validation_Error'])){?>
                <div class="Error">
                    <?php echo $_SESSION['validation_Error'];?>
                </div>
        <?php
            unset($_SESSION['validation_Error']);
            }

        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script> 
        
        
        <style>
        .success {
  background: green;
  width: 26%;
  border-radius: 26px;
  color: #fff;
  margin-bottom: 6PX;
}
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
                            <p>class management</p>
                        </li>
                    </ul>
                </section>
                <section class="table">
                <form action="updateClass-data.php" method="POST" id="formids">

                <input type="hidden" name="id" value="<?=$classRecord['id']?>">
                    <table font-size="25px" border="1" cellspacing="0" cellpadding="3" width="400">
                        <tr>
                        <tr>
                            <th>Class</th>
                            <td>
                            <input type="text" name="class" value="<?php echo(isset($classRecord['class']))? $classRecord['class']:'';?>"/>
                            </td>
                        <tr>
                            <td>Status</td>
                            <td>
                            <?php
                                $status_option =(isset($classRecord['status']))?$classRecord['status']: '';
                            ?>
                                <select name="status" id="">
                                    <option value="">--Select Status--</option>
                                    <option value="1" <?php echo ($status_option==='1')?'selected':'';?> >Enable</option>
                                    <option value="0" <?php echo ($status_option==='0')?'selected':'';?> >Disable</option>

                                </select>
                            </td>
                        <tr>
                        <tr>
                           <table id="tabletbody" font-size="25px" cellspacing="0" cellpadding="3" >
                            <tr>
                                <th>Section_name</th>
                                
                                <th>Action</th> 
                                
                            </tr>
                            <tr>
                            <td>
                                <input type="text" name="section_name[]" value="<?php echo(isset($classRecord['section_name']))? $classRecord['section_name']:'';?>">
                            </td>
                                <td>
                                    <a id="new_rows" href="#"><button Type="button" >Add</button></a>
                                </td>
                            </tr>
                                    
                           </table>   
                        </tr>
                            <th><a href="" ><button type="submit" value="Update Class" name="class_submit">Save</button></th></a>
                        </tr>
                    </table>
                 </form>

                </section>
            </aside>
		</div>	
	</section>