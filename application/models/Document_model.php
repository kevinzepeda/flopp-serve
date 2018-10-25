 <?php 

class Document_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
// function save_promocode($data) {
// 	 $result = $this->db->insert('promocode', $data); 
	 
// 	 if($result) {
// 		 return "Success";
// 	 }
// 	 else {
// 		 return "Error";
// 	 }
// 	}
function get_verified() {
		//$query = $this->db->get('driver_document');
		//$query = $this->db->where("status !=","0")->order_by("id","desc")->get('driver_document');
		$query = $this->db->query("SELECT driver_document.id,driver.driver_name,driver_document.type,(CASE driver_document.status WHEN 1 THEN 'Pending' WHEN 2 THEN 'Approved' ELSE 'Rejected' END) AS status_rs,driver_document.status FROM `driver_document` INNER JOIN driver ON driver.id = driver_document.driver_id WHERE driver_document.status!=0 ORDER BY driver_document.`id` DESC");
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}


	function get_request() {
		//$query = $this->db->get('driver_document');
		$query = $this->db->where("status!=","2")->order_by("id","desc")->get('driver_document');
		//$query = "SELECT * FROM `driver_document` WHERE status = '2' OR '1' ";
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}

function get_single_verified($id) {
		$query = $this->db->where('id', $id);
		$query = $this->db->get('driver_document');
		$result = $query->row();
		return $result;
	                     }	

function get_single_request($id) {
		$query = $this->db->where('id', $id);
		$query = $this->db->get('driver_document');
		$result = $query->row();
		return $result;
	                     }	
function update_request($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('driver_document', $data); 
		//echo $this->db->last_query();
	}




function get_single_approved($id) {

			$data = array(  
				'status' => '1'   
		  );  
  
		
	 $this->db->where('id', $id);
	$result =  $this->db->update('driver_document', $data); 
	
	 
	 if($result) {
		 return "Success";
	 }
	 else {
		 return "Error";
	 }
	}




}	