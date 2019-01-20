<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servis extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
        $this->load->model("mServis");
        if ($this->uri->segment(2) == "add" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->input();
        } else if($this->uri->segment(2) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
            $this->update($this->uri->segment(3));
        }

        if(!isset($_SESSION['email'])){
            redirect('app');
        }
        
    }

	public function index()
	{
        $this->load->model("mServis");
        $data['data'] = $this->mServis->tampilData();
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Servis";
        $data['content'] = "servis/index";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('operator/index',$data);
		
    }
    
    public function add(){
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
        $data['kode_user'] = $this->mServis->kode();
        $data['kode_pelanggan'] = $this->mServis->kode_pelanggan();
        $data['kode_barang'] = $this->mServis->kode_barang();
        $data['kode_spec'] = $this->mServis->kode_spec();
        $data['dataPelanggan'] = $this->mServis->tampilPelanggan();
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Servis";
        $data['content'] = "servis/add";
        $data['data'] = null;
		$this->load->view('operator/index',$data);
    }

    public function input(){
        $p = $_POST;
        
        try{
            $date = date('Y-m-d H:i:s');
            $kode_user = $this->mServis->kode();
            $array = [
                'kd_user' => $kode_user,
                'nama' => $p['nama'],
                'alamat' => $p['alamat'],
                'no_hp' => $p['no_hp'],
                'create_by' => 1,
                'create_at' => $date
            ];

            $this->mTeknisi->insert($array);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("user"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal'.$this->uri->segment(1)]);
            $this->add();
        }
    }

    public function edit($kode){
        
        $data['title'] = "Prima Comp";
        $data['header'] = "Ubah Data Teknisi";
        $data['content'] = "teknisi/add";
        $data['data'] = $this->db->get_where("teknisi", ['kd_teknisi' => $kode])->row_array();
		$this->load->view('operator/index',$data);
    }

    public function update($kode){
        $p = $_POST;
        $date = date('Y-m-d H:i:s');
        try{
            $array = [
                'nama' => $p['nama'],
                'alamat' => $p['alamat'],
                'no_hp' => $p['no_hp'],
                'modified_by' => 1,
                'modified_at' => $date
            ];
            $this->mTeknisi->updateData($array, $kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
            redirect(base_url("user"));
        }catch(Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("user"));
        }
    }

    public function delete($kode){
        try{
            $this->mServis->deleteData($kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil hapus data '.$this->uri->segment(1)]);
            redirect(base_url("servis"));
        }catch(Exceptio $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("servis"));
        }
    }

    public function dtPelanggan(){
        $data = $this->mServis->pelanggan();
        echo json_encode($data);
    }

    public function simpanData(){
        $data = $this->mServis->simpan_transaksi();
        echo json_encode($data);
    }

    public function simpanTransaksi(){
        $data = $this->mServis->simpantrans();
        echo json_encode($data);
    }

    public function addPelanggan(){
        $data = $this->mServis->add_pelanggan();
        echo json_encode($data);
    }

    public function hapusData(){
        $data = $this->mServis->hapus_data();
        echo json_encode($data);
    }

    public function tampilBarang(){
        $kdTransaksi = $this->mServis->kode();
        $data = $this->db->query("SELECT bs.merk, bs.type, ds.id_detail, bs.jenis, bs.problem, pl.nama, ds.kd_barang,
                                    (CASE WHEN(bs.jenis = '1') THEN 'Laptop' ELSE 'PC' END) as jenis_barang 
                                    FROM barang_servis bs, pelanggan pl, detail_servis ds
                                    WHERE ds.kd_transaksi = '$kdTransaksi'
                                    AND ds.kd_barang = bs.kd_barang
                                    AND bs.kd_pelanggan = pl.kd_pelanggan
                                    AND ds.status = '0'");
        echo json_encode($data->result());
    }

}
