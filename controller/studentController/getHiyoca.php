<?php
require '../../model/hiyocaModel.php';
$student = new Student();
$data = file_get_contents("php://input");
$request = json_decode($data);
$id = $request->content_name;
// $id="15387467";
$row = $student->getStudById($id);
echo json_encode($row);