<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_booking extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function getSale($idSale)
	{
		$sql =
			"
			SELECT
			CONCAT(m.firstname,' ',m.lastname) AS salename,
			m.id_mmember,
			m.mmember_code
			FROM mmember m
			WHERE m.id_mmember ='".$idSale."'
			";
		$query_sql = $this->db->query($sql)->result();
		return  $query_sql;
	}

	public function getCustomer()
	{
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
			GROUP BY cus.id_customer
		";
		$query_sql = $this->db->query($sql)->result();
		return  $query_sql;
	}

}

/* End of file mdl_booking.php */
/* Location: ./application/models/mdl_booking.php */