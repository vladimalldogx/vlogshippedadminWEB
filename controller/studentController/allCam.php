<?php
require '../../model/campaignModel.php';
$student = new Campaign();
echo json_encode($student->getAllCam());