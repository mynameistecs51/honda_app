<?php
   class Mdl_usersetting extends CI_Model
   {
      public function __construct()
      {
		parent::__construct(); 
      }

 public function getMenu($level,$id_mposition){
	  $sql = "
		SELECT
			a.id_mmenu,
			b.id_cusersetting,
			a.mmenu_name,
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
		mmenu a
			LEFT JOIN cusersetting b ON a.id_mmenu=b.id_mmenu
			LEFT JOIN mposition c ON b.id_mposition=c.id_mposition
		WHERE
			1=1";
	if($level==1){
		$sql .=" AND a.level =1 AND a.id_parent <> 4";
	}else if($level==2){
		$sql .="   
				AND a.id_parent <> 0 ";
	} 
	$sql .=" AND b.id_mposition='$id_mposition'
		ORDER BY a.id_order ASC ";
        $query = $this->db->query($sql); 
		return $query->result();
	  }

public function getmposition(){
	  $sql = "
				SELECT
				a.id_mposition,a.mposition_name
				FROM
				mposition a
				WHERE a.status=1  ";
// echo $sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	  }
      public function clearstatus($data,$id_mposition)
      {
         $this->db->where('id_mposition', $id_mposition);
         $this->db->update("cusersetting",$data);

      }
      public function updatestatus($data,$id_cusersetting)
      {
         $this->db->where('id_cusersetting', $id_cusersetting);
         $this->db->update("cusersetting",$data); 
      }


}?>