<?php
require_once("config.php");
require_once("validation.php");

$countryId = $_REQUEST['cunId'];
$selectQuery = "SELECT * FROM `state` where country_id=$countryId";
$secData = $con->query($selectQuery);

echo '<option value="">--Select state--</option>';
while($_row = $secData->fetch_assoc()) {
    echo '<option value="'.$_row['id'].'">'.$_row['state_name'].'</option>';
}