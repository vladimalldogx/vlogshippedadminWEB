<?php
//// database abstraction
Class DBHelper{
    	//properties
		private $hostname='localhost'; //127.0.0.1
		private $username='root';
		private $password='';
		private $database='vlogshipped';
		private $conn;
// Constructor
function __construct(){
    try{
        $this->conn=new PDO("mysql:host=$this->hostname;dbname=$this->database",$this->username,$this->password);
    }catch(PDOException $e){ echo $e->getMessage();}
}
// Login
    function logginUser($user,$pass){
        $flag=false;
            $sql2 = "SELECT * FROM tbl_admin WHERE username = ? AND password = ?";
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->execute(array($user,$pass));
            $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            if($stmt2->rowCount() > 0){
                $_SESSION['admin'] = $row2['firstname'].' '.$row2['lastname'];
                $_SESSION['admin_id'] = $row2['admin_id'];
                echo "<script> window.location='home.php?$_SESSION[admin]'; </script>";
                $flag=true;
            }else{
               echo "<script> alert('Error'); </script>";
            }
        
        $this->conn = null;
        return $flag;
    }
// Create
    function insertRecord($data,$fields,$table){
        $ok;
        $fld=implode(",",$fields);
        $q=array();
        foreach($data as $d) $q[]="?";
        $plc=implode(",",$q);
        $sql="INSERT INTO $table($fld) VALUES($plc)";
        try{
            $stmt=$this->conn->prepare($sql);
            $ok=$stmt->execute($data);				
        }catch(PDOException $e){ echo $e->getMessage();}
        return $ok;
    }

    function addSubscriptionRate($m_rate,$a_rate,$table){
        $ok;
        $sql="INSERT INTO subscription_rate (monthly_rate, annual_rate) VALUES($m_rate, $a_rate)";
        try{
            $stmt=$this->conn->prepare($sql);
            $ok=$stmt->execute();				
        }catch(PDOException $e){ echo $e->getMessage();}
        return $ok;
    }

    function insertCat($data,$fields,$table){
        $ok;
        $fld=implode(",",$fields);
        $q=array();
        foreach($data as $d) $q[]="?";
        $plc=implode(",",$q);
        $sql="INSERT INTO category($fld) VALUES($plc)";
        try{
            $stmt=$this->conn->prepare($sql);
            $ok=$stmt->execute($data);				
        }catch(PDOException $e){ echo $e->getMessage();}
        return $ok;
    }
    function insertScat($data,$fields,$table){
        $ok;
        $fld=implode(",",$fields);
        $q=array();
        foreach($data as $d) $q[]="?";
        $plc=implode(",",$q);
        $sql="INSERT INTO subcat($fld) VALUES($plc)";
        try{
            $stmt=$this->conn->prepare($sql);
            $ok=$stmt->execute($data);				
        }catch(PDOException $e){ echo $e->getMessage();}
        return $ok;
    }

    
// Retrieve
function getAllRecord($table){
        $rows;
        $sql="SELECT * FROM $table where user_type = 1";
        try{
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){ echo $e->getMessage();}
        return $rows;
    }
   
    function getAllSubscriptions($table){
        $rows;
        $sql="SELECT *, subscription.id as subs_id FROM subscription LEFT JOIN users on subscription.user_id = users.id";
        try{
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){ echo $e->getMessage();}
        return $rows;
    }

    function getAllSubscriptionsRate($table){
        $rows;
        $sql="SELECT * FROM subscription_rate";
        try{
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){ echo $e->getMessage();}
        return $rows;
    }
	
	

    function getAllSponsorRecord($table){
        $rows;
        $sql="SELECT * FROM $table where user_type = 0";
        try{
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){ echo $e->getMessage();}
        return $rows;
    }

    function getAllContent($table){
        $rows;
        $sql="SELECT *, content.description as descrip, content.id as content_id FROM content LEFT JOIN users on content.user_id = users.id";
        //$sql="SELECT * FROM $table";
        try{
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){ echo $e->getMessage();}
        return $rows;
    }

    function getAllRatings($table){
        $rows;
        $rows1;
        $sql="SELECT *, ratings.rate as rate, ratings.id as rating_id, users.description as descrip, content.description as content_description FROM $table LEFT JOIN content on ratings.rating_to = content.user_id LEFT JOIN users on ratings.rating_from = users.id";
   
        try{
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){ echo $e->getMessage();}


        $sql1="SELECT users.first_name as firstname, users.last_name as lastname FROM $table LEFT JOIN users on ratings.rating_to = users.id";
   
        try{
            $stmt=$this->conn->prepare($sql1);
            $stmt->execute();
            $rows1=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){ echo $e->getMessage();}

        for($i = 0, $l = count($rows1); $i < $l; $i++) {
            array_push($rows[$i], (object) $rows1[$i]); //or any value?
          }
          
    
    
        return $rows;
    }
    function getAllCat($table){
        $rows;
        $sql="SELECT * FROM category";
        try{
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){ echo $e->getMessage();}
        return $rows;
    }
    function getAllScat($table){
        $rows;
        $sql="SELECT * FROM subcat";
        try{
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){ echo $e->getMessage();}
        return $rows;
    }
    function getAllCampaign($table){
        $rows;
        $sql="SELECT *, campaign.description as descrip, campaign.id as campaign_id FROM $table LEFT JOIN users on campaign.user_id = users.id";
        //$sql="SELECT * FROM $table";
        try{
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){ echo $e->getMessage();}
        return $rows;
    }
    //-----
    function getRecordById($table,$field_id,$ref_id){
        $sql = "SELECT * FROM $table WHERE $field_id = ?";
        try{
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($ref_id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){ echo $e->getMessage();}
        return $row;
       // $this->conn = null;
    }
    //---
function getRecord($table,$field_id,$ref_id){
    $row;
    $sql="SELECT * FROM $table WHERE $field_id=?";
    try{
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(array($ref_id));
        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){ echo $e->getMessage();}
    return $row;
}
function getCat($category_id,$table){
    $row;
    $sql="SELECT * FROM $table WHERE $category_id=?";
    try{
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(array($category_id));
        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){ echo $e->getMessage();}
    return $row;
}
function getCatById($table,$category_id,$ref_id){
    $sql = "SELECT * FROM category WHERE category_id = '$ref_id' ";
    try{
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(array($ref_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}catch(PDOException $e){ echo $e->getMessage();}
    return $row;
   // $this->conn = null;
}
// Update
function updateRecord($table,$fields,$data,$field_id,$ref_id){
            $ok;
            $flds=implode("=?,",$fields)."=?";
            $sql="UPDATE $table SET $flds WHERE $field_id=$ref_id";
            try{
                $stmt=$this->conn->prepare($sql);
                $ok=$stmt->execute($data);
            }catch(PDOException $e){ echo $e->getMessage();}
            return $ok;
        }

function activateStudent($table,$field_id,$ref_id){
            $ok;
            $sql="UPDATE $table SET user_status = 1 WHERE $field_id= $ref_id";
            try{
                $stmt=$this->conn->prepare($sql);
                $ok=$stmt->execute($data);
            }catch(PDOException $e){ echo $e->getMessage();}
            return $ok;
        }

function deactivateUser($table,$field_id,$ref_id){
        $ok;
        $sql="UPDATE $table SET user_status = 0 WHERE $field_id= $ref_id";
        try{
            $stmt=$this->conn->prepare($sql);
            $ok=$stmt->execute($data);
         }catch(PDOException $e){ echo $e->getMessage();}

             return $ok;
     }

     
function activateSubscriptionRate($table,$field_id,$ref_id){
    $ok;
    $sql="UPDATE subscription_rate SET subscription_status = 1 WHERE $field_id= $ref_id";
    try{
        $stmt=$this->conn->prepare($sql);
        $ok=$stmt->execute();
     }catch(PDOException $e){ echo $e->getMessage();}

         return $ok;
 }

 function deactivateSubscriptionRate($table,$field_id,$ref_id){
    $ok;
    $sql="UPDATE subscription_rate SET subscription_status = 0 WHERE $field_id= $ref_id";
    try{
        $stmt=$this->conn->prepare($sql);
        $ok=$stmt->execute();
     }catch(PDOException $e){ echo $e->getMessage();}

         return $ok;
 }
 function updateCat($category_name,$category_id,$data){
    $ok;
    $sql="UPDATE category SET category_name = '$category_name' WHERE category_id='$category_id'";
    try{
        $stmt=$this->conn->prepare($sql);
        $ok=$stmt->execute($data);
    }catch(PDOException $e){ echo $e->getMessage();}
    return $ok;
}
// Delete
function deleteRecord($table,$field_id,$ref_id){
    $ok;
    $sql="DELETE FROM $table WHERE $field_id=?";
    try{
        $stmt=$this->conn->prepare($sql);
        $ok=$stmt->execute(array($ref_id));				
    }catch(PDOException $e){ echo $e->getMessage();}
    return $ok;
}

function deleteSubscriptionRate($table,$field_id,$ref_id){
    $ok;
    $sql="DELETE FROM subscription_rate WHERE $field_id=?";
    try{
        $stmt=$this->conn->prepare($sql);
        $ok=$stmt->execute(array($ref_id));				
    }catch(PDOException $e){ echo $e->getMessage();}
    return $ok;
}

function deleteContent($table,$field_id,$ref_id){
    $ok;
    $sql="DELETE FROM $table WHERE $field_id=?";
    try{
        $stmt=$this->conn->prepare($sql);
        $ok=$stmt->execute(array($ref_id));				
    }catch(PDOException $e){ echo $e->getMessage();}
    return $ok;
}
function deleteCampaign($table,$field_id,$ref_id){
    $ok;
    $sql="DELETE FROM $table WHERE $field_id=?";
    try{
        $stmt=$this->conn->prepare($sql);
        $ok=$stmt->execute(array($ref_id));				
    }catch(PDOException $e){ echo $e->getMessage();}
    return $ok;
}
function deleteCat($table,$category_id,$ref_id){
    $ok;
    $sql="DELETE FROM $table WHERE $category_id=?";
    try{
        $stmt=$this->conn->prepare($sql);
        $ok=$stmt->execute(array($ref_id));				
    }catch(PDOException $e){ echo $e->getMessage();}
    return $ok;
}
// Some functions
    function countRecord($field,$table){
        $sql = "SELECT count($field) FROM $table";
        try{
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchColumn();
    }catch(PDOException $e){ echo $e->getMessage();}
        return $row;
       // $this->conn = null;
    }
    function countRecordGroup($field,$other,$countName,$table,$ref_id){
        $sql = "SELECT $other,count($field) AS $countName  FROM $table group by $ref_id";
        try{
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){ echo $e->getMessage();}
        return $row;
       // $this->conn = null;
    }
    
    //
    function destroy(){
        $this->conn=null;
    }
    function getByRelation($table,$fields_id,$ref_id,$data){
        // $tables = implode(",",$table);
        $sql = "SELECT * FROM $table WHERE $fields_id = $ref_id AND $fields_id  = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function getAllRecordId($field,$table){
        $rows;
        $sql="SELECT $field FROM $table";
        try{
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){ echo $e->getMessage();}
        return $rows;
    }

}