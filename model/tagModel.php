<?php

require 'db/dbhelper.php';


Class tag extends DBHelper{
	private $table = 'subcat';
    private $fields = array(
		
        'scat_name',
    );
//constructor
    function __construct(){
        return DBHelper::__construct();
    }
// Create
function addSucat($data){
    return DBHelper::insertScat($data,$this->fields,$this->table); 
 }
 
// Retreive
 function getAllSucat(){
     return DBHelper::getAllScat($this->table);
 }
 function getSucatById($ref_id){
     return DBHelper::getScatById($this->table,'scat_id',$ref_id);
 }
 function getSucat($ref_id){
     return DBHelper::getScat($this->table.' s','s.scat_id',$ref_id);
 }
// Update
function updateSucat($data,$scat_name){
    return DBHelper::updateScat($this->table.' s',$this->fields,$data,'s.scat_name',$scat_name); 
 }
 // Delete
 function deleteSucat($ref_id){
          return DBHelper::deleteScat($this->table,'scat_id',$ref_id);
}
// Some Functions
    function getCountStud(){
        return DBHelper::countRecord('scat_id',$this->table);
    }
}
