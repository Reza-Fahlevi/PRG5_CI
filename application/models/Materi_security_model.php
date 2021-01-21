<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi_security_model extends CI_Model
{
	private $_table = "user";

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getByUsernamePassword()
	{
		$post1 = $this->input->post();
		$username = $post1["username"];
		$password = $post1["pass"];
		$array = array('username' => $username, 'password' => $password);
		$query = $this->db->get_where($this->_table, $array);
		return $query->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->username = $post["username"];
		$this->password = $post["pass"];
		$this->nama = $post["nama"];
		$this->email = $post["email"];
		$this->telepon = $post["telepon"];
		$this->role = $post["role"];

		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->username = $post["username"];
		$this->password = $post["pass"];
		$this->nama = $post["nama"];
		$this->email = $post["email"];
		$this->telepon = $post["telepon"];
		$this->role = $post["role"];
		return $this->db->update($this->_table, $this, array('username' => $post['username']));
	}

	public function hapus($id)
	{
		return $this->db->delete($this->_table, array("username" => $id));
	}
}
