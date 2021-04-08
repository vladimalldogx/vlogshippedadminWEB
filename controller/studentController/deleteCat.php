<?php
require '../../model/categoryModel.php';
$cat = new category();
$data = file_get_contents("php://input");
$request = json_decode($data);
$id = $request->category_id;
// $id="4";
$cat->deleteCate($id);