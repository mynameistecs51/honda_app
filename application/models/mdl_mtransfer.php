<?php
   class Mdl_mtransfer extends CI_Model
   {
      public function __construct()
      {
		parent::__construct(); 
      }

	  public function addmbranch($data){
		$this->db->insert('mbranch', $data);
	  }

	  public function updatembranch($id,$data){
		$this->db->where('id_mbranch', $id);
		$this->db->update('mbranch', $data);
	  }

 
 public function getList($requestData){

	 	$sql_full = "
              SELECT
				a.id_mbranch,
				a.mbranch_code,
				a.mbranch_name, 
				a.status,
				a.comment
		 		FROM
				mbranch a  
	 			WHERE 1 = 1 ";
        
        $sql_search=$sql_full;
        // getting records as per search parameters
        if( !empty($requestData['columns'][0]['search']['value']) ){ //name
        $sql_search.=" AND a.mbranch_code LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
        } 
        if( !empty($requestData['columns'][1]['search']['value']) ){  //salary
        $sql_search.=" AND a.mbranch_name  LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
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

public function getStock($id){
	  $sql = "
			SELECT
				a.id_mbranch,
				a.mbranch_code,
				a.mbranch_name, 
				a.status,
				a.comment,
				concat(i.firstname,' ',i.lastname) AS name_create,
				concat(i2.firstname,' ',i2.lastname) AS name_update,
				DATE_FORMAT(a.dt_create,'%d/%m/%Y %H:%i:%s') AS dt_create,
				DATE_FORMAT(a.dt_update,'%d/%m/%Y %H:%i:%s') AS dt_update
				FROM
					mbranch a
				LEFT JOIN mmember i ON a.id_create=i.id_mmember
				LEFT JOIN mmember i2 ON a.id_update=i2.id_mmember ";
				
				if($id != ""){
					 $sql .= " WHERE a.id_mbranch='$id' ";
			}
 // echo "<pre>".$sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	  }
   }
?>