<?php 
class Trips extends CI_Controller
{
	public function add_trip_location()
	{
		$this->load->view("/logins/addtrip");
	}

	// trips id
	public function view_destination($id)
	{
		$this->load->model('Trip');
		$data['destination'] = $this->Trip->get_trip_by_id($id);
		$data['joins'] = $this->Trip->get_joining_users($id);
		$this->load->view("/logins/destination", $data);
	}

	public function join_user($trip_id)
	{
		$this->load->model("Trip");
		$post =$this->Trip->get_trip_by_id($trip_id);
		$this->Trip->insert_join($post);
		redirect('/index.php/logins/travel_dashboard');
	}

	public function add_trip()
	{

		$this->load->library("form_validation");
		$this->form_validation->set_rules("destination", "Destination", 'trim|required');
		$this->form_validation->set_rules("description", "Description", 'trim|required');
		//(dd/mm/yyyy) regex_match[\d{4}-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3(0|1))]'
		$this->form_validation->set_rules("travel_date_from", "travel_date_from", 'trim');
		$this->form_validation->set_rules("travel_date_to", "travel_date_to", 'trim|required');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/index.php/trips/add_trip_location');
		}
		else
		{

			$post = $this->input->post();
			$this->load->model("Trip");
			$this->Trip->add_trip($post);
			redirect('/index.php/logins/travel_dashboard');
		}
		
	}
}
 ?>
