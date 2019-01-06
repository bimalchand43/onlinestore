<?php 

/**
* 
*/
class Model_Member extends CI_Model
{
	public function create() 
	{
		$data = array(
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'age' => $this->input->post('age'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address')
		);

		$sql = $this->db->insert('members', $data);

		if($sql === true) {
			return true; 
		} else {
			return false;
		}
	} // /create function

	public function edit($id = null) 
	{
		if($id) {
			$data = array(
				'fname' => $this->input->post('editFname'),
				'lname' => $this->input->post('editLname'),
				'age' => $this->input->post('editAge'),
				'contact' => $this->input->post('editContact'),
				'address' => $this->input->post('editAddress')
			);

			$this->db->where('id', $id);
			$sql = $this->db->update('members', $data);

			if($sql === true) {
				return true; 
			} else {
				return false;
			}
		}
			
	}

	public function fetchMemberData($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM members WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM members";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function remove($id = null) {
		if($id) {
			$sql = "DELETE FROM members WHERE id = ?";
			$query = $this->db->query($sql, array($id));

			// ternary operator
			return ($query === true) ? true : false;			
		} // /if
	}
	
}