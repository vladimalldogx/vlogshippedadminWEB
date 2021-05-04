<?php

require 'db/dbhelper.php';


Class category extends DBHelper{
	private $table = 'category';
    private $fields = array(
		
        'category_name',
    );
//constructor
    function __construct(){
        return DBHelper::__construct();
    }
// Create
function addCate($data){
    return DBHelper::insertCat($data,$this->fields,$this->table); 
 }
 
// Retreive
 function getAllCate(){
     return DBHelper::getAllCat($this->table);
 }
 function getCateById($ref_id){
     return DBHelper::getCatById($this->table,'category_id',$ref_id);
 }
 function getCate($ref_id){
     return DBHelper::getCat($this->table.' s','s.category_id',$ref_id);
 }
// Update
function updateCate($data,$category_name){
    return DBHelper::updateCat($this->table.' s',$this->fields,$data,'s.category_name',$category_name); 
 }
 // Delete
 function deleteCate($ref_id){
          return DBHelper::deleteCat($this->table,'category_id',$ref_id);
}
// Some Functions
    function getCountStud(){
        return DBHelper::countRecord('category_id',$this->table);
    }
}
