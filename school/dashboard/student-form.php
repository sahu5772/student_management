<?php

    require_once('config-2.php');
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
                        <!-- <li class="user-box">
                            <p>Dashboard</p>
                        </li> -->
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
                <form class="top" action="save-data-2.php" method="post">
                    <h6>Basic Details:-</h6>
                    <div class="basic">
                        <lable>
                            <h5>District*</h5> 
                            <input type="text" name="district" value="<?php echo(isset($_SESSION['district']))? $_SESSION['district']:'';?>"/></lable>
                        <lable>
                            <h5>Tehsil* </h5> 
                            <input type="text" name="tehsil" value="<?php echo(isset($student_data['tehsil']))? $student_data['tehsil']:'';?>"/>
                        </lable>
                        <lable>
                            <h5>Block*  </h5>
                            <input type="text" name="block" value="<?php echo(isset($student_data['block']))? $student_data['block']:'';?>"/></lable>
                        <lable>
                            <h5>Village/Ward* </h5> 
                            <input type="text" name="village_ward" value="<?php echo(isset($student_data['village_ward']))? $student_data['village_ward']:'';?>"/></lable>
                        <lable>
                            <h5>Panchayat/Municipal* </h5>
                            <input type="text" name="panchayat_municipal" value="<?php echo(isset($student_data['panchayat_municipal']))? $student_data['panchayat_municipal']:'';?>"/>
                        </lable>
                    </div>
                <div class="candidate">
                    <h6>Student Details:-</h6>
                        <span class="name-fields">
                            <lable>
                                <h5>Candidate Name*</h5>
                                <input type="text" name="candidate_name" value="<?php echo(isset($student_data['candidate_name']))? $student_data['candidate_name']:'';?>"/>
                            </lable>      
                            <lable>
                                <h5>Mother Name*</h5>
                                <input type="text" name="mother_name" value="<?php echo(isset($student_data['mother_name']))? $student_data['mother_name']:'';?>"/>
                            </lable>    
                            <lable>
                                <h5>Father Name*</h5>
                                <input type="text" name="father_name" value="<?php echo(isset($student_data['father_name']))? $student_data['father_name']:'';?>"/>
                            </lable>
                        </span>
                            <div class="part">
                                <span class="devide">
                                    <lable>
                                        <h5>Occupation*</h5>
                                        <input type="text" name="occupation" value="<?php echo(isset($student_data['occupation']))? $student_data['occupation']:'';?>"/>
                                    </lable>
                                    <lable>
                                        <h5>Religion*</h5>
                                        <input type="text" name="religion" value="<?php echo(isset($student_data['religion']))? $student_data['religion']:'';?>"/>
                                    </lable>
                                </span>
                                <span class="devide">
                                    <lable>
                                        <h5>Pin Code*</h5>
                                        <input type="number" name="pin_code" value="<?php echo(isset($student_data['pin_code']))? $student_data['pin_code']:'';?>"/>
                                    </lable>
                                    <lable>
                                        <h5>Mobile*</h5>
                                        <input type="text" name="mobile" value="<?php echo(isset($student_data['mobile']))? $student_data['mobile']:'';?>"/>
                                    </lable> 
                                </span>    
                            </div>
                        <lable class="aadhar">
                            <h5>12 Digit Aadhaar NO*</h5>
                            <input type="text" name="aadhaar_number" value="<?php echo(isset($student_data['aadhaar_number']))? $student_data['aadhaar_number']:'';?>"/>
                        </lable>
                            <span class="devide">
                                <lable>
                                    <h5>Attach ID Type*</h5>
                                    <input type="text" name="attach_id_type" value="<?php echo(isset($student_data['attach_id_type']))? $student_data['attach_id_type']:'';?>"/>
                                </lable>
                                    
                                <lable>
                                    <h5>Date Of Birthday*</h5>
                                    <input type="text" name="date_of_birth" value="<?php echo(isset($student_data['date_of_birth']))? $student_data['date_of_birth']:'';?>"/>
                                </lable>
                            </span>
                            <span class="part-1">
                                <lable class="frst">
                                    <h5>Community*:SC/ST/BPL</h5>
                                    <input type="text" name="cummunity" value="<?php echo(isset($student_data['cummunity']))? $student_data['cummunity']:'';?>"/>
                                </lable>
                                    
                                <lable class="frst-1">
                                    <h5>Genera/OBC</h5>
                                    <input type="text" name="general_obc" value="<?php echo(isset($student_data['general_obc']))? $student_data['general_obc']:'';?>"/>
                                </lable>
                                    
                                <lable  class="last-box">
                                    <h5>ASHA/AWW/FPS</h5>
                                    <input type="text" name="asha" value="<?php echo(isset($student_data['asha']))? $student_data['asha']:'';?>"/>
                                </lable>
                            </span>
                            <span class="part-2">
                                <lable class="box1">
                                    <h5>Differently Abled*:Yes/NO</h5>
                                    <input type="text" name="differently_abled" value="<?php echo(isset($student_data['differently_abled']))? $student_data['differently_abled']:'';?>"/>
                                </lable>
                                    
                                <lable class="box-2">
                                    <h5>Candidate Type*BPL/Non BPL</h5>
                                    <input type="text" name="candidate_type" value="<?php echo(isset($student_data['candidate_type']))? $student_data['candidate_type']:'';?>"/>
                                </lable>
                            </span>
                            
                        <span class="foot-boxs">
                            <lable>
                                <h5>Name of institue where studying:-</h5>
                                <input type="text" name="institute_name" value="<?php echo(isset($student_data['institute_name']))? $student_data['institute_name']:'';?>"/>
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
                        
                        <button value="submit" name="submit">submit</button>            
                </form>
                <h5>Note*</h5>
                <p>I have objection for Aadhaar authentication and obtaining NDLM Training trought Comtech Institute of Technology.</p>
            </div>
        </section>   
        
</body>
</html>