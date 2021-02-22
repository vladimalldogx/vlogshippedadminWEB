<?php
require '../../model/submanModel.php';
$department = new Department();
$data = file_get_contents("php://input");
$request = json_decode($data);
$id = $request->spid;
// $id='5';
$row = $department->getDeptById($id);
echo json_encode($row);