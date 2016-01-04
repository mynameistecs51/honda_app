<?php
   class Mdl_report_stock extends CI_Model
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


 	public function getmzone($id_mbranch){
	  $sql = "
			SELECT
			a.id_zone,a.zone_name
			FROM
			mzone a
			WHERE a.status = 1 
			AND a.id_mbranch='$id_mbranch' ";
		// echo $sql;
		$query = $this->db->query($sql);
		return  $query->result();
 	}
 	
}?>