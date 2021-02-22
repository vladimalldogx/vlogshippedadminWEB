<?php
require '../../model/willaModel.php';
$student = new Student();
echo json_encode($student->getAllStud());