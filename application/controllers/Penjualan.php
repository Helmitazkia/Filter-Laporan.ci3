<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');
		$this->load->library('form_validation');
	}
	// Data Jenis Barang
	//Menampilkan Data jenis barang
	public function VformJenisBarang()
	{
		$data['Jbarang'] = $this->MSudi->tampil_data_jenis();
		$data['title'] = 'Data Jenis Barang';
		$data['content'] = 'jnsBarang/VJnsBarang';
		$this->load->view('welcome_message', $data);
	}
	public function VFormAddJnsBarang()
	{
		$data['content'] = 'JnsBarang/VFormAddJnsBarang';
		$this->load->view('welcome_message', $data);
	}
	public function AddDataJnsBarang()
	{


		$this->form_validation->set_rules('nama', 'Nama Jenis Barang', 'required', [
			'required' => 'Nama Jenis Harus di isi'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'JnsBarang/VFormAddJnsBarang';
			$this->load->view('welcome_message', $data);
		} else {
			$nama = $this->input->post('nama');
			$formatdelet = $this->input->post('deleted');
			//$this->MSudi->AddData('tbl_jnsbarang', $add);

			$tambah = array(
				'nama'       		 =>   $nama,
				'deleted_at'         =>   $formatdelet,


			);
			$this->db->insert('tbl_jnsbarang', $tambah);
			redirect(site_url('Penjualan/VformJenisBarang'));
		}
	}
	public function EditVformJenisBarang($id)
	{
		$where = array('kd_jns' => $id);
		$data['Jbarang'] = $this->MSudi->edit_data_jenis('tbl_jnsbarang', $where);
		$data['title'] = 'Edit Jenis Barang';
		$data['content'] = 'jnsBarang/VFormUpdateJnsBarang';

		$this->load->view('welcome_message', $data);
	}

	public function UpdateDataJnsBarang()
	{
		$id = $this->input->post('kd_jns');
		$nama = $this->input->post('nama');

		// $data = array(
		// 	'nama'             => $nama,

		// );
		// $where = array(
		// 	'kd_jns' => $id
		// );

		//this->MSudi->update_data_jenis($where, $data, 'tbl_jnsbarang');
		$this->db->set('nama', $nama);
		$this->db->where('kd_jns', $id);
		$this->db->update('tbl_jnsbarang');
		redirect(base_url('Penjualan/VformJenisBarang'));
	}

	//Menggunkan Soft Delete
	public function DeleteDataJnsBarang($id)
	{
		$where = array('kd_jns' => $id);

		$this->db->set('deleted_at', '1');
		$this->db->where('kd_jns', $id);
		$this->db->update('tbl_jnsbarang');

		redirect(base_url('Penjualan/VformJenisBarang'));
	}
	//crud JnsBarang
	// crud Barang
	public function DataBarang()
	{

		$data['DataBarang'] = $this->MSudi->GetDataRelation2bj();
		$data['title'] = 'Data Jenis Barang';
		$data['content'] = 'Barang/VBarang';
		$this->load->view('welcome_message', $data);
	}

	public function VFormAddBarang()
	{
		//untuk menampilkan nama jenis barang di form input barang
		//$data['DataJns'] = $this->MSudi->tampil_data_jenis('tbl_jnsbarang');
		$data['DataJns'] = $this->MSudi->tampil_data_jenis();
		$data['content'] = 'Barang/VFormAddBarang';
		$this->load->view('welcome_message', $data);
	}
	public function AddDataBarang()
	{
		$this->form_validation->set_rules('nama', 'Nama Barang', 'required', [
			'required' => 'Nama Barang Tidak boleh kosong'
		]);
		$this->form_validation->set_rules('harga', 'Harga', 'required', [
			'required' => 'Harga Barang Tidak boleh kosong'
		]);
		$this->form_validation->set_rules('Jumlah', 'Jumlah Barang', 'required', [
			'required' => 'Jumlah Barang Tidak boleh kosong !'
		]);
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required', [
			'required' => 'Tanggal Masuk Tidak boleh kosong !'
		]);

		if ($this->form_validation->run() == FALSE) {
			//$data['DataJns'] = $this->MSudi->GetDataJenis('tbl_jnsbarang');
			$data['DataJns'] = $this->MSudi->tampil_data_jenis();
			$data['content'] = 'Barang/VFormAddBarang';
			$this->load->view('welcome_message', $data);
		} else {
			$jenisbarang =  $this->input->post('kd_jns');
			$nama = $this->input->post('nama');
			$harga = $this->input->post('harga');
			$jumlah = $this->input->post('Jumlah');
			$tanggalmasuk = $this->input->post('tgl_masuk');
			$formatdelet = $this->input->post('deleted');
			//$this->MSudi->AddData('tbl_Barang', $add);


			$tambah = array(
				'kd_jns'       =>   $jenisbarang,
				'nama'         =>   $nama,
				'harga'        =>   $harga,
				'jumlah'       =>   $jumlah,
				'tgl_masuk'    =>   $tanggalmasuk,
				'deleted_at'         =>   $formatdelet,

			);

			$this->db->insert('tbl_barang', $tambah);
			$this->session->set_flashdata('message', 'DI TAMBAHKAN');
			redirect('Penjualan/DataBarang');
		}
	}
	public function EditVformBarang($id)
	{
		$where = array('kd_barang' => $id);
		$data['barang'] = $this->MSudi->edit_data_barang('tbl_barang', $where);
		// 	$data['Jbarang'] untuk menampilkan di combobok data barang
		$data['Jbarang'] = $this->MSudi->tampil_data_jenis();
		$data['title'] = 'Edit Data Barang';
		$data['content'] = 'Barang/VFormUpdateBarang';
		$this->load->view('welcome_message', $data);
	}

	public function UpdateDataBarang()
	{
		$id = $this->input->post('kd_barang');
		$kodejenis = $this->input->post('kd_jns');
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		$tglmasuk = $this->input->post('tgl_masuk');

		$data = array(
			'kd_jns'             => $kodejenis,
			'nama'               => $nama,
			'harga'              => $harga,
			'jumlah'             => $jumlah,
			'tgl_masuk'          => $tglmasuk,
		);
		$where = array(
			'kd_barang' => $id
		);

		$this->MSudi->update_data_barang($where, $data, 'tbl_barang');
		redirect(site_url('Penjualan/DataBarang'));
	}

	//Soft Delete
	public function DeleteDataBarang($id)
	{
		$where = array('kd_barang' => $id);
		//$this->MSudi->hapus_databarang($where, 'tbl_barang');
		$this->db->set('deleted_at', '1');
		$this->db->where('kd_barang', $id);
		$this->db->update('tbl_barang');
		redirect(site_url('Penjualan/DataBarang'));
	}



	// crud Pembelian
	//Data Pembelian
	public function DataPembelian()
	{


		$data['Datapembelian'] = $this->MSudi->GetDataRelation2pb();
		$data['title'] = 'Data Pembelian Barang';
		$data['content'] = 'Pembelian/VPembelian';
		$this->load->view('welcome_message', $data);
	}

	public function VFormAddPembelian()
	{
		$data['DataBarang'] =  $this->MSudi->GetDataRelation2bj();
		$data['title'] = 'Data Pembelian';
		$data['content'] = 'Pembelian/VFormAddPembelian';
		$this->load->view('welcome_message', $data);
	}
	public function AddDataPembelian()
	{

		$this->form_validation->set_rules('struk', 'Nama Barang', 'required', [
			'required' => 'struk Barang Tidak boleh kosong'
		]);
		$this->form_validation->set_rules('kd_barang', 'Nama Barang', 'required', [
			'required' => 'Nama  Barang Tidak boleh kosong'
		]);
		$this->form_validation->set_rules('jml_beli', 'Jumlah Barang', 'required', [
			'required' => 'Jumlah Beli Tidak boleh kosong !'
		]);
		$this->form_validation->set_rules('tgl_beli', 'Tanggal Masuk', 'required', [
			'required' => 'Tanggal Masuk Tidak boleh kosong !'
		]);
		if ($this->form_validation->run() == FALSE) {
			$data['DataBarang'] = $this->MSudi->GetDataRelation2bj();
			$data['content'] = 'pembelian/VFormAddPembelian';
			$data['title'] = 'Tambah Data Pembelian';
			$this->load->view('welcome_message', $data);
		} else {
			$struk =  $this->input->post('struk');
			$kodebarang = $this->input->post('kd_barang');
			$jumlabeli = $this->input->post('jml_beli');
			$tglbeli = $this->input->post('tgl_beli');

			//$this->MSudi->AddData('tbl_Barang', $add);


			$tambah = array(
				'struk'       =>   $struk,
				'kd_barang'         =>   $kodebarang,
				'jml_beli'        =>   $jumlabeli,
				'tgl_beli'       =>   $tglbeli,


			);

			$this->db->insert('tbl_pembelian', $tambah);
			$this->session->set_flashdata('message', 'DI TAMBAHKAN');
			redirect(site_url('Penjualan/DataPembelian'));
		};
	}
	public function EditVpembelian($id)
	{
		$where = array('kd_pembelian' => $id);
		$data['Datapembelian'] = $this->MSudi->Editpembelian('tbl_pembelian', $where);
		// 	$data['Jbarang'] untuk menampilkan di combobok data barang
		$data['DataBarang'] = $this->MSudi->Getdatabarang('tbl_barang');
		$data['title'] = 'Edit Data Pembelian';
		$data['content'] = 'pembelian/VFormUpdatePembelian';
		$this->load->view('welcome_message', $data);
	}

	public function UpdateDataPembelian()
	{
		$id = $this->input->post('kd_pembelian');
		$struk =  $this->input->post('struk');
		$kodebarang = $this->input->post('kd_barang');
		$jumlabeli = $this->input->post('jml_beli');
		$tglbeli = $this->input->post('tgl_beli');

		$data = array(
			'struk'             =>   $struk,
			'kd_barang'         =>   $kodebarang,
			'jml_beli'          =>   $jumlabeli,
			'tgl_beli'          =>   $tglbeli,


		);
		$where = array(
			'kd_pembelian' => $id
		);

		$this->MSudi->update_data_pembelian($where, $data, 'tbl_pembelian');
		redirect(site_url('Penjualan/DataPembelian'));
	}


	public function DeleteDataPembelian($id)
	{
		$where = array('kd_pembelian' => $id);
		$this->MSudi->hapus_datapembelian($where, 'tbl_pembelian');
		redirect(site_url('Penjualan/DataPembelian'));
	}
	//crud Pembelian


	//Rekap Barang masuk
	public function RekapBarang()
	{
		if ($this->input->post('tglawal')) {
			$tglawal = $this->input->post('tglawal');
			$tglakhir = $this->input->post('tglakhir');
			$data['DataBarang'] = $this->MSudi->GetDataRelation2bjrange($tglawal, $tglakhir);
		} else {
			$data['DataBarang'] = $this->MSudi->GetDataRelation2bj();
		}

		$data['content'] = 'VRekapBarangMasuk';
		$this->load->view('welcome_message', $data);
	}


	//Rekap Pembelian
	public function RekapPembelian()
	{
		if ($this->input->post('tglawal')) {
			$tglawal = $this->input->post('tglawal');
			$tglakhir = $this->input->post('tglakhir');
			$data['DataPembelian'] = $this->MSudi->GetDataRelation2pbrange($tglawal, $tglakhir);
		} else {
			$data['DataPembelian'] = $this->MSudi->GetDataRelation2pb();
		}
		$data['content'] = 'VRekapPembelian';
		$this->load->view('welcome_message', $data);
	}

	// public function Logout()
	// {
	// 	$this->load->library('session');
	// 	$this->session->unset_userdata('Login');
	// 	$this->session->unset_userdata('akses');
	//  $this->session->unset_userdata('ses_id');
	//  $this->session->unset_userdata('ses_name');
	// 	redirect(site_url('Welcome'));
	// }

}
