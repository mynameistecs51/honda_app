<?php
   class mdl_mst extends CI_Model
   {
      public function __construct()
      {
		parent::__construct(); 
      }

	  public function addMst($data){
		$this->db->insert('mst', $data);
	  }

	  public function updateMst($id,$data){
		$this->db->where('id_mst', $id);
		$this->db->update('mst', $data);
	  }

 
 public function getList($requestData){

	 	$sql_full = "
              SELECT
				a.id_mst,
				a.mst_code,
				a.name_en,
				a.name_th,
				a.status,
				a.comment, 		
				DATE_FORMAT(a.dt_create,'%d-%m-%Y %H:%m') AS dt_create 
		 		FROM
				mst a 
	 			WHERE 1 = 1 ";
        
        $sql_search=$sql_full;
        // getting records as per search parameters
        if( !empty($requestData['columns'][0]['search']['value']) ){ //name
        $sql_search.=" AND mst_code LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
        } 
        if( !empty($requestData['columns'][1]['search']['value']) ){  //salary
        $sql_search.=" AND name_en  LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
        }
        if( !empty($requestData['columns'][2]['search']['value']) ){  //salary
        $sql_search.=" AND a.name_th LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
        }
        $data = array(
        	'sql_full' => $sql_full,
        	'sql_search' => $sql_search 
        );
        return $data;
	  }

public function getMst($id){
	  $sql = "
			SELECT
				a.id_mst,
				a.id_mdept,
				a.id_mcmp,
				a.mst_code,
				a.name_en,
				a.name_th,
				a.status,
				a.comment, 
				b.name_th AS name_mdept,
				c.name_th AS name_mcmp,
				concat(i.firstname_th,' ',i.lastname_th) AS name_create,
				concat(i2.firstname_th,' ',i2.lastname_th) AS name_update,
				DATE_FORMAT(a.dt_create,'%d/%m/%Y %H:%m') AS dt_create,
				DATE_FORMAT(a.dt_update,'%d/%m/%Y %H:%m') AS dt_update
			FROM
				mst a
				LEFT JOIN memp i ON a.id_create=i.id_memp
				LEFT JOIN memp i2 ON a.id_update=i2.id_memp
				LEFT JOIN mdept b ON a.id_mdept=b.id_mdept
				LEFT JOIN mcmp c ON a.id_mcmp=c.id_mcmp	";
					
				if($id != ""){
					 $sql .= " WHERE a.id_mst='$id' ";
			}
// echo $sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	  }

public function getMdept(){
	  $sql = "
				SELECT
				a.id_mdept,a.name_th
				FROM
				mdept a
				WHERE a.status=1 ";
			$query = $this->db->query($sql);
			return  $query->result();
 	  }

public function getmcmp(){
	  $sql = "
				SELECT
				a.id_mcmp,a.name_th
				FROM
				mcmp a
				WHERE a.status=1 ";
			$query = $this->db->query($sql);
			return  $query->result();
 	  }

public function getCodeLast($mcmp_code){
	$sql = "SELECT chuphotic.fn_gen_memp_code('".$mcmp_code."') AS code";
	$query = $this->db->query($sql); 
	if($query->num_rows()>'0'){
		$row = $query->row();
		if($row->code != ""){
			return  $row->code;
		}else{
			return '0';
		}
	}else{
		return '0';
	}
}

public function getUser($user){
	  $sql = "
				SELECT
				a.id_memp
				FROM
				memp a
				WHERE  a.username='$user' ";
			$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{ 
			return "1";
		}else{ 
			return "0";
		}
}

public function checkOldPass($id,$pass){
	  $sql = "
				SELECT
				a.id_memp
				FROM
				memp a
				WHERE a.id_memp='$id' 
				AND a.userpassword='$pass' ";
			$query = $this->db->query($sql);
			return  $query->num_rows();
 	  }

   }
?>