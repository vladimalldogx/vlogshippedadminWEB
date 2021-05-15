<?php
require '../../model/tagModel.php';
$tag = new tag();
if(isset($_POST['addStud'])){ // button name addStud 
    
    $scat_name = $_POST['scat_name'];
    
    $tag->addSucat(array($scat_name));
    header('location:../../view/tagMgt.php'); // redirect page
}