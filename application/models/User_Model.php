<?php
class User_Model extends CI_Model
{
	protected $table = "users";
	public function register($encrypt_password)
	{

		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $encrypt_password,
			'username' => $this->input->post('username'),
			'zipcode' => $this->input->post('zipcode')
		);

		return $this->db->insert('users', $data);
	}

	public function login($username, $encrypt_password)
	{
		//Validate
		$this->db->where('username', $username);
		$this->db->where('password', $encrypt_password);
		$this->db->where('role_id', -2);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {
			return $result->row(0);
		} else {
			return false;
		}
	}

	// Check Username exists
	public function check_username_exists($username)
	{
		$query = $this->db->get_where('users', array('username' => $username));

		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}
	public function check_username($username, $id)
	{
		$this->db->where('username', $username);
		$this->db->where('id != ', $id);
		$query = $this->db->get($this->table);
		
		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	// Check email exists
	public function check_email_exists($email)
	{
		$query = $this->db->get_where('users', array('email' => $email));

		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	public function get_user($id)
	{
		$query = $this->db->get_where('users', ['id' => $id]);
		return $query->row();
	}

	public function update_user($role_id)
	{
		$data = $this->input->post();
		$data['password'] = md5($this->input->post('password'));
		unset($data['password2']);
		
		$this->db->where('id', $this->session->vendor_user_id);
		return $this->db->update('users', $data);
	}
}
