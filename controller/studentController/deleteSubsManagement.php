<?php
require '../../model/subManagementModel.php';
$subsManagement = new subsManagement();
$data = file_get_contents("php://input");
$request = json_decode($data);
$subs_id = $request->subs_id;
// $id="4";
$subsManagement->deleteSubsMan($subs_id);