<?php
   class mdl_mdspse_cat extends CI_Model
   {
      public function __construct()
      {
		parent::__construct(); 
      }

	  public function addMdspse_cat($data){
		$this->db->insert('mdspse_cat', $data);
	  }

	  public function updateMdspse_cat($id,$data){
		$this->db->where('id_mdspse_cat', $id);
		$this->db->update('mdspse_cat', $data);
	  }

 
 public function getList($requestData){

	 	$sql_full = "
              SELECT
				a.id_mdspse_cat,
				a.mdspse_cat_code,
				a.name_en,
				a.name_th,
				a.status,
				a.comment, 		
				DATE_FORMAT(a.dt_create,'%d/%m/%Y %H:%i:%s') AS dt_create 
		 		FROM
				mdspse_cat a 
	 			WHERE 1 = 1 ";
        
        $sql_search=$sql_full;
        // getting records as per search parameters
        if( !empty($requestData['columns'][0]['search']['value']) ){ //name
        $sql_search.=" AND a.mdspse_cat_code LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
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
        //echo($requestData['columns'][3]['search']['value']);
        //echo($sql_search);
        $data = array(
        	'sql_full' => $sql_full,
        	'sql_search' => $sql_search 
        );
        return $data;
	  }

public function getMdspse_cat($id){
	  $sql = "
			SELECT
				a.id_mdspse_cat,
				a.mdspse_cat_code,
				a.name_en,
				a.name_th,
				a.status,
				a.comment,
				concat(i.firstname_th,' ',i.lastname_th) AS name_create,
				concat(i2.firstname_th,' ',i2.lastname_th) AS name_update,
				DATE_FORMAT(a.dt_create,'%d/%m/%Y %H:%i:%s') AS dt_create,
				DATE_FORMAT(a.dt_update,'%d/%m/%Y %H:%i:%s') AS dt_update
				FROM
					mdspse_cat a
				LEFT JOIN memp i ON a.id_create=i.id_memp
				LEFT JOIN memp i2 ON a.id_update=i2.id_memp";
				
				if($id != ""){
					 $sql .= " WHERE a.id_mdspse_cat='$id' ";
			}
// echo $sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	  }
   }
?>