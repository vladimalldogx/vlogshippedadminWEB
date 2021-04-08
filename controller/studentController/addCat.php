<?php
require '../../model/categoryModel.php';
$cat = new category();
if(isset($_POST['addStud'])){ // button name addStud 
    
    $category_name = $_POST['category_name'];
    
    $cat->addCate(array($category_name));
    header('location:../../view/categoriesMgt.php'); // redirect page
}