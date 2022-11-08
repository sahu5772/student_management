<?php
require_once("config.php");
require_once("validation.php");

$classId = $_REQUEST['clsId'];
$selectQuery = "SELECT * FROM `manage_section` where class_id=$classId";
$secData = $con->query($selectQuery);

echo '<option value="">--Select Section--</option>';
while($_row = $secData->fetch_assoc()) {
    echo '<option value="'.$_row['id'].'">'.$_row['section_name'].'</option>';
}