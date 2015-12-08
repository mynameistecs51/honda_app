<?php
   class mdl_authen extends CI_Model
   {
      public function __construct()
      {
		parent::__construct();
		$this->load->database("sms");
      }

      public function doCheckValidUserLogin($username, $userpassword)
      {
		$sql="
			SELECT id_memp
			FROM memp 
			WHERE username='" . $this->db->escape_str(trim($username)) . "' AND userpassword= '" . MD5($userpassword)."' AND status > 0 ";
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

	  
      public function getLastLogin($id_memp)
      {
         $id_mpst = 0;
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
               WHERE id_memp = " . $id_memp . "
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


      public function getMempID($username)
      {
         $memp_id = 0;
         $sql = "
            SELECT id_memp
               FROM memp
               WHERE username = '" . $username . "'
                  AND memp.`status` > 0;";
         $rs = $this->db->query($sql);
         if ($rs->num_rows() == 1)
         {
            $row = $rs->row();
            $memp_id = $row->id_memp;
         }
         else
         {
            $memp_id = 0;
         }
         return $memp_id;
      }
       public function getMempCode($id)
      {
         $id_memp = 0;
         $sql = "
            SELECT memp_code
               FROM memp
               WHERE id_memp = '" . $id . "'
                  AND memp.`status` > 0;";
         $rs = $this->db->query($sql);
         if ($rs->num_rows() == 1)
         {
            $row = $rs->row();
            $code_memp = $row->code_memp;
         }
         else
         {
            $code_memp = 0;
         }
         return $code_memp;
      }

 public function getDataUser($id_memp){
	  $sql = "
	  SELECT
      a.id_memp,
      a.memp_code,
      CONCAT(a.firstname_th,' ',a.lastname_th) AS name_th,
      CONCAT(a.firstname_en,' ',a.lastname_en) AS name_en,
      c.name_th AS mpst_name,
      a.id_mpst,
      a.birthdate,
      a.email,
      a.username,
      a.status,
      a.mobile
      FROM
      		memp a 
      		LEFT JOIN mpst c ON a.id_mpst=c.id_mpst
      WHERE a.id_memp='$id_memp' " ;
//   echo $sql;
         $query = $this->db->query($sql);
 		 return $query->row(); 
	  }

      public function doInsert($table, $data)
      {
         return $this->db->insert($table, $data);
      }

      public function get_id_mpst($id_memp)
      {
         $id_mpst = 0;
         $sql = "
            SELECT id_mpst
               FROM memp
               WHERE id_memp = " . $id_memp . "
                  AND memp.`status` > 0;";
         $rs = $this->db->query($sql);
         if ($rs->num_rows() == 1 )
         {
            $row = $rs->row();
            $id_mpst = $row->id_mpst;
         }
         else
         {
            $id_mpst = 0;
         }
         return $id_mpst;
      }

      public function get_id_memp($username)
      {
         $id_memp = 0;
         $sql = "
            SELECT id_memp,firstname_th,lastname_th
               FROM memp
               WHERE username = '" . $username . "'
                  AND memp.`status` > 0;";
         $rs = $this->db->query($sql);
         if ($rs->num_rows() == 1 )
         {
            $row = $rs->row();
            $id_memp = $row->id_memp;
         }
         else
         {
            $id_memp = 0;
         }
         return $id_memp;
      }
	   public function get_name_memp($username)
      {
         $memp_name = "";
         $sql = "
            SELECT id_memp,firstname_th,lastname_th
               FROM memp
               WHERE username = '" . $username . "'
                  AND memp.`status` > 0;";
         $rs = $this->db->query($sql);
         if ($rs->num_rows() == 1 )
         {
            $row = $rs->row();
            $memp_name = $row->firstname_th.' '.$row->lastname_th;
         }
         else
         {
            $memp_name = "";
         }
         return $memp_name;
      }

      public function get_username($id_memp)
      {
         $sql = "
            SELECT username,firstname_th,lastname_th
               FROM memp
               WHERE id_memp = '" . $id_memp . "'
                  AND memp.`status` > 0;";
         $rs = $this->db->query($sql);
         if ($rs->num_rows() == 1 )
         {
            $row = $rs->row();
            $username = $row->username;
         }
         else
         {
            $username = "";
         }
         return $username;
      }

      public function get_Data_Employee($id_memp)
      {
         $sql = "
         SELECT
            a.id_memp,
            a.firstname_th,
            a.lastname_th,
            a.username,
            b.id_mdept,
			b.mdept_code,
            b.name_th AS mdept_name,
            c.id_mpst
         FROM
            memp a
         LEFT JOIN mdept b ON a.id_mdept = b.id_mdept
         LEFT JOIN mpst c ON a.id_mpst = c.id_mpst
         WHERE
            a.id_memp = '$id_memp'
         AND
            a.status = 1;
         ";

         $query = $this->db->query($sql);
         $result = $query->row();

         return $result;
      }


   }
?>