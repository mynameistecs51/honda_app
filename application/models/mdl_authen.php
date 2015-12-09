<?php
class Mdl_authen extends CI_Model
{
   public function __construct()
   {
	parent::__construct(); 
   }

   public function doCheckValidUserLogin($username, $userpassword)
   {
	  $sql="
         SELECT id_mmember
   		FROM mmember 
   		WHERE username='" . $this->db->escape_str(trim($username)) . "' AND password= '" . MD5($userpassword)."' AND status > 0 ";
         $result=$this->db->query($sql);
         if($result->num_rows() == 1)
         {
            return true;
         }
         else
         {
            return false;
         }
   }  

	  
   public function getLastLogin($id_mmember)
   {
      $id_mposition = 0;
      $sql = "
         SELECT  CONCAT( DATE_FORMAT(max(dt_create),'%d'),' ',
            CASE DATE_FORMAT(max(dt_create),'%m') 
               WHEN 01 THEN 'มกราคม' 
               WHEN 02 THEN 'กุมภาพันธ์'
               WHEN 03 THEN 'มีนาคม' 
               WHEN 04 THEN 'เมษายน'
               WHEN 05 THEN 'พฤษภาคม'
               WHEN 06 THEN 'มิถุนายน'
               WHEN 07 THEN 'กรกฎาคม'
               WHEN 08 THEN 'สิงหาคม'
               WHEN 09 THEN 'กันยายน'
               WHEN 10 THEN 'ตุลาคม'
               WHEN 11 THEN 'พฤศจิกายน'
               WHEN 12 THEN 'ธันวาคม'
               END
            ,' ',DATE_FORMAT(max(dt_create),'%Y')+543,
            ' ',DATE_FORMAT(max(dt_create),'%H:%i'),' น.'
            ) AS dt_create
            FROM tlog_lgn
            WHERE id_mmember = " . $id_mmember . "
               AND is_login = 1;";
      $rs = $this->db->query($sql);
      if ($rs->num_rows() > 0 )
      {
         $row = $rs->row();
         $lastLogin = $row->dt_create;
      }
      else
      {
         $lastLogin = false;
      };
      return $lastLogin;
   }


   public function getDataUser($id_mmember){
      $sql = "
         SELECT
            a.id_mmember,
            r.mbranch_name,
            a.mmember_code,
            CONCAT(a.firstname,' ',a.lastname) AS mmember_name, 
            c.mposition_name,
            a.id_mposition,
            a.birthdate,
            a.email,
            a.username,
            a.status,
            a.mobile
         FROM
            mmember a 
         LEFT JOIN mposition c ON a.id_mposition=c.id_mposition
         LEFT JOIN mbranch r   ON c.id_mbranch=r.id_mbranch
         WHERE a.id_mmember='$id_mmember' " ;
   // echo "<pre>".$sql;
      $query = $this->db->query($sql);
      return $query->row(); 
   }

   public function getmmemberID($user){
      $sql = "
         SELECT
            a.id_mmember
         FROM
            mmember a  
         WHERE a.username='$user' " ;
     // echo $sql;
      $query   = $this->db->query($sql);
      $result = $query->row();
      return   $result->id_mmember;
   }

   public function doInsert($table, $data)
   {
      return $this->db->insert($table, $data);
   }
	    


   }
?>