<?php
require '../../model/subscriptionModel.php';
$subs = new Subscription();
$data = file_get_contents("php://input");
$request = json_decode($data);
$id = $request->stud_id;
// $id="4";
$subs->deactivateRate($id);