<?php

    require_once('config-2.php');
    require_once('validation.php');

    $dataId = $_REQUEST['id'];
    // print_r ($dataId);
    // echo "<pre>";
    // die;
    if($dataId) {
        $editSql = "SELECT * FROM `school_data` where id=$dataId";
        $data = $con->query($editSql);
    //     print_r ($data);
    // echo "<pre>";
    // die;
        if($data->num_rows){
            $studentRecord= $data->fetch_assoc();
            // print_r($studentRecord);
            // die;
        }else{
            $_SESSION['error']="Record not found....";
            header("Location: school-data.php");
        }
    }else{
        header("Location: school-data.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ndlm-training</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="css-1/student.css">
        <?php
        include_once('head.php');
        ?>
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
                            <p>student-form</p>
                        </li>
 
                    </ul>
                </section>
                <section class="table">
                    <div class="main" >
                        <h3>Student Registration Form For NDLM Training</h3>
                        <?php
                            if(isset($_SESSION['validation_Error'])){?>
                                <div class="error">
                                    <?php echo $_SESSION['validation_Error'] ?>
                                </div>
                                <?php
                                unset($_SESSION['validation_Error']);
                            }
                        ?>
                <form class="top" action="update-data.php" method="post">
                    
                    <h6>Basic Details:-</h6>
                    <input type="hidden" name="id" value="<?=$studentRecord['id']?>">
                    <div class="basic">
                        <lable>
                            <h5>District*</h5> 
                            <input type="text" name="district" value="<?=$studentRecord['district']?>"/>
                        </lable>
                        <lable>
                            <h5>Tehsil* </h5> 
                            <input type="text" name="tehsil" value="<?=$studentRecord['tehsil'] ?>" />
                        </lable>
                        <lable>
                            <h5>Block*  </h5>
                            <input type="text" name="block" value="<?=$studentRecord['block']?>"/>
                        </lable>    
                        <lable>
                            <h5>Village/Ward* </h5> 
                            <input type="text" name="village_ward" value="<?=$studentRecord['village_ward']?>"/>
                        </lable>
                        <lable>
                            <h5>Panchayat/Municipal* </h5>
                            <input type="text" name="panchayat_municipal" value="<?=$studentRecord['panchayat_municipal']?>"/>
                        </lable>
                    </div>
                <div class="candidate">
                    <h6>Student Details:-</h6>
                        <span class="name-fields">
                            <lable>
                                <h5>Candidate Name*</h5>
                                <input type="text" name="candidate_name" value="<?=$studentRecord['candidate_name']?>"/>
                            </lable>      
                            <lable>
                                <h5>Mother Name*</h5>
                                <input type="text" name="mother_name" value="<?=$studentRecord['mother_name']?>"/>
                            </lable>    
                            <lable>
                                <h5>Father Name*</h5>
                                <input type="text" name="father_name" value="<?=$studentRecord['father_name']?>"/>
                            </lable>
                        </span>
                            <div class="part">
                                <span class="devide">
                                    <lable>
                                        <h5>Occupation*</h5>
                                        <input type="text" name="occupation" value="<?=$studentRecord['occupation']?>"/>
                                    </lable>                         
                                    <lable>
                                        <h5>Religion*</h5>
                                        <input type="text" name="religion" value="<?=$studentRecord['religion'] ?>"/>
                                    </lable>
                                </span>
                                <span class="devide">
                                    <lable>
                                        <h5>Pin Code*</h5>
                                        <input type="number" name="pin_code" value="<?=$studentRecord['pin_code']?>"/> 
                                    </lable>                              
                                    <lable>
                                        <h5>Mobile*</h5>
                                        <input type="text" name="mobile" value="<?=$studentRecord['mobile']?>"/>
                                    </lable> 
                                </span>    
                            </div>
                        <lable class="aadhar">
                            <h5>12 Digit Aadhaar NO*</h5>
                            <input type="text" name="aadhaar_number" value="<?=$studentRecord['aadhaar_number']?>"/>
                        </lable>
                            <span class="devide">
                                <lable>
                                    <h5>Attach ID Type*</h5>
                                    <input type="text" name="attach_id_type" value="<?=$studentRecord['attach_id_type']?>"/>
                                </lable>
                                    
                                <lable>
                                    <h5>Date Of Birthday*</h5>
                                    <input type="text" name="date_of_birth" value="<?=$studentRecord['date_of_birth']?>"/>
                                </lable>
                            </span>
                            <span class="part-1">
                                <lable class="frst">
                                    <h5>Community*:SC/ST/BPL</h5>
                                    <input type="text" name="cummunity" value="<?=$studentRecord['cummunity'] ?>"/>
                                </lable>
                                    
                                <lable class="frst-1">
                                    <h5>Genera/OBC</h5>
                                    <input type="text" name="general_obc" value="<?=$studentRecord['general_obc']?>"/>
                                </lable>
                                    
                                <lable  class="last-box">
                                    <h5>ASHA/AWW/FPS</h5>
                                    <input type="text" name="asha" value="<?=$studentRecord['asha']?>"/>
                                </lable>
                            </span>
                            <span class="part-2">
                                <lable class="box1">
                                    <h5>Differently Abled*:Yes/NO</h5>
                                    <input type="text" name="differently_abled" value="<?=$studentRecord['differently_abled']?>"/>
                                </lable>
                                    
                                <lable class="box-2">
                                    <h5>Candidate Type*BPL/Non BPL</h5>
                                    <input type="text" name="candidate_type" value="<?=$studentRecord['candidate_type']?>"/>
                                </lable>
                            </span>
                            
                        <span class="foot-boxs">
                            <lable>
                                <h5>Name of institue where studying:-</h5>
                                <input type="text" name="institute_name" value="<?=$studentRecord['institute_name']?>"/>
                            </lable>
                        </span>
                        

                </div>
                    
                
                
                    <h6>Family Details</h6>

                        <table class="up" border="1">
                            <tr class="field">
                                <th>Name</th>
                                <th>Sex</th>
                                <th>Age</th>
                                <th>Relation</th>
                                <th>Aadhaar</th>
                                <th>Action</th>
                            </tr>  
                            <tr class="input-field">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="up2">
                                    <a href="#"><span>Delete</span></a>
                                    <a href="#"><span>Add More</span></a>
                                </td>
                            </tr>            
                        </table>    

                        <lable border="none" class="down">
                            <h5>Upload photo:</h5>
                            <input type="file" />
                        </lable>
                        <lable class="down">
                            <h5>Upload Signature:</h5>
                            <input type="file" />
                        </lable>
                        
                        <button  value="Update Class" type="submit" name="submit">submit</button> 
                          
                </form>
                <h5>Note*</h5>
                <p>I have objection for Aadhaar authentication and obtaining NDLM Training trought Comtech Institute of Technology.</p>
            </div>
        </section>   
        
</body>
</html>