<?php

require 'db/dbhelper.php';

Class Department extends DBHelper{
    private $table = 'subplan';
    private $fields = array(
        'planName',
        'duration',
        'amount',
    );
//constructor
    function __construct(){
        return DBHelper::__construct();
    }
// Create
function addDept($data){
    return DBHelper::insertRecord($data,$this->fields,$this->table); 
 }
// Retreive
 function getAllDept(){
     return DBHelper::getAllRecord($this->table);
 }
 function getDeptById($ref_id){
     return DBHelper::getRecordById($this->table,'spid',$ref_id);
 }
 function getDept($ref_id){
     return DBHelper::getRecord($this->table.' d','d.spid',$ref_id);
 }
// Update
function updateDept($data,$ref_id){
    return DBHelper::updateRecord($this->table.' d',$this->fields,$data,'d.spid',$ref_id); 
 }
 // Delete
 function deleteSubsMan($ref_id){
          return DBHelper::deleteSubscriptionManagement($this->table,'spid',$ref_id);
}
// Some Functions
    //  function getStudentDepts($data){
       // return DBHelper::getByRelation('tbl_student s, '.$this->table.' d','d.dept_id','s.dept_id',$data);
  //  }
    function getCountDept(){
        return DBHelper::countRecord('spid',$this->table);
    }
}