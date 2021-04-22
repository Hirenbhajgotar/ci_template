<?php
class Users extends CI_Controller
{
	protected $vendor_role_id = -2;
	public function dashboard()
	{
		if (!$this->session->userdata('vendor_login')) {
			redirect('users/login');
		}
		$data['user'] = $this->User_Model->get_user($this->session->userdata('vendor_user_id'));
		$data['title'] = 'Dashboard';

		
		$this->load->view('templates/head');
		$this->load->view('users/dashboard', $data);
		$this->load->view('templates/foot');
	}

	// Register User
	public function register()
	{
		if ($this->session->userdata('login')) {
			redirect('posts');
		}

		$data['title'] = 'Sign Up';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/head');
			$this->load->view('users/register', $data);
			$this->load->view('templates/foot');
		} else {
			//Encrypt Password
			$encrypt_password = md5($this->input->post('password'));

			$this->User_Model->register($encrypt_password);

			//Set Message
			$this->session->set_flashdata('user_registered', 'You are registered and can log in.');
			redirect('posts');
		}
	}

	// Log in User
	public function login()
	{
		$data['title'] = 'Sign In';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/head');
			$this->load->view('users/login', $data);
			$this->load->view('templates/foot');
		} else {
			// get username and Encrypt Password
			$username = $this->input->post('username');
			$encrypt_password = md5($this->input->post('password'));

			$user_id = $this->User_Model->login($username, $encrypt_password);
			
			if ($user_id) {
				if($user_id->status == 0) {
					$this->session->set_flashdata('msg', 'Your Account currently deactive by admin, please contact admin!.');
					$this->session->set_flashdata('type', 'danger');
					redirect('users/login');
				} 	
				//Create Session
				$user_data = array(
					'vendor_user_id'            => $user_id->id,
					'vendor_username'           => $username,
					'vendor_email'              => $user_id->email,
					'vendor_first_name'         => $user_id->first_name,
					'vendor_last_name'          => $user_id->last_name,
					'vendor_user_role_id'       => $user_id->role_id,
					'vendor_mobile'             => $user_id->contact,
					'vendor_user_register_date' => $user_id->register_date,
					'vendor_login'              => true
				);

				$this->session->set_userdata($user_data);
				//Set Message
				$this->session->set_flashdata('user_loggedin', 'You are now logged in.');
				redirect('users/dashboard');
			} else {
				$this->session->set_flashdata('msg', 'Login is invalid. try again!.');
				$this->session->set_flashdata('type', 'danger');
				redirect('users/login');
			}
		}
	}

	// log user out
	public function logout()
	{
		// unset user data
		$this->session->unset_userdata('vendor_login');
		$this->session->unset_userdata('vendor_user_id');
		$this->session->unset_userdata('vendor_username');

		//Set Message
		$this->session->set_flashdata('user_loggedout', 'You are logged out.');
		redirect(base_url());
	}

	// Check user name exists
	public function check_username_exists($username)
	{
		$this->form_validation->set_message('check_username_exists', 'That username is already taken, Please choose a different one.');

		if ($this->User_Model->check_username_exists($username)) {
			return true;
		} else {
			return false;
		}
	}
	public function check_username($username)
	{
		$this->form_validation->set_message('check_username', 'That username is already taken, Please choose a different one.');

		if ($this->User_Model->check_username($username, $this->session->vendor_user_id)) {
			return true;
		} else {
			return false;
		}
	}

	// Check Email exists
	public function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

		if ($this->User_Model->check_email_exists($email)) {
			return true;
		} else {
			return false;
		}
	}

	// update user data
	public function update_user()
	{
		if (!$this->session->userdata('vendor_login')) {
			redirect('users/login');
		}

		$data['title'] = 'Update User';

		//$data['add-user'] = $this->Administrator_Model->get_categories();

		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username', ['required' => 'Thne %s field is required ddd.']);
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/head', $data);
			$this->load->view('users/dashboard');
			$this->load->view('templates/foot');
		} else {
			// echo '<pre>';
			// print_r($this->input->post());
			// echo '</pre>';
			// exit;
			
			$this->User_Model->update_user($this->vendor_role_id);

			//Set Message
			$this->session->set_flashdata('msg', 'User has been Updated Successfull.');
			$this->session->set_flashdata('type', 'success');
			redirect('users/dashboard');
		}
	}
}
