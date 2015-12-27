<?php
class Mdl_transfer extends CI_Model
{
	public function __construct()
	{
		parent::__construct(); 
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok')); 
		$this->datefrom = $now->format('Y-m-')."01";
		$this->dateto = $now->format('Y-m-d');
		$this->id_mbranch = $this->session->userdata("id_mbranch");
		$this->id_mposition=$this->session->userdata("id_mposition");
	}

	public function addTransfer($data){
		$this->db->insert('ttransfer', $data);
	}

	public function updateTransfer($id,$data){
		$this->db->where('id_transfer', $id);
		$this->db->update('ttransfer', $data);
	}

	public function updateStock($id,$data){
		$this->db->where('id_stock', $id);
		$this->db->update('tstock', $data);
	}

	public function convert_date($val_date)
	{
		$date = str_replace('/', '-',$val_date);
		$date = (date("Y", strtotime($date))-543).date("-m-d", strtotime($date));
		return $date;
	}

 
 	public function getList($requestData){

	 	$sql_full = "
            	SELECT 
					a.id_transfer,
					a.transfer_code, 
					CONCAT(DATE_FORMAT(a.transfer_date,'%d/%m/'),DATE_FORMAT(a.transfer_date,'%Y')+543 ) AS transfer_date,
					st.stock_code,
					CONCAT(DATE_FORMAT(st.stock_date,'%d/%m/'),DATE_FORMAT(st.stock_date,'%Y')+543 ) AS stock_date,
					c.mmodel_name,
					d.gen_name,
					e.color_name,
					f.zone_name,
					st.chassis_number,
					st.engine_number,
					b.mbranch_name AS mbranch_name_from,
					bt.mbranch_name AS mbranch_name_to,
					CASE a.status
						WHEN 1 THEN 'โยกรถแล้ว'
						WHEN 2 THEN 'รับเข้าแล้ว' 
						WHEN 0 THEN 'ยกเลิกโยกรถ'
					END AS status_name,
					a.status,
					a.comment 
				FROM ttransfer a 
				INNER JOIN mbranch b ON a.id_mbranch=b.id_mbranch
				INNER JOIN mbranch bt ON a.id_mbranch_recive=bt.id_mbranch
				INNER JOIN tstock st ON a.id_stock=st.id_stock
				INNER JOIN mmodel c ON st.id_mmodel=c.id_model
				INNER JOIN mgen d ON st.id_mgen=d.id_gen
				INNER JOIN mcolor e ON st.id_mcolor=e.id_color
				INNER JOIN mzone f ON st.id_zone=f.id_zone
	 			WHERE 1 = 1 ";
        
        $sql_search=$sql_full;
        // getting records as per search parameters
        if( !empty($requestData['columns'][0]['search']['value']) ){ //name
        	$sql_search.=" AND a.transfer_code LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
        } 
        if( !empty($requestData['columns'][1]['search']['value']) ){  //salary
        	$sql_search.=" AND st.chassis_number LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
        } 
        if( $requestData['columns'][2]['search']['value']!=""){  //salary
       		$sql_search.=" AND a.id_mbranch_recive LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
        } 
        
        if( !empty($requestData['columns'][3]['search']['value']) ){  //salary
        	$datefrom = $this->convert_date($requestData['columns'][3]['search']['value']);
        }else{
        	$datefrom = $this->datefrom;
        }
        if( !empty($requestData['columns'][4]['search']['value']) ){  //salary
        	$dateto = $this->convert_date($requestData['columns'][4]['search']['value']);
        }else{
        	$dateto = $this->dateto;
        }
        if($requestData['columns'][3]['search']['value'] !=''){  //salary
        	$sql_search.=" AND a.status= ".$requestData['columns'][3]['search']['value'];
        }else{
        	$sql_search.=" AND a.status='1' ";
        } 
        if($this->id_mposition > 1){
        	$sql_search.=" AND a.id_mbranch = '$this->id_mbranch' ";
        }
        $data = array(
        	'sql_full' => $sql_full,
        	'sql_search' => $sql_search 
        );
        return $data;
	}

	public function getTransfer($id){
	  $sql = "
				SELECT 
					a.id_transfer,
					a.transfer_code, 
					CONCAT(DATE_FORMAT(a.transfer_date,'%d/%m/'),DATE_FORMAT(a.transfer_date,'%Y')+543 ) AS transfer_date,
					a.id_stock,
					st.stock_code,
					CONCAT(DATE_FORMAT(st.stock_date,'%d/%m/'),DATE_FORMAT(st.stock_date,'%Y')+543 ) AS stock_date,
					c.mmodel_name,
					d.gen_name,
					e.color_name,
					f.zone_name,
					st.chassis_number,
					st.engine_number,
					CONCAT(DATE_FORMAT(st.recive_doc_date,'%d/%m/'),DATE_FORMAT(st.recive_doc_date,'%Y')+543 ) AS recive_doc_date,
					st.doc_reference_code,
					b.mbranch_name AS mbranch_name_from,
					a.id_mbranch_recive,
					bt.mbranch_name AS mbranch_name_to,
					CASE a.status
						WHEN 1 THEN 'โยกรถแล้ว'
						WHEN 2 THEN 'รับเข้าแล้ว' 
						WHEN 0 THEN 'ยกเลิกโยกรถ'
					END AS status_name,
					a.status,
					a.comment,
					concat(i.firstname,' ',i.lastname) AS name_create,
					concat(i2.firstname,' ',i2.lastname) AS name_update,
					CONCAT(DATE_FORMAT(a.dt_create,'%d/%m/'),DATE_FORMAT(a.dt_create,'%Y')+543, DATE_FORMAT(a.dt_create,' %H:%i')) AS dt_create,
					CONCAT(DATE_FORMAT(a.dt_update,'%d/%m/'),DATE_FORMAT(a.dt_update,'%Y')+543, DATE_FORMAT(a.dt_update,' %H:%i')) AS dt_update
				FROM ttransfer a 
				INNER JOIN mbranch b ON a.id_mbranch=b.id_mbranch
				INNER JOIN mbranch bt ON a.id_mbranch_recive=bt.id_mbranch
				INNER JOIN tstock st ON a.id_stock=st.id_stock
				INNER JOIN mmodel c ON st.id_mmodel=c.id_model
				INNER JOIN mgen d ON st.id_mgen=d.id_gen
				INNER JOIN mcolor e ON st.id_mcolor=e.id_color
				INNER JOIN mzone f ON st.id_zone=f.id_zone
				LEFT JOIN mmember i ON a.id_create=i.id_mmember
				LEFT JOIN mmember i2 ON a.id_update=i2.id_mmember 
	 			WHERE a.id_transfer='$id' "; 
 			// echo "<pre>".$sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	  } 

	public function getStock($typ,$code){ 
	  $sql = "
			SELECT 
				a.id_stock, 
				a.stock_code,  
				CONCAT(DATE_FORMAT(a.stock_date,'%d/%m/'),DATE_FORMAT(a.stock_date,'%Y')+543 ) AS stock_date,  
				a.chassis_number, 
				a.engine_number, 
				c.mmodel_name, 
				d.gen_name,
				e.color_name,
				CONCAT(DATE_FORMAT(a.recive_doc_date,'%d/%m/'),DATE_FORMAT(a.recive_doc_date,'%Y')+543 ) AS recive_doc_date,
				a.doc_reference_code, 
				f.zone_name
			FROM tstock a
			INNER JOIN mbranch b ON a.id_mbranch=b.id_mbranch
			INNER JOIN mmodel c ON a.id_mmodel=c.id_model
			INNER JOIN mgen d ON a.id_mgen=d.id_gen
			INNER JOIN mcolor e ON a.id_mcolor=e.id_color
			INNER JOIN mzone f ON a.id_zone=f.id_zone 
			WHERE a.id_mbranch= '$this->id_mbranch' "; 
			if($typ == 1){
				$sql .= " AND a.status =1 AND a.stock_code='$code' ";
			}else if($typ == 2){
				$sql .= " AND a.status =1 AND a.chassis_number='$code' ";
			}else if($typ == 3){
				$sql .= " AND a.stock_code='$code' ";
			}else if($typ == 4){
				$sql .= " AND a.chassis_number='$code' ";
			}
 		// echo "<pre>".$sql;
			$query = $this->db->query($sql);
			if($query->num_rows()>0){
				return  $query->result_array();
			} else{
				return false;
			}
			
 	  } 

 	public function getCode(){
 		$sql = "
 			SELECT
			  IFNULL(CONCAT('TF',b.mbranch_code,DATE_FORMAT(NOW(),'%yy')+43,DATE_FORMAT(NOW(),'%m'),lpad( (co.num+1), 4, '0')),CONCAT('TF',b.mbranch_code,DATE_FORMAT(NOW(),'%yy')+43,DATE_FORMAT(NOW(),'%m'),'0001'))AS CODE
			FROM  mbranch b  
			LEFT JOIN (
			 	SELECT COUNT(id_transfer) AS num,id_mbranch
				 FROM ttransfer
				 WHERE id_mbranch='$this->id_mbranch'
				 AND DATE_FORMAT(transfer_date,'%Y')=DATE_FORMAT(NOW(),'%Y')
				 AND DATE_FORMAT(transfer_date,'%m')=DATE_FORMAT(NOW(),'%m')
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
			WHERE a.status = 1 
			AND a.id_mbranch <> '$this->id_mbranch' ";
		// echo $sql;
		$query = $this->db->query($sql);
		return  $query->result();
 	}
}?>