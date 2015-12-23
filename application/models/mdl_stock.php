<?php
   class Mdl_stock extends CI_Model
   {
    public function __construct()
    {
		parent::__construct(); 
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
		$this->datefrom = $now->format('Y-m-')."01";
		$this->dateto = $now->format('Y-m-d');
		$this->id_mbranch = $this->session->userdata("id_mbranch") != '' ? $this->session->userdata("id_mbranch"):1;
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
					CONCAT(DATE_FORMAT(a.stock_date,'%d/%m/'),DATE_FORMAT(a.stock_date,'%Y')+543 ) AS stock_date, 
					b.mbranch_name,
					CASE a.is_recive_type
						WHEN 1 THEN 'รับเข้าใหม่'
						WHEN 2 THEN 'รับโอนจากสาขาอื่น'
					END AS is_recive_type, 
					a.id_transfer, 
					a.chassis_number, 
					a.engine_number,
					c.mmodel_name,
					d.gen_name,
					e.color_name,
					a.chassis_number,
					a.engine_number, 
					CONCAT(DATE_FORMAT(a.recive_doc_date,'%d/%m/'),DATE_FORMAT(a.recive_doc_date,'%Y')+543 ) AS recive_doc_date,
					a.doc_reference_code,  
					f.zone_name,
					a.comment, 
					CASE a.status
						WHEN 1 THEN 'รับเข้าสต๊อก'
						WHEN 2 THEN 'จองแล้ว'
						WHEN 3 THEN 'จำหน่ายแล้ว'
						WHEN 4 THEN 'โยกไปสาขาอื่น'
						WHEN 0 THEN 'ยกเลิกการรับ'
					END AS status
				FROM tstock a
				INNER JOIN mbranch b ON a.id_mbranch=b.id_mbranch
				INNER JOIN mmodel c ON a.id_mmodel=c.id_model
				INNER JOIN mgen d ON a.id_mgen=d.id_gen
				INNER JOIN mcolor e ON a.id_mcolor=e.id_color
				INNER JOIN mzone f ON a.id_zone=f.id_zone
	 			WHERE 1 = 1 ";
        $sql_search=$sql_full;
        // getting records as per search parameters
        if( !empty($requestData['columns'][0]['search']['value']) ){ //name
        	$sql_search.=" AND a.stock_code LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
        } 
        if( !empty($requestData['columns'][5]['search']['value']) ){ //name
        	$sql_search.=" AND a.chassis_number LIKE '%".$requestData['columns'][5]['search']['value']."%' ";
        } 
        if( !empty($requestData['columns'][1]['search']['value']) ){  //salary
        	$sql_search.=" AND a.id_mbranch =".$requestData['columns'][1]['search']['value']."";
        }else{
        	$sql_search.=" AND a.id_mbranch =".$this->id_mbranch."";
        } 
        if( !empty($requestData['columns'][2]['search']['value']) ){  //salary
        	$datefrom = $this->convert_date($requestData['columns'][2]['search']['value']);
        }else{
        	$datefrom = $this->datefrom;
        }
        if( !empty($requestData['columns'][3]['search']['value']) ){  //salary
        	$dateto = $this->convert_date($requestData['columns'][3]['search']['value']);
        }else{
        	$dateto = $this->dateto;
        }
        if($requestData['columns'][4]['search']['value'] !=''){  //salary
        	$sql_search.=" AND a.status= ".$requestData['columns'][4]['search']['value'];
        }else{
        	$sql_search.=" AND a.status=1";
        }
        $sql_search.=" AND a.stock_date BETWEEN '".$datefrom."' AND '".$dateto."' ";

      // echo "<pre>".$sql_search;
        $data = array(
        	'sql_full' => $sql_full,
        	'sql_search' => $sql_search 
        );
        return $data;
	  }

	public function convert_date($val_date)
	{
		$date = str_replace('/', '-',$val_date);
		$date = (date("Y", strtotime($date))-543).date("-m-d", strtotime($date));
		return $date;
	}

	public function getStock($id){
	  $sql = "
			SELECT 
				a.id_stock, 
				a.stock_code,  
				CONCAT(DATE_FORMAT(a.stock_date,'%d/%m/'),DATE_FORMAT(a.stock_date,'%Y')+543 ) AS stock_date, 
				b.mbranch_name,
				CASE a.is_recive_type
					WHEN 1 THEN 'รับเข้าใหม่'
					WHEN 2 THEN 'รับโอนจากสาขาอื่น'
				END AS is_recive_type, 
				a.id_transfer, 
				a.chassis_number, 
				a.engine_number,
				c.mmodel_name,
				d.gen_name,
				e.color_name,
				a.chassis_number,
				a.engine_number, 
				CONCAT(DATE_FORMAT(a.recive_doc_date,'%d/%m/'),DATE_FORMAT(a.recive_doc_date,'%Y')+543 ) AS recive_doc_date,
				a.doc_reference_code,  
				f.zone_name,
				a.comment, 
				CASE a.status
					WHEN 1 THEN 'รับเข้าสต๊อก'
					WHEN 2 THEN 'จองแล้ว'
					WHEN 3 THEN 'จำหน่ายแล้ว'
					WHEN 4 THEN 'โยกไปสาขาอื่น'
					WHEN 0 THEN 'ยกเลิกการรับ'
				END AS status
			FROM tstock a
			INNER JOIN mbranch b ON a.id_mbranch=b.id_mbranch
			INNER JOIN mmodel c ON a.id_mmodel=c.id_model
			INNER JOIN mgen d ON a.id_mgen=d.id_gen
			INNER JOIN mcolor e ON a.id_mcolor=e.id_color
			INNER JOIN mzone f ON a.id_zone=f.id_zone ";
				
			if($id != ""){
				 $sql .= " WHERE a.id_stock='$id' ";
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

 	public function getchassisNumber($code,$id_mbranch){
	  $sql = "
				SELECT
				a.id_stock
				FROM
				tstock a
				WHERE  a.chassis_number='$code' 
				AND a.status=1 
				AND a.id_mbranch='$id_mbranch' ";
			$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			return "1";
		}else{
			return "0";
		}
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

 	public function getmmodel(){
	  $sql = "
			SELECT
				a.id_model,a.mmodel_name
			FROM
				mmodel a
			WHERE a.status = 1 ";
		// echo $sql;
		$query = $this->db->query($sql);
		return  $query->result();
 	}

 	public function getmgen(){
	  $sql = "
			SELECT
				a.id_gen,a.gen_name
			FROM
				mgen a
			WHERE a.status = 1 ";
		// echo $sql;
		$query = $this->db->query($sql);
		return  $query->result();
 	}
 	public function getmcolor(){
	  $sql = "
			SELECT
				a.id_color,a.color_name
			FROM
				mcolor a
			WHERE a.status = 1 ";
		// echo $sql;
		$query = $this->db->query($sql);
		return  $query->result();
 	}


}?>