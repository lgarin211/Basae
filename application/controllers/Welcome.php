<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Welcome extends RestController
{

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


	function __construct()
	{
		// Construct the parent class
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function mahasiswas_get()
	{
		// mahasiswas from a data store e.g. database
		$mahasiswas = $this->db->get('mahasiswa')->result();

		$id = $this->get('id');
		if ($id === null) {
			// Check if the mahasiswas data store contains mahasiswas
			if ($mahasiswas) {
				// Set the response and exit
				$this->response($mahasiswas, 200);
			} else {
				// Set the response and exit
				$this->response([
					'status' => false,
					'message' => 'No mahasiswas were found'
				], 404);
			}
		} else {
			if (array_key_exists($id, $mahasiswas)) {
				$this->response($mahasiswas[$id], 200);
			} else {
				$this->response([
					'status' => false,
					'message' => 'No such user found'
				], 404);
			}
		}
	}

	public function mahasiswas_post()
	{

		// var_dump($this->post());
		$required = ['nama', 'email', 'no_telp'];
		foreach ($required as $key => $value) {
			if (empty($id = $this->post($value))) {
				$this->response([
					'status' => true,
					'message' => $key . " neet " . $value . " in your input"
				], RestController::HTTP_NOT_FOUND);
			}
		}
		$this->db->insert('mahasiswa', $this->post());
		$this->response($res=["taks"=>"success"], 200);
	}

	public function mahasiswas_delete()
	{
		if (!empty($this->delete('id'))) {
			$this->db->where('id', $this->delete('id'));
			$this->db->delete('mahasiswa');
			$this->response($res = ["taks" => "succes"], 200);
		} else {
			$this->response([
				'status' => true,
				'message' => " neet id in your input"
			], RestController::HTTP_NOT_FOUND);
		}
	}
}



// }}
