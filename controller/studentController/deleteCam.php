<?php
require '../../model/campaignModel.php';
$student = new Campaign();
$data = file_get_contents("php://input");
$request = json_decode($data);
$id = $request->stud_id;
// $id="4";
$student->deleteCam($id);