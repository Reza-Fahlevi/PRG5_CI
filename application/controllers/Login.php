<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model("materi_security_model");
	}
	public function ceklogin()
	{
		$post = $this -> input -> post();
		if (isset($post["username"]) && isset($post["pass"]))
		{
			//cek user
			$user = $this -> materi_security_model;
			$data = $user -> getByUsernamePassword();

			if ($data != null)
			{
				$username = $data->username;
				$name = $data->nama;
				$role = $data->role;
				$password = $data->password;

				//adding data to session
				$newdata = array (
					'user_username' => $username,
					'user_name' => $name,
					'user_role' => $role
				);
				$this -> session -> set_userdata($newdata);

				if ($role == "Admin"){
					redirect(site_url('dashboard'));
				}
				else if ($role == "Dosen"){
					echo "<script>alert('Hallo Dosen ?');</script>";
				}
			} else {
				echo "<script>alert('User atau Password tidak terdaftar!');</script>";
			} 
		} else {
				$this->load->view("login");
		}
	}
}
