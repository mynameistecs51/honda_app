<?php
   class mdl_tstock extends CI_Model
   {
      public function __construct()
      {
		parent::__construct(); 
      }

	  public function addMemp($data){
		$this->db->insert('memp', $data);
	  }

	  public function updateMemp($id,$data){
		$this->db->where('id_memp', $id);
		$this->db->update('memp', $data);
	  }

 public function getList($requestData){

	 	$sql_full = "
              SELECT
				a.id_memp,
				a.memp_code,
				concat(a.firstname_th,' ',a.lastname_th) AS name_th,
				concat(a.firstname_en,' ',a.lastname_en) AS name_en,
				a.email,
				a.mobile,
				a.username AS user,
				a.status,
				a.comment, 
				c.name_th AS name_memp_cat ,
				DATE_FORMAT(a.dt_create,'%d-%m-%Y %H:%m') AS dt_create 
			  FROM
				memp a 
				LEFT JOIN mpst AS c ON a.id_mpst=c.id_mpst 
			  WHERE 1 = 1 ";
        
        $sql_search=$sql_full; 
        // getting records as per search parameters
        if( !empty($requestData['columns'][0]['search']['value']) ){ //name
        $sql_search.=" AND a.memp_code LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
        } 
        if( !empty($requestData['columns'][1]['search']['value']) ){  //salary
        $sql_search.=" AND concat(a.firstname_th,a.lastname_th) LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
        }
        if( !empty($requestData['columns'][2]['search']['value']) ){  //salary
        $sql_search.=" AND a.username LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
        }
        if( !empty($requestData['columns'][3]['search']['value']) ){  //salary
        $sql_search.=" AND a.mobile LIKE '%".$requestData['columns'][3]['search']['value']."%' ";
        }
        if( !empty($requestData['columns'][4]['search']['value']) ){  //salary
        $sql_search.=" AND a.email LIKE '%".$requestData['columns'][4]['search']['value']."%' ";
        }
        /*
        if( !empty($requestData['columns'][5]['search']['value']) ){  //salary
        $sql.=" AND  DATE_FORMAT(date(a.dt_create),'%d/%m/%Y') >= '".$requestData['columns'][5]['search']['value']."'";
        }
        if( !empty($requestData['columns'][6]['search']['value']) ){  //salary
        $sql.=" AND  DATE_FORMAT(date(a.dt_create),'%d/%m/%Y') <= '".$requestData['columns'][6]['search']['value']."'";
        }
        */
       // echo $requestData['columns']['name_th']['search']['value'];
        $data = array(
        	'sql_full' => $sql_full,
        	'sql_search' => $sql_search 
        );
        return $data;
	  }

public function getMemp($id){
	  $sql = "
			SELECT
				a.id_memp,
				a.id_mpst,
				a.sex,
				a.memp_code,
				a.status_marriaged,
				a.id_memp_tit,
				concat(a.firstname_th,' ',a.lastname_th) AS name_th,
				concat(a.firstname_en,' ',a.lastname_en) AS name_en,
				a.firstname_th,
				a.lastname_th,
				a.firstname_en,
				a.lastname_en,
				DATE_FORMAT(a.birthdate,'%d/%m/%Y') AS birthdate,
				DATE_FORMAT(a.startdate,'%d/%m/%Y') AS startdate,
				DATE_FORMAT(a.resigndate,'%d/%m/%Y') AS resigndate,
				a.idcard_num,
				a.drv_lcn_num, 
				a.id_drv_cat,
				a.email,
				a.telephone,
				a.mobile,
				a.fax,
				a.username AS user,
				a.status,
				a.adr_line1,
				a.adr_line2,
				a.comment,
				c.name_th AS name_memp_cat,
				concat(i.firstname_th,' ',i.lastname_th) AS name_create,
				concat(i2.firstname_th,' ',i2.lastname_th) AS name_update,
				DATE_FORMAT(a.dt_create,'%d/%m/%Y %H:%m') AS dt_create,
				DATE_FORMAT(a.dt_update,'%d/%m/%Y %H:%m') AS dt_update
			FROM
				memp a
			LEFT JOIN mpst c ON a.id_mpst=c.id_mpst 
			LEFT JOIN memp i ON a.id_create=i.id_memp
			LEFT JOIN memp i2 ON a.id_update=i2.id_memp  
				";
				if($id != ""){
					 $sql .= " WHERE a.id_memp='$id' ";
				}
// echo $sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	  }


public function getMempCat(){
	  $sql = "
				SELECT
				a.id_mpst,a.name_th
				FROM
				mpst a
				WHERE a.status=1 ";
// echo $sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	  }

public function getCodeLast($mcmp_code){
	$sql = "SELECT chuphotic.fn_gen_memp_code('".$mcmp_code."') AS code";
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
				a.id_memp
				FROM
				memp a
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
				a.id_memp
				FROM
				memp a
				WHERE a.id_memp='$id' 
				AND a.userpassword='$pass' ";
			$query = $this->db->query($sql);
			return  $query->num_rows();
 	  }

   }
?>