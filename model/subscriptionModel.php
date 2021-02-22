<?php

require 'db/dbhelper.php';


Class Subscription extends DBHelper{
    private $table = 'subscription';
    private $field_id = 'subscription_rate_id';
    private $fields = array(
        'id',
        'payment_id',
    );
//constructor
    function __construct(){
        return DBHelper::__construct();
    }
// Create
function addStud($data){
    return DBHelper::insertRecord($data,$this->fields,$this->table); 
 }
 // Create
function addRate($m_rate, $a_rate){
    return DBHelper::addSubscriptionRate($m_rate,$a_rate,$this->table); 
 }
// Retreive
 function getAllStud(){
     return DBHelper::getAllRecord($this->table);
 }
 function getAllSubs(){
    return DBHelper::getAllSubscriptions($this->table);
}
function getAllSubsRate(){
    return DBHelper::getAllSubscriptionsRate($this->table);
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

 function activateRate($ref_id){
    return DBHelper::activateSubscriptionRate($this->table,$this->field_id,$ref_id);
 }

 function deactivateRate($ref_id){
    return DBHelper::deactivateSubscriptionRate($this->table,$this->field_id,$ref_id);
 }
 // Delete
 function deleteStud($ref_id){
          return DBHelper::deleteRecord($this->table,'id',$ref_id);
}

function deleteRate($ref_id){
    return DBHelper::deleteSubscriptionRate($this->table,$this->field_id,$ref_id);
}
// Some Functions
      function getStudentDepts($data){
        return DBHelper::getByRelation('sample s, '.$this->table.' d','d.user_id','s.user_id',$data);
    }
    function getCountStud(){
        return DBHelper::countRecord('user_id',$this->table);
    }
}
