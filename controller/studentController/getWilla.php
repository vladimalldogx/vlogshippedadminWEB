<?php
require '../../model/willaModel.php';
$student = new Student();
$data = file_get_contents("php://input");
$request = json_decode($data);
$id = $request->report_id;
// $id="15387467";
$row = $student->getStudById($id);
echo json_encode($row);