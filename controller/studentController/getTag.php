<?php
require '../../model/tagModel.php';
$tag = new tag();
$data = file_get_contents("php://input");
$request = json_decode($data);
$id = $request->scat_id;

$row = $tag->getSucatById($id);
echo json_encode($row);
?>