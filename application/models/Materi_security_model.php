<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_security_model extends CI_Model {
	private $_table = "user";

	public function getAll() {
		return $this->db->get($this->_table)->result();
	}

	public function getByUsernamePassword() {
		$post1 = $this->input->post();
		$username = $post1["username"];
		$password = $post1["pass"];
		$array = array('username' => $username, 'password' => $password);
		$query = $this->db->get_where($this->_table,$array);
		return $query -> row();
	}

	public function save() {
		$post = $this->input->post();
		$this->username = $post["username"];
		$this->password = $post["pass"];
		$this->nama = $post["nama"];
		$this->email = $post["email"];
		$this->telepon = $post["telepon"];
		$this->role = $post["role"];

		return $this->db->insert($this->_table, $this);
	}
}
