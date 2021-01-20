<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_input extends CI_Controller {

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
		$this->load->view('user_input');
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model("materi_security_model");
		$this->load->library('session');
	}

	public function tambah()
	{
		$user = $this->materi_security_model;
		$result = $user->save();
		if ($result > 0) $this->sukses();
		else $this->gagal();
	}

	function sukses()
	{
		redirect(site_url('user_lihat'));
	}

	function gagal()
	{
		echo "<script>alert('Input data Gagal')</script>";
	}
}
