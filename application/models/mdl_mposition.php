<?php
   class Mdl_mposition extends CI_Model
   {
      public function __construct()
      {
		parent::__construct(); 
      }

	  public function addmposition($data){
		$this->db->insert('mposition', $data);
	  }

	  public function updatemposition($id,$data){
		$this->db->where('id_mposition', $id);
		$this->db->update('mposition', $data);
	  }

 
 public function getList($requestData){

	 	$sql_full = "
              SELECT
				a.id_mposition,
				a.mposition_code,
				a.mposition_name,
				b.mbranch_name,
				a.status,
				a.comment, 	
				DATE_FORMAT(a.dt_create,'%d/%m/%Y %H:%i:%s') AS dt_create 
		 		FROM
				mposition a 
				LEFT JOIN mbranch b ON a.id_mbranch=b.id_mbranch
	 			WHERE  a.id_mposition >1 ";
        
        $sql_search=$sql_full;
        // getting records as per search parameters
        if( !empty($requestData['columns'][0]['search']['value']) ){ //name
        $sql_search.=" AND a.mposition_code LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
        } 
        if( !empty($requestData['columns'][1]['search']['value']) ){  //salary
        $sql_search.=" AND mposition_name  LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
        }
        if( !empty($requestData['columns'][2]['search']['value']) ){  //salary
        $sql_search.=" AND a.id_mbranch LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
        }
        if($requestData['columns'][3]['search']['value'] !=''){  //salary
        $sql_search.=" AND a.status= ".$requestData['columns'][3]['search']['value'];
        }
        //echo($requestData['columns'][3]['search']['value']);
        //echo($sql_search);
        $data = array(
        	'sql_full' => $sql_full,
        	'sql_search' => $sql_search 
        );
        return $data;
	  }

	public function getmposition($id){
	  $sql = "
			SELECT
				a.id_mposition,
				a.mposition_code,
				a.mposition_name,
				a.id_mbranch,
				a.status,
				a.comment,
				concat(i.firstname,' ',i.lastname) AS name_create,
				concat(i2.firstname,' ',i2.lastname) AS name_update,
				DATE_FORMAT(a.dt_create,'%d/%m/%Y %H:%i:%s') AS dt_create,
				DATE_FORMAT(a.dt_update,'%d/%m/%Y %H:%i:%s') AS dt_update
				FROM
					mposition a
				LEFT JOIN mmember i ON a.id_create=i.id_mmember
				LEFT JOIN mmember i2 ON a.id_update=i2.id_mmember ";
				
				if($id != ""){
					 $sql .= " WHERE a.id_mposition='$id' ";
			}
	// echo $sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	}

 	public function getCode($code){
	  $sql = "
				SELECT
				a.mposition_code
				FROM
				mposition a
				WHERE  a.mposition_code='$code' ";
			$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			return "1";
		}else{
			return "0";
		}
	}
}?>