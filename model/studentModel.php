<?php

require 'db/dbhelper.php';


Class Student extends DBHelper{
    private $table = 'users';
    private $fields = array(
        'id',
        'email_address',
        'password',
        'first_name',
        'last_name',
        'gender',
        'birthday',
        'mobile_number',
    );
//constructor
    function __construct(){
        return DBHelper::__construct();
    }
// Create
function addStud($data){
    return DBHelper::insertRecord($data,$this->fields,$this->table); 
 }
// Retreive
 function getAllStud(){
     return DBHelper::getAllRecord($this->table);
 }
 function getAllSubs(){
    return DBHelper::getAllSubscription($this->table);
}
 function getAllSponsor(){
    return DBHelper::getAllSponsorRecord($this->table);
}
 function getStudById($ref_id){
     return DBHelper::getRecordById($this->table,'id',$ref_id);
 }
 function getStud($ref_id){
     return DBHelper::getRecord($this->table.' s','s.user_id',$ref_id);
 }
// Update
function updateStud($data,$ref_id){
    return DBHelper::updateRecord($this->table.' s',$this->fields,$data,'id',$ref_id); 
 }

 function activateStud($ref_id){
    return DBHelper::activateStudent($this->table,'id',$ref_id);
 }

 function deactivate($ref_id){
    return DBHelper::deactivateUser($this->table,'id',$ref_id);
 }
 // Delete
 function deleteStud($ref_id){
          return DBHelper::deleteRecord($this->table,'id',$ref_id);
}
// Some Functions
    function getCountStud(){
        return DBHelper::countRecord('NoOfstud',$this->table);
    }
}
