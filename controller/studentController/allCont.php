<?php
require '../../model/contentModel.php';
$student = new Content();
echo json_encode($student->getAllCont());