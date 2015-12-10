<?php
   class mdl_menu extends CI_Model
   {
      public function __construct()
      {
		parent::__construct(); 
      }

 public function getMenu($level,$id_mposition){
	  $sql = "
	SELECT
		a.id_mmenu,
		a.mmenu_name,
		a.id_parent,
		a.level,
		a.filelocation
		FROM
		mmenu a
		INNER JOIN cusersetting b ON a.id_mmenu=b.id_mmenu
		INNER JOIN mposition c ON b.id_mposition=c.id_mposition
		WHERE
		a.level ='$level' 
		AND b.id_mposition='$id_mposition'
		AND a.status=1
		AND b.status=1 
		ORDER BY a.id_order" ;
// echo "<pre>".$sql;
        $query = $this->db->query($sql);
		$num_row = $query->num_rows();
		$result = $query->result();
		$data = array(
				"num_row"=> $num_row,
				"result" => $result
			);
		return $data;
	  }

public function CheckAuthen($id_mposition,$ctl){
	  $sql = "
	SELECT
		a.id_mmenu,
		a.mmenu_name,
		a.id_parent,
		a.level,
		a.filelocation
		FROM
		mmenu a
		INNER JOIN cusersetting b ON a.id_mmenu=b.id_mmenu
		INNER JOIN mposition c ON b.id_mposition=c.id_mposition
		WHERE 		
			b.id_mposition='$id_mposition'
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

public function getBtn($id_mposition,$ctl){
	  $sql = "
		SELECT
			a.id_mmenu,
			a.mmenu_name,
			a.id_parent,
			a.level,
			a.filelocation,
			b.status,
			b.can_view,
			b.can_create,
			b.can_edit,
			b.can_print
		FROM
			mmenu a
			INNER JOIN cusersetting b ON a.id_mmenu=b.id_mmenu
			INNER JOIN mposition c ON b.id_mposition=c.id_mposition
		WHERE 		
			b.id_mposition='$id_mposition'
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
			CONCAT(UCASE(parent.mmenu_name),' ','>',' ',mmenu.mmenu_name) as screenname
			FROM
				mmenu
			JOIN (SELECT
					id_mmenu,
					mmenu_name
				  FROM
					mmenu) AS parent ON mmenu.id_parent = parent.id_mmenu
			WHERE
				mmenu.filelocation = '".$filelocation."'";
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
			mmenu.mmenu_name
			FROM
				mmenu
			WHERE
				mmenu.filelocation = '".$filelocation."'";
	$query = $this->db->query($sql);
	if($query->num_rows() > 0)
	{
		$row = $query->row();
		return  $row->mmenu_name;
	}else{
		return  '-';
	}

 }

   }
?>