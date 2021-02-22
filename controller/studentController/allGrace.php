<?php
require '../../model/graceModel.php';
$student = new Student();
echo json_encode($student->getAllStud());