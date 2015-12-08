<?php
   class mdl_mcmp extends CI_Model
   {
      public function __construct()
      {
        parent::__construct(); 
      }

      public function addMcmp($data){
        $this->db->insert('mcmp', $data);
      }

      public function updateMcmp($id,$data){
        $this->db->where('id_mcmp', $id);
        $this->db->update('mcmp', $data);
      }

 public function getList($requestData){
          
          $sql_full = "
                SELECT
                a.id_mcmp,
                a.mcmp_code,
                a.name_th,
                a.name_en,
                a.email,
                a.mobile,
                a.status,
                a.comment, 
                DATE_FORMAT(a.dt_create,'%d-%m-%Y %H:%m') AS dt_create 
                 FROM
                mcmp a 
             WHERE 1 = 1";

        $sql_search=$sql_full;
        // getting records as per search parameters
        if( !empty($requestData['columns'][0]['search']['value']) ){ //name
        $sql_search.=" AND mcmp_code LIKE '%".$requestData['columns'][0]['search']['value']."%' ";
        } 
        if( !empty($requestData['columns'][1]['search']['value']) ){  //salary
        $sql_search.=" AND name_en  LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
        }
        if( !empty($requestData['columns'][2]['search']['value']) ){  //salary
        $sql_search.=" AND name_th LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
        }
        if( !empty($requestData['columns'][3]['search']['value']) ){  //salary
        $sql_search.=" AND mobile LIKE '%".$requestData['columns'][3]['search']['value']."%' ";
        }
        
        $data = array(
            'sql_full' => $sql_full,
            'sql_search' => $sql_search 
        );
        return $data;
      }

public function getMcmp($id){
      $sql = "
                SELECT
                a.id_mcmp,
                a.mcmp_code,
                a.id_mcmp_main,
                a.name_en,
                a.name_th,
                a.adr_line,
                a.id_mprv,
                a.id_mdist,
                a.is_mipt,
                a.tax_id,
                a.website,
                a.email,
                a.contact,
                a.telephone,
                a.mobile,
                a.fax,
                a.is_owner,
                a.is_main_company,
                a.is_dealer,
                a.is_supplier,
                a.is_customer,
                a.`comment`,
                a.`status`,
                concat(i.firstname_th,' ',i.lastname_th) AS name_create,
                concat(i2.firstname_th,' ',i2.lastname_th) AS name_update,
                DATE_FORMAT(a.dt_create,'%d/%m/%Y %H:%i:%s') AS dt_create,
                DATE_FORMAT(a.dt_update,'%d/%m/%Y %H:%i:%s') AS dt_update
                FROM
                mcmp a
                LEFT JOIN memp i ON a.id_create=i.id_memp
                LEFT JOIN memp i2 ON a.id_update=i2.id_memp
                ";
                if($id != ""){
                     $sql .= " WHERE a.id_mcmp='$id' ";
                }
// echo $sql;
            $query = $this->db->query($sql);
            return  $query->result();
      }

     public function sel_mcmp()   
      {
        $sql = "SELECT id_mcmp,name_th FROM mcmp" ;
        $result=$this->db->query($sql);
        return $result->result_array();
      }
      
      public function sel_province()   
      {
        $sql = "SELECT PROVINCE_ID,PROVINCE_NAME FROM mprovince" ;
        $result=$this->db->query($sql);
        return $result->result_array();
      }

      public function sel_amphur($PROVINCE_ID)   
      {
        $sql = "SELECT AMPHUR_ID,AMPHUR_NAME FROM mamphur where PROVINCE_ID ='".$PROVINCE_ID."' 
                AND AMPHUR_NAME NOT LIKE '%*%' " ;
        $result=$this->db->query($sql);
        return $result->result_array();
      }


   }
?>