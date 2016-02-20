<?php 
class login extends CI_Model
{
	public function register_user($post)
	{
		$query = "INSERT INTO users (name, email, password, created_at, updated_at) VALUES (?,?,?,?,?)";
		$values = array($post['name'], $post['email'], md5($post['password']), date('Y-m-d, H:i:s'),date('Y-m-d, H:i:s'));
		$this->db->query($query, $values);
	}

	public function login_check($post)
	{
		$query = "SELECT * FROM users WHERE email= ? AND password= ?";
		$values = array($post['email'], md5($post['password']));
		return $this->db->query($query, $values)->row_array();
	}

}

 ?>