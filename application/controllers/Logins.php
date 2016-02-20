<?php 
class Logins extends CI_Controller
{
	public function index()
	{
		$this->load->view('/logins/login');
	}

	public function travel_dashboard()
	{
		$this->load->model("Trip");
		$data['user_trips'] = $this->Trip->show_user_trip();
		$data['nonuser_trips'] = $this->Trip->show_others_trip();
		$this->load->view('/logins/travel_dashboard', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("/");
	}

	public function process_register()
	{

		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", 'trim|required');
		$this->form_validation->set_rules("email", "Email", 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules("password", "Password", 'trim|required|min_length[8]|matches[confirm_password]');
		$this->form_validation->set_rules("confirm_password", "Confirm Password", 'trim|required|min_length[8]');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('errors_register', validation_errors());
			redirect('/index.php/logins');
		}
		else
		{
			$this->load->model('login');
			$post = $this->input->post();
			$this->login->register_user($post);
			redirect('/');
		}	
	}

	public function process_login()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", 'trim|required');
		$this->form_validation->set_rules("password", "Password", 'trim|required');
		$this->load->library("form_validation");
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('errors_login', validation_errors());
			redirect('/index.php/logins');
		}
		else
		{
			$this->load->model('login');
			$post = $this->input->post();
			if($this->login->login_check($post))
			{
				$data = $this->login->login_check($post);
				$this->session->set_userdata('user', $data);
				redirect('/index.php/logins/travel_dashboard');
			}
			else
			{
				$this->session->set_flashdata('errors_login', 'email or password is incorrect');
				redirect('/index.php/books/load_books');
			}
		}
	}

}	
 ?>
