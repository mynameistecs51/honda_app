<?php
   class mdl_menu extends CI_Model
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
		a.name_en,
		a.name_th,
		a.id_parent,
		a.level,
		a.filelocation
		FROM
		mmnu a
		INNER JOIN cmmnu_mpst b ON a.id_mmnu=b.id_mmnu
		INNER JOIN mpst c ON b.id_mpst=c.id_mpst
		WHERE
		a.level ='$level' 
		AND b.id_mpst='$id_mpst'
		AND a.status=1
		AND b.status=1 
		ORDER BY a.id_order" ;
 //   echo $sql;
         $query = $this->db->query($sql);
		$num_row = $query->num_rows();
		$result = $query->result();
		$data = array(
				"num_row"=> $num_row,
				"result" => $result
			);
		return $data;
	  }

public function CheckAuthen($id_mpst,$ctl){
	  $sql = "
	SELECT
		a.id_mmnu,
		a.name_en,
		a.name_th,
		a.id_parent,
		a.level,
		a.filelocation
		FROM
		mmnu a
		INNER JOIN cmmnu_mpst b ON a.id_mmnu=b.id_mmnu
		INNER JOIN mpst c ON b.id_mpst=c.id_mpst
		WHERE 		
			b.id_mpst='$id_mpst'
		AND a.status=1
		AND b.status=1 
		AND a.filelocation='$ctl' ";
// echo $sql;
         $query = $this->db->query($sql);
		$num_row = $query->num_rows();
		if($num_row > 0){
			return "1";
		}else{
			return "0";
		}
 	  }

public function getBtn($id_mpst,$ctl){
	  $sql = "
		SELECT
			a.id_mmnu,
			a.name_en,
			a.name_th,
			a.id_parent,
			a.level,
			a.filelocation,
			b.status,
			b.can_view,
			b.can_create,
			b.can_edit,
			b.can_print
		FROM
			mmnu a
			INNER JOIN cmmnu_mpst b ON a.id_mmnu=b.id_mmnu
			INNER JOIN mpst c ON b.id_mpst=c.id_mpst
		WHERE 		
			b.id_mpst='$id_mpst'
		AND a.status=1
		AND b.status=1 
		AND a.filelocation='$ctl' "; 
		$query = $this->db->query($sql);
		$result = $query->row();
		$data = array(
			"view" => $result->can_view,
			"add" => $result->can_create,
			"edit" => $result->can_edit,
			"print" => $result->can_print
		);
		return $data;
 	  }

public function getScreenName($filelocation)
 {
 	$sql ="
 	SELECT
			CONCAT(UCASE(parent.name_en),' ','>',' ',mmnu.name_th) as screenname
			FROM
				mmnu
			JOIN (SELECT
					id_mmnu,
					name_en
				  FROM
					mmnu) AS parent ON mmnu.id_parent = parent.id_mmnu
			WHERE
				mmnu.filelocation = '".$filelocation."'";
	$query = $this->db->query($sql);
	if($query->num_rows() > 0)
	{
		$row = $query->row();
		return  $row->screenname;
	}else{
		return  '-';
	}

 }
 public function getPageName($filelocation)
 {
 	$sql ="
 	SELECT
			mmnu.name_th as pagename
			FROM
				mmnu
			WHERE
				mmnu.filelocation = '".$filelocation."'";
	$query = $this->db->query($sql);
	if($query->num_rows() > 0)
	{
		$row = $query->row();
		return  $row->pagename;
	}else{
		return  '-';
	}

 }

   }
?>