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

	public function addStock($data){
		$this->db->insert('tstock', $data);
	}

	public function updateStock($id,$data){
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
				a.status AS sta,
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
        if($requestData['columns'][4]['search']['value'] =='all'){  //salary
        	$sql_search.=" AND a.status IN (0,1,2,3,4)";
        }else if($requestData['columns'][4]['search']['value'] ==''){
        	$sql_search.=" AND a.status=1";
        }else{
        	$sql_search.=" AND a.status= ".$requestData['columns'][4]['search']['value'];
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
				a.id_transfer, 
				a.chassis_number, 
				a.engine_number,
				a.id_mmodel,
				c.mmodel_name,
				a.id_mgen,
				d.gen_name,
				a.id_mcolor,
				e.color_name,
				a.chassis_number,
				a.engine_number, 
				CONCAT(DATE_FORMAT(a.recive_doc_date,'%d/%m/'),DATE_FORMAT(a.recive_doc_date,'%Y')+543 ) AS recive_doc_date,
				a.doc_reference_code,
				a.id_zone,
				f.zone_name,
				a.comment, 
				a.status,
				concat(i.firstname,' ',i.lastname) AS name_create,
				concat(i2.firstname,' ',i2.lastname) AS name_update,
				CONCAT(DATE_FORMAT(a.dt_create,'%d/%m/'),DATE_FORMAT(a.dt_create,'%Y')+543, DATE_FORMAT(a.dt_create,' %H:%i')) AS dt_create,
				CONCAT(DATE_FORMAT(a.dt_update,'%d/%m/'),DATE_FORMAT(a.dt_update,'%Y')+543, DATE_FORMAT(a.dt_update,' %H:%i')) AS dt_update
			FROM tstock a
			INNER JOIN mbranch b ON a.id_mbranch=b.id_mbranch
			INNER JOIN mmodel c ON a.id_mmodel=c.id_model
			INNER JOIN mgen d ON a.id_mgen=d.id_gen
			INNER JOIN mcolor e ON a.id_mcolor=e.id_color
			INNER JOIN mzone f ON a.id_zone=f.id_zone 
			LEFT JOIN mmember i ON a.id_create=i.id_mmember
			LEFT JOIN mmember i2 ON a.id_update=i2.id_mmember  
			WHERE a.id_stock='$id' ";
 		// echo "<pre>".$sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	  } 

 	public function getCode(){
 		$sql = "
 			SELECT
			  IFNULL(CONCAT('ST',b.mbranch_code,DATE_FORMAT(NOW(),'%yy')+43,DATE_FORMAT(NOW(),'%m'),lpad( (co.num+1), 4, '0')),CONCAT('ST',b.mbranch_code,DATE_FORMAT(NOW(),'%yy')+43,DATE_FORMAT(NOW(),'%m'),'0001'))AS CODE
			FROM  mbranch b  
			LEFT JOIN (
			 SELECT COUNT(id_stock) AS NUM,id_mbranch
			 FROM tstock
			 WHERE id_mbranch='$this->id_mbranch' 
			 AND DATE_FORMAT(stock_date,'%Y')=DATE_FORMAT(NOW(),'%Y')
			 AND DATE_FORMAT(stock_date,'%m')=DATE_FORMAT(NOW(),'%m')
			) AS co ON b.id_mbranch=co.id_mbranch
			WHERE b.id_mbranch='$this->id_mbranch'
 		";
		$query = $this->db->query($sql);
		$result = $query->row();
		return $result->CODE;
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

 	public function getmgen($id_model){
	  $sql = "
			SELECT
				a.id_gen,a.gen_name
			FROM
				mgen a
			WHERE a.status = 1 
			AND a.id_model='$id_model' ";
		// echo $sql;
		$query = $this->db->query($sql);
		return  $query->result();
 	}
 	public function getMcolor($id_gen){
	  $sql = "
			SELECT
				a.id_color,a.color_name
			FROM
				mcolor a
			WHERE a.status = 1 
			AND a.id_gen='$id_gen'  ";
		// echo $sql;
		$query = $this->db->query($sql);
		return  $query->result();
 	}


}?>