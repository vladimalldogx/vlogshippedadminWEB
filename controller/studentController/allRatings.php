<?php
require '../../model/ratingsModel.php';
$student = new Ratings();
echo json_encode($student->getAllRating());