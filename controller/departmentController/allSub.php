<?php
require '../../model/submanModel.php';
$department = new Department();
echo json_encode($department->getAllDept());
