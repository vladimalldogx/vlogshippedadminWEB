<?php
require '../../model/categoryModel.php';
$cat = new category();
if(isset($_POST['updateStud'])){
    
    $category_name= $_POST['category_name'];
    // $stud_fname = "Potot";
    // $stud_lname = "Ej Anton";
    // $dept_id="4";
    // $stud_yearLevel = "4";
    // $email = "ezio";
    // $date_apply = "1234";
    $cat->updateCate(array( $category_name),$category_name);
    header('location:../../view/categoriesMgt.php'); // redirect page
}