<?php
require '../../model/submanModel.php';
$department = new Department();
if(isset($_POST['addDept'])){ /// button name 'addDept'
    $planName = $_POST['planName'];
    $duration = $_POST['duration'];
    $amount = $_POST['amount'];
    // $dept_code = "CBA";
    // $dept_description = "College of Business Admin";
    // $office_location = "pep plor";
    $department->addDept(array($planName, $duration,$amount));
   header('location:../../view/subman.php'); // redirect
}