<?php
require '../../model/categoryModel.php';
$cat = new category();
echo json_encode($cat->getAllCate());