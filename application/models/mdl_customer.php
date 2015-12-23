<?php
class Mdl_customer extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getTypeSale()
	{
		$sql = 'SELECT m.firstname,m.lastname,m.id_mmember,p.mposition_code FROM mmember m INNER JOIN mposition p ON m.id_mposition = p.id_mposition WHERE p.mposition_code ="PS002" ';
		$query_sql = $this->db->query($sql)->result_array();
		return  $query_sql;
	}

	public function addcustomer($data){
		$this->db->insert('tcustomer', $data);
	}

	public function updatemmember($id,$data){
		$this->db->where('id_mmember', $id);
		$this->db->update('mmember', $data);
	}

	public function getList($requestData){

		$sql_full = "
		SELECT
		a.id_mmember,
		a.mmember_code,
		concat(a.firstname,' ',a.lastname) AS mmember_name,
		a.email,
		a.mobile,
		a.username AS user,
		a.status,
		a.comment,
		c.mposition_name ,
		DATE_FORMAT(a.dt_create,'%d-%m-%Y %H:%m') AS dt_create
		FROM
		mmember a
		LEFT JOIN mposition AS c ON a.id_mposition=c.id_mposition
		WHERE 1 = 1 ";

		$sql_search=$sql_full;
        // getting records as per search parameters
        if( !empty($requestData['columns'][0]['search']['value']) ){ //name
        	$sql_search.=" AND a.mmember_code LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
        }
        if( !empty($requestData['columns'][1]['search']['value']) ){  //salary
        	$sql_search.=" AND concat(a.firstname,a.lastname) LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
        }
        if( !empty($requestData['columns'][2]['search']['value']) ){  //salary
        	$sql_search.=" AND a.username LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
        }
        if( !empty($requestData['columns'][3]['search']['value']) ){  //salary
        	$sql_search.=" AND a.mobile LIKE '%".$requestData['columns'][3]['search']['value']."%' ";
        }
     	if($requestData['columns'][4]['search']['value'] !=''){  //salary
     		$sql_search.=" AND a.status= ".$requestData['columns'][4]['search']['value'];
     	}

     	$data = array(
     		'sql_full' => $sql_full,
     		'sql_search' => $sql_search
     		);
     	return $data;
     }

     public function getemployee($id){
     	$sql = "
     	SELECT
     	a.id_mmember,
     	a.id_mposition,
     	c.id_mbranch,
     	a.sex,
     	a.mmember_code,
     	a.id_mmember_tit,
     	concat(a.firstname,' ',a.lastname) AS mmember_name,
     	a.firstname,
     	a.lastname,
     	CONCAT(DATE_FORMAT(a.birthdate,'%d/'),DATE_FORMAT(a.birthdate,'%m/'),DATE_FORMAT(a.birthdate,'%Y')+543) as birthdate,
     	CONCAT(DATE_FORMAT(a.startdate,'%d/'),DATE_FORMAT(a.startdate,'%m/'),DATE_FORMAT(a.startdate,'%Y')+543) as startdate,
     	CONCAT(DATE_FORMAT(a.resigndate,'%d/'),DATE_FORMAT(a.resigndate,'%m/'),DATE_FORMAT(a.resigndate,'%Y')+543) as resigndate,
     	a.idcard_num,
     	a.drv_lcn_num,
     	a.email,
     	a.telephone,
     	a.mobile,
     	a.fax,
     	a.username AS user,
     	a.status,
     	a.adr_line1,
     	a.adr_line2,
     	a.comment,
     	c.mposition_name,
     	d.mbranch_name,
     	concat(i.firstname,' ',i.lastname) AS name_create,
     	concat(i2.firstname,' ',i2.lastname) AS name_update,
     	DATE_FORMAT(a.dt_create,'%d/%m/%Y %H:%i:%s') AS dt_create,
     	DATE_FORMAT(a.dt_update,'%d/%m/%Y %H:%i:%s') AS dt_update
     	FROM
     	mmember a
     	LEFT JOIN mposition c ON a.id_mposition=c.id_mposition
     	LEFT JOIN mbranch d ON c.id_mbranch=d.id_mbranch
     	LEFT JOIN mmember i ON a.id_create=i.id_mmember
     	LEFT JOIN mmember i2 ON a.id_update=i2.id_mmember
     	";
     	if($id != ""){
     		$sql .= " WHERE a.id_mmember='$id' ";
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
     	a.id_mbranch,a.mbranch_name
     	FROM
     	mbranch a
     	WHERE a.status=1 ";
// echo $sql;
     	$query = $this->db->query($sql);
     	return  $query->result();
     }

     public function getCodeLast($mcmp_code){
	$sql = ""; //"SELECT chuphotic.fn_gen_mmember_code('".$mcmp_code."') AS code";
	$query = $this->db->query($sql);
	if($query->num_rows()>'0'){
		$row = $query->row();
		if($row->code != ""){
			return  $row->code;
		}else{
			return '0';
		}
	}else{
		return '0';
	}
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