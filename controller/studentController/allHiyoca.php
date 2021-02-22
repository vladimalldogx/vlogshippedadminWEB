<?php
require '../../model/hiyocaModel.php';
$student = new Student();
echo json_encode($student->getAllStud());