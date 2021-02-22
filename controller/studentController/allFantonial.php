<?php
require '../../model/fantonialModel.php';
$student = new Student();
echo json_encode($student->getAllStud());