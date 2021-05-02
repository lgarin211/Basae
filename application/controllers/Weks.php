<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
class Weks extends RestController
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
	public function index($value='')
	{
			$this->load->view('welcome_message');
	}

	public function addone()
	{

		$nama = $this->post('nama');

        // var_dump($nama);
        $this->response(array('hi'), 200);

		// $required=['nama','email','no_telp'];
		// foreach ($required as $key => $value) {
		// 	if (empty($_POST[$value])) {
		// 		echo $key." neet ".$value." in your input";
		// 		die;
		// 	}
		// }

		// $this->db->insert('mahasiswa', $_POST);
	}

	public function delete()
	{
		if (!empty($_GET['id'])) {
			$this->db->where('id', $_GET['id']);
			$this->db->delete('mahasiswa');
		}		
	}

	public function update()
	{

	}


}
