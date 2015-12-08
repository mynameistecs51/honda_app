<?php
   class mdl_minv extends CI_Model
   {
      public function __construct()
      {
		parent::__construct(); 
      }

	  public function addMinv($data){
		$this->db->insert('minv', $data);
	  }

	  public function updateMinv($id,$data){
		$this->db->where('id_minv', $id);
		$this->db->update('minv', $data);
	  }

 
 public function getList($requestData){

	 	$sql_full = "
              SELECT
				a.id_minv,
				a.minv_code,
				a.name_en,
				a.name_th,
				a.status,
				a.comment, 		
				DATE_FORMAT(a.dt_create,'%d-%m-%Y %H:%m') AS dt_create 
		 		FROM
				minv a 
	 			WHERE 1 = 1 ";
        
        $sql_search=$sql_full;
        // getting records as per search parameters
        if( !empty($requestData['columns'][0]['search']['value']) ){ //name
        $sql_search.=" AND minv_code LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
        } 
        if( !empty($requestData['columns'][1]['search']['value']) ){  //salary
        $sql_search.=" AND name_en  LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
        }
        if( !empty($requestData['columns'][2]['search']['value']) ){  //salary
        $sql_search.=" AND a.name_th LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
        }
        if($requestData['columns'][3]['search']['value'] !=''){  //salary
        $sql_search.=" AND a.status= ".$requestData['columns'][3]['search']['value'];
        }
        $data = array(
        	'sql_full' => $sql_full,
        	'sql_search' => $sql_search 
        );
        return $data;
	  }

public function getMinv($id){
	  $sql = "
			SELECT
				a.id_minv,
				a.id_minv_cat,
				a.id_minv_unt,
				a.id_mcmp,
				a.minv_code,
				a.name_en,
				a.name_th,
				a.brand,
				a.rated_power,
				a.status,
				a.comment, 
				b.name_th AS name_minv_cat,
				c.name_th AS name_minv_unt,
				d.name_th AS name_mcmp,
				concat(i.firstname_th,' ',i.lastname_th) AS name_create,
				concat(i2.firstname_th,' ',i2.lastname_th) AS name_update,
				DATE_FORMAT(a.dt_create,'%d/%m/%Y %H:%i:%s') AS dt_create,
				DATE_FORMAT(a.dt_update,'%d/%m/%Y %H:%i:%s') AS dt_update
			FROM
				minv a
			LEFT JOIN memp i ON a.id_create=i.id_memp
			LEFT JOIN memp i2 ON a.id_update=i2.id_memp
			LEFT JOIN minv_cat b ON a.id_minv_cat=b.id_minv_cat
			LEFT JOIN minv_unt c ON a.id_minv_unt=c.id_minv_unt
			LEFT JOIN mcmp d ON a.id_mcmp=d.id_mcmp	";
				
				if($id != ""){
					 $sql .= " WHERE a.id_minv='$id' ";
			}
// echo $sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	  }

public function getMinv_cat(){
	  $sql = "
				SELECT
				a.id_minv_cat,a.name_th
				FROM
				minv_cat a
				WHERE a.status=1 ";
			$query = $this->db->query($sql);
			return  $query->result();
 	  }

public function getMinv_unt(){
	  $sql = "
				SELECT
				a.id_minv_unt,a.name_th
				FROM
				minv_unt a
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

   }
?>