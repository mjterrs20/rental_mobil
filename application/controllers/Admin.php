<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login apakah udah atau belum
		if ($this->session->userdata('status') != "login"){
			redirect(base_url().'welcome?pesan=belumlogin');
		}
	}

	function index(){
		$data['transaksi'] = $this->db->query("select * from transaksi order by transaksi_id desc limit 10")->result();
		$data['kostumer'] = $this->db->query("select * from kostumer order by kostumer_id desc limit 10")->result();
		$data['mobil'] = $this->db->query("select * from mobil order by mobil_id desc limit 10")->result();
		$this->load->view('admin/header');
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');

	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'welcome?pesan=logout');
	}
	function ganti_password(){
		$this->load->view('admin/header');
		$this->load->view('admin/ganti_password');
		$this->load->view('admin/footer');
	}

	function ganti_password_act(){
		$pass_baru = $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');				
		$this->form_validation->set_rules('pass_baru','Password Baru','required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');

		if($this->form_validation->run() != false){
			$data = array(
				'admin_password' => md5($pass_baru)
			);
			$w = array(
				'admin_id' => $this->session->userdata('id')
			);			
			$this->m_rental->update_data($w,$data,'admin');			
			redirect(base_url().'admin/ganti_password?pesan=berhasil');						
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/ganti_password');
			$this->load->view('admin/footer');
		}
	}
	function mobil(){
		$data['mobil'] = $this->m_rental->get_data('mobil')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/mobil',$data);
		$this->load->view('admin/footer');
	}
	function mobil_add(){
		$this->load->view('admin/header');
		$this->load->view('admin/mobil_add');
		$this->load->view('admin/footer');
	}
	function mobil_add_act(){		
		$merk = $this->input->post('merk');
		$plat = $this->input->post('plat');
		$warna = $this->input->post('warna');
		$tahun = $this->input->post('tahun');
		$status = $this->input->post('status');
		$this->form_validation->set_rules('merk','Merk Mobil','required');
		$this->form_validation->set_rules('status','Status Mobil','required');

		if($this->form_validation->run() != false){
			$data = array(
				'mobil_merk' => $merk,
				'mobil_plat' => $plat,			
				'mobil_warna' => $warna,			
				'mobil_tahun' => $tahun,			
				'mobil_status' => $status
			);
			$this->m_rental->insert_data($data,'mobil');
			redirect(base_url().'admin/mobil');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/mobil_add');
			$this->load->view('admin/footer');
		}
	}


}

?>