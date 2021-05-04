<?php
require '../../model/categoryModel.php';
$cat = new category();
if(isset($_POST['updateStud'])){
  
    $category_name= $_POST['category_name'];
    
    $cat->updateCate(array($category_name),$category_id);
    header('location:../../view/categoriesMgt.php'); // redirect page
}