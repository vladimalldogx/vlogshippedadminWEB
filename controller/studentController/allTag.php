<?php
require '../../model/tagModel.php';
$tag = new tag();
echo json_encode($tag->getAllSucat());