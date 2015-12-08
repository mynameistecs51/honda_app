<?php
   class mdl_cmmnu_mpst extends CI_Model
   {
      public function __construct()
      {
		parent::__construct();
		$this->load->database("sms");
      }

 public function getMenu($level,$id_mpst){
	  $sql = "
	SELECT
		a.id_mmnu,
		b.id_cmmnu_mpst,
		a.name_en,
		a.name_th,
		a.id_parent,
		a.level,
		a.filelocation,
		a.id_order,
		b.status,
		b.can_view,
		b.can_create,
		b.can_edit,
		b.can_print
		FROM
		mmnu a
		LEFT JOIN cmmnu_mpst b ON a.id_mmnu=b.id_mmnu
		LEFT JOIN mpst c ON b.id_mpst=c.id_mpst
		WHERE 		
		a.level ='$level' 
		AND b.id_mpst='$id_mpst' " ;
   //echo $sql;
         $query = $this->db->query($sql); 
		return $query->result();
	  }

public function getMpst(){
	  $sql = "
				SELECT
				a.id_mpst,a.name_th
				FROM
				mpst a
				WHERE a.status=1  ";
// echo $sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	  }
      public function clearstatus($data,$id_mpst)
      {
         $this->db->where('id_mpst', $id_mpst);
         $this->db->update("cmmnu_mpst",$data);

      }
      public function updatestatus($data,$id_cmmnu_mpst)
      {
         $this->db->where('id_cmmnu_mpst', $id_cmmnu_mpst);
         $this->db->update("cmmnu_mpst",$data); 
      }


}?>