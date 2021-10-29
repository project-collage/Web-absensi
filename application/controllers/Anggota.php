<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('anggota_model', 'anggota');
	}


	public function web_developer()
	{
		$data['title']	= 'Web Developer';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getDocters();

		$this->load->view('templates/app', $data);
	}

	public function software_engineer()
	{
		$data['title']	= 'Software Engineer';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getNurses();

		$this->load->view('templates/app', $data);
	}

	public function mobile_developer()
	{
		$data['title']	= 'Mobile Developer';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getPharmacists();

		$this->load->view('templates/app', $data);
	}

	public function manager()
	{
		$data['title']	= 'Project Manager';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getAccountants();

		$this->load->view('templates/app', $data);
	}

	public function add()
	{

		// $this->load->library('form_validation');
		// $this->form_validation->set_rules('no', 'No',);
		// $this->form_validation->set_rules('name', 'Name', 'required');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		// $this->form_validation->set_rules('password', 'Password', 'required');
		// if ($this->form_validation->run()) {
		// 	$array = array(
		// 		'success' => '<div class="alert-sucess">Berhasil</div>'
		// 	);
		// } else {
		// 	$array = array(
		// 		'error' => true,
		// 		'no_error' => form_error('no'),
		// 		'name_error' => form_error('name'),
		// 		'email_error' => form_error('email'),
		// 		'password_error' => form_error('password'),
		// 	);
		// }

		// echo json_encode($array);

		$this->form_validation->set_rules('no_employee', 'No Karyawan', 'required|trim|is_unique[users.no_employee]', [
			'required'  => 'No karyawan tidak boleh kosong.',
			'is_unique' => 'No karyawan sudah terdaftar.'
		]);
		$this->form_validation->set_rules('name', 'Nama', 'required|trim', [
			'required' => 'Nama tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'required' 	  => 'Email tidak boleh kosong.',
			'valid_email' => 'Email tidak valid',
			'is_unique'	  => 'Email sudah terdaftar.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data['title']		= 'Tambah Anggota';
			$data['page']		= 'admin/anggota/add';
			$data['position'] = $this->anggota->getPosition();

			$this->load->view('templates/app', $data);
		} else {
			$data = [
				'no_employee' 	=> $this->input->post('no_employee'),
				'name'			=> $this->input->post('name'),
				'gender'			=> $this->input->post('gender'),
				'email' 			=> strtolower($this->input->post('email')),
				'photo' 			=> null,
				'password' 		=> hashEncrypt($this->input->post('password')),
				'role_id' 		=> 2,
				'position_id' 	=> $this->input->post('position_id'),
				'date_created'	=> date('Y-m-d')
			];

			$this->anggota->insertUser($data);
			$this->session->set_flashdata('message', 'Data anggota berhasil ditambahkan.');

			// if ($data['position_id'] == 1) {
			// 	redirect(base_url('anggota/web_developer'));
			// } else if ($data['position_id'] == 2) {
			// 	redirect(base_url('anggota/software_engineer'));
			// } else if ($data['position_id'] == 3) {
			// 	redirect(base_url('anggota/mobile_developer'));
			// } else if ($data['position_id'] == 4) {
			// 	redirect(base_url('anggota/manager'));
			// }
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('no_employee', 'No Karyawan', 'required|trim', [
			'required' => 'No karyawan tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('name', 'Nama', 'required|trim', [
			'required' => 'Nama tidak boleh kosong.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data['title']		= 'Ubah Anggota';
			$data['page']		= 'admin/anggota/edit';
			$data['user'] 		= $this->anggota->getDetailUser($id);
			$data['position'] = $this->anggota->getPosition();

			$this->load->view('templates/app', $data);
		} else {
			$data = [
				'no_employee' => $this->input->post('no_employee'),
				'name' => $this->input->post('name'),
				'gender' => $this->input->post('gender'),
				'position_id' => $this->input->post('position_id'),
			];

			$this->anggota->updateUser($id, $data);
			$this->session->set_flashdata('message', 'Data anggota berhasil ditambahkan.');

			if ($data['position_id'] == 1) {
				redirect(base_url('anggota/web_developer'));
			} else if ($data['position_id'] == 2) {
				redirect(base_url('anggota/software_engineer'));
			} else if ($data['position_id'] == 3) {
				redirect(base_url('anggota/mobile_developer'));
			} else if ($data['position_id'] == 4) {
				redirect(base_url('anggota/manager'));
			}
		}
	}

	public function delete($id)
	{
		$user	= $this->anggota->getDetailUser($id);
		$this->anggota->deleteUser($id);
		$this->session->set_flashdata('message', 'Data anggota berhasil dihapus.');

		if ($user['position_id'] == 1) {
			redirect(base_url('anggota/web_developer'));
		} else if ($user['position_id'] == 2) {
			redirect(base_url('anggota/software_engineer'));
		} else if ($user['position_id'] == 3) {
			redirect(base_url('anggota/mobile_developer'));
		} else if ($user['position_id'] == 4) {
			redirect(base_url('anggota/manager'));
		}
	}
}

/* End of file Controllername.php */
