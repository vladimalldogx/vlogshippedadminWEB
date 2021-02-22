<?php
require '../../model/contentModel.php';
$student = new Content();
$data = file_get_contents("php://input");
$request = json_decode($data);
$id = $request->stud_id;
// $id="4";
$student->deleteCont($id);