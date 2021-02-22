<?php
require '../../model/submanModel.php';
$department = new Department();
$data = file_get_contents("php://input");
$request = json_decode($data);
$spid = $request->spid;
// $id="4";
$department->deleteDept($spid);