<?php
require '../../model/loginModel.php';
$login = new Login();
if(isset($_POST['login'])){ // button name login 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ok=$login->signIn($username,$password);
    if ($ok){
    header('location:../../view/home.php'); // redirect page
    }
    else{
        header('location:../../index.html');
    }
}
