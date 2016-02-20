<?php 
class Trip extends CI_Model
{
	public function add_trip($post)
	{
		$user_id = $this->session->userdata('user')['id'];
		$query = "INSERT INTO trips (destination, description, travel_date_from, travel_date_to, created_at, updated_at, users_id) VALUES (?,?,?,?,?,?,?)";
		$values = array($post['destination'], $post['description'], $post['travel_date_from'], $post['travel_date_to'], date('Y-m-d, H:i:s'),date('Y-m-d, H:i:s'), $user_id);
		$this->db->query($query, $values);
	}

	public function show_user_trip()
	{
		$query = "SELECT * FROM trips where users_id = ?";
		$values = array($this->session->userdata('user')['id']);
		return $this->db->query($query, $values)->result_array();
	}

	public function show_others_trip()
	{
		$query = "SELECT * FROM trips left join users on trips.users_id = users.id where users_id < ? OR users_id > ?";
		$values = array($this->session->userdata('user')['id'],$this->session->userdata('user')['id']);
		return $this->db->query($query, $values)->result_array();
	}

	public function get_trip_by_id($id)
	{
		$query = "SELECT * FROM trips left join users on trips.users_id = users.id where users_id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}

	public function insert_join($post)
	{
		$id = $this->session->userdata('user')['id'];
		$query = "INSERT INTO trips (destination, description, travel_date_from, travel_date_to, created_at, updated_at, users_id) VALUES (?,?,?,?,?,?,?)";
		$values = array( $post['destination'], $post['description'], $post['travel_date_from'], $post['travel_date_to'], date('Y-m-d, H:i:s'),date('Y-m-d, H:i:s'), $this->session->userdata('user')['id']);
		$this->db->query($query, $values);
	}

	public function get_joining_users($trip_id)
	{
		$query = "SELECT * from users LEFT JOIN trips on trips.users_id = users.id WHERE trips.id IN (?)";

		$values = array($trip_id);
		return $this->db->query($query,$values)->result_array;
	}
}
 ?>
