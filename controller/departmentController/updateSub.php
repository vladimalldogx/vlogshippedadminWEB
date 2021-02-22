<?php
require '../../model/submanModel.php';
$department = new Department();
if(isset($_POST['updateDept'])){
    // $dept_id=$_POST['dept_id'];
    $ref_id = $_POST['spid'];
    $planName = $_POST['planName'];
    $duration = $_POST['duration'];
    $amount = $_POST['amount'];
    
    $department->updateDept(array($planName, $duration,$amount),$ref_id);
    header('location:../../view/subman.php');
}