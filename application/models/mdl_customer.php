<?php
class Mdl_customer extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getTypeSale()
	{
		$sql = '
		SELECT m.firstname,m.lastname,m.id_mmember,m.mmember_code,p.mposition_code
		FROM mmember m
		INNER JOIN mposition p ON m.id_mposition = p.id_mposition
		WHERE p.mposition_code ="SALE"  ';
		$query_sql = $this->db->query($sql)->result_array();
		return  $query_sql;
	}

	public function addcustomer($data){
		$this->db->insert('tcustomer', $data);
		$last_id = $this->db->insert_id();
		return $last_id;
	}

	public function insert_customerAtt($model_Att)
	{
		$this->db->insert('tcustomer_car_att',$model_Att);
	}

	public function update_customer($id,$data)
	{
		$this->db->where('id_customer',$id);
		$this->db->update('tcustomer',$data);
	}

	public function update_customerAtt($id,$data_carAtt)
	{
		// delete array car Att
		$this->db->where('id_customer',$id);
		$this->db->delete('tcustomer_car_att');
		// update data_carAtt //
		$this->db->where('id_customer',$id);
		$this->db->insert('tcustomer_car_att',$data_carAtt);
		// echo $id,"<----";
		// print_r($data_carAtt);
	}

	public function updatemmember($id,$data){
		$this->db->where('id_mmember', $id);
		$this->db->update('mmember', $data);
	}

	public function getList($requestData){

		$sql_full = "
			SELECT
				cus.id_customer,cus.customer_code,
				CONCAT((CASE cus.id_tit
					WHEN 1 THEN 'ไม่ระบบ'
					WHEN 2 THEN 'นาย'
					WHEN 3 THEN 'นาง'
					WHEN 4 THEN 'นางสาว'
				END),' ',cus.firstname,' ',cus.lastname) AS cusName,
				CASE cus.is_cus_new
					WHEN 1 THEN 'ลูกค้าใหม่'
					WHEN 2 THEN 'ลูกค้าเก่า'
				END AS type,
				CASE cus.is_cus_new
					WHEN 1 THEN 'ลูกค้า VIP'
					WHEN 2 THEN 'ลูกค้าจงรักภักดี'
					WHEN 3 THEN 'ลูกค้าทั่วไป'
				END AS cus_new,
				br.mbranch_name,
				CASE cus.is_company
					WHEN 1 THEN 'บุคคล'
					WHEN 2 THEN 'บริษัท'
				END AS company,
				cus.mobile,
				cus.status,
				cus.customer_date,
				cus.sales_consultants,
				CONCAT(( CASE mem.id_mmember_tit
					WHEN 1 THEN 'นาย'
					WHEN 2 THEN 'นาง'
					WHEN 3 THEN 'นางสาว'
				END),' ',mem.firstname,' ',mem.lastname) AS consultants,
				cus_att.id_model,
				mo.mmodel_name,
				gen.gen_name,
				color.color_name,
				cus.comment
			FROM tcustomer cus
			INNER JOIN mbranch br ON cus.id_mbranch = br.id_mbranch
			INNER JOIN mmember mem ON cus.sales_consultants = mem.id_mmember
			INNER JOIN tcustomer_car_att cus_att ON cus.id_customer = cus_att.id_customer
			INNER JOIN mmodel mo ON cus_att.id_model = mo.id_model
			INNER JOIN mgen gen ON cus_att.id_gen = gen.id_gen
			INNER JOIN mcolor color ON cus_att.id_color = color.id_color
			WHERE 1 = 1
			";
			$sql_search=$sql_full;
			        // getting records as per search parameters
			        if( !empty($requestData['columns'][0]['search']['value']) ){ //customer code
			        	$sql_search.=" AND cus.id_customer LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
			        }
			        if( !empty($requestData['columns'][1]['search']['value']) ){ //name
			        	$sql_search.=" AND cusName LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
			        }
			        if( !empty($requestData['columns'][2]['search']['value']) ){  //mobile
			        	$sql_search.=" AND cus.mobile =".$requestData['columns'][2]['search']['value']."";
			        }else{
			        	$sql_search.=" AND cus.id_mbranch =".$this->id_mbranch." GROUP BY cus_att.id_customer";
			        }


			      // echo "<pre>".$sql_search;
			        $data = array(
			        	'sql_full' => $sql_full,
			        	'sql_search' => $sql_search
			        	);
			        return $data;
			     }

			     public function getCustomer($id){
			     	$sql = "
			     	SELECT
				     	cus.id_customer,
				     	cus.customer_code,
				     	CONCAT(
				     		DATE_FORMAT(cus.customer_date,'%d/%m/'),
				     		DATE_FORMAT(cus.customer_date,'%Y')+543 ) 
					AS customer_date,
					cus.bye_date,
					cus.accounts_receivable,
					cus.is_cus_new,
					cus.is_type,
					cus.is_company,
					cus.id_tit,
					cus.is_car_type,
					cus.firstname,
					cus.lastname,
					CONCAT(
						DATE_FORMAT(cus.birth_date,'%d/%m/'),
						DATE_FORMAT(cus.birth_date,'%Y')+543 ) 
					AS birth_date,
					cus.adr_line,
					cus.post_code,
					cus.id_mdistric,
					cus.idcard_number,
					cus.driver_card_number,
					cus.email,
					cus.telephone,
					cus.mobile,
					CONCAT(
						(CASE mem.id_mmember_tit 
							WHEN 1 THEN 'นาย' 
							WHEN 2 THEN 'นาง' 
							WHEN 3 THEN 'นางสาว' 
						END),' ',mem.firstname,' ',mem.lastname)
					AS member_name,
					cus.sales_consultants,
					cus.customer_source,
					cus.reason,
					cus.id_mbranch,
					cus.comment,
					cus.status,
					br.mbranch_name,
					mo.mmodel_name,
					gen.gen_name,
					color.color_name,
					cus_att.id_customer_car_att AS att_id_customer,
					cus_att.id_model,
					cus_att.id_gen,
					cus_att.id_color
				FROM tcustomer cus
				INNER JOIN mbranch br ON cus.id_mbranch = br.id_mbranch
				INNER JOIN mmember mem ON cus.sales_consultants = mem.id_mmember
				INNER JOIN tcustomer_car_att cus_att ON cus.id_customer = cus_att.id_customer
				INNER JOIN mmodel mo ON cus_att.id_model = mo.id_model
				INNER JOIN mgen gen ON cus_att.id_gen = gen.id_gen
				INNER JOIN mcolor color ON cus_att.id_color = color.id_color
				";
		if($id != ""){
			$sql .= "WHERE cus.id_customer='$id' ";
		}
		// echo $sql;
		$query = $this->db->query($sql);
		return  $query->result();
		}

public function getmposition(){
	$sql = "
	SELECT
	a.id_mposition,a.mposition_name
	FROM
	mposition a
	WHERE a.status=1 ";
// echo $sql;
	$query = $this->db->query($sql);
	return  $query->result();
}

public function getMbranch(){
	$sql = "
	SELECT
	a.id_mbranch,a.mbranch_code,a.mbranch_name
	FROM
	mbranch a
	WHERE a.status=1 ";
// echo $sql;
	$query = $this->db->query($sql);
	return  $query->result();
}

public function getCodeCustomer(){
	$sql = "
	SELECT
	IFNULL(CONCAT('CU',b.mbranch_code,DATE_FORMAT(NOW(),'%yy')+43,DATE_FORMAT(NOW(),'%m'),lpad( (co.num+1), 4, '0')),CONCAT('ST',b.mbranch_code,DATE_FORMAT(NOW(),'%yy')+43,DATE_FORMAT(NOW(),'%m'),'0001'))AS CODE
	FROM  mbranch b
	LEFT JOIN (
		SELECT COUNT(id_customer) AS NUM,id_mbranch
		FROM tcustomer
		WHERE id_mbranch='$this->id_mbranch'
		AND DATE_FORMAT(customer_date,'%Y')=DATE_FORMAT(NOW(),'%Y')
		AND DATE_FORMAT(customer_date,'%m')=DATE_FORMAT(NOW(),'%m')
		) AS co ON b.id_mbranch=co.id_mbranch
WHERE b.id_mbranch='$this->id_mbranch'
";
$query = $this->db->query($sql)->result();
foreach ($query as $rowQuery) {
	$getCode = $rowQuery->CODE;
}
return $getCode;
}

public function getUser($user){
	$sql = "
	SELECT
	a.id_mmember
	FROM
	mmember a
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
	a.id_mmember
	FROM
	mmember a
	WHERE a.id_mmember='$id'
	AND a.userpassword='$pass' ";
	$query = $this->db->query($sql);
	return  $query->num_rows();
}

}
?>