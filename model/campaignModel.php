<?php

require 'db/dbhelper.php';


Class Campaign extends DBHelper{
    private $table = 'campaign';
    private $fields = array(
        'id',
        'title',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'product_url',
        'photo_url',
        'description',
        'user_id',
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
 function getAllCam(){
     return DBHelper::getAllCampaign($this->table);
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
 // Delete
 function deleteCam($ref_id){
          return DBHelper::deleteCampaign($this->table,'id',$ref_id);
}
// Some Functions
      function getStudentDepts($data){
        return DBHelper::getByRelation('sample s, '.$this->table.' d','d.user_id','s.user_id',$data);
    }
    function getCountStud(){
        return DBHelper::countRecord('user_id','noOfStud',$this->table);
    }
}
