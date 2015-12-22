<?php
   class Mdl_stock extends CI_Model
   {
    public function __construct()
    {
		parent::__construct(); 
    }

	public function addTstock($data){
		$this->db->insert('tstock', $data);
	}

	public function updatembranch($id,$data){
		$this->db->where('id_stock', $id);
		$this->db->update('tstock', $data);
	}

	public function getList($requestData){

	 	$sql_full = "
              	SELECT 
					a.id_stock, 
					a.stock_code, 
					a.stock_date, 
					a.id_mbranch, 
					a.is_recive_type, 
					a.id_transfer, 
					a.chassis_number, 
					a.engine_number, 
					a.id_mmodel, 
					a.id_mgen, 
					a.id_mcolor, 
					a.recive_doc_date, 
					a.doc_reference_code, 
					a.id_zone, 
					a.comment, 
					a.status 
				FROM tstock a
	 			WHERE 1 = 1 ";
        
        $sql_search=$sql_full;
        // getting records as per search parameters
        if( !empty($requestData['columns'][0]['search']['value']) ){ //name
        $sql_search.=" AND a.stock_code LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
        } 
        if( !empty($requestData['columns'][1]['search']['value']) ){  //salary
        $sql_search.=" AND a.id_mbranch =".$requestData['columns'][1]['search']['value']."";
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

	public function getmbranch(){
	  $sql = "
			SELECT
			a.id_mbranch,a.mbranch_name
			FROM
			mbranch a
			WHERE a.status = 1 ";
		// echo $sql;
		$query = $this->db->query($sql);
		return  $query->result();
 	}


}?>