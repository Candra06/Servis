<?php

class mServis extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT transaksi_servis.*, pelanggan.nama AS namaPelanggan, 
                                user.nama AS namaTeknisi 
                                FROM transaksi_servis, user, pelanggan
                                WHERE transaksi_servis.created_by = user.kd_user 
                                AND transaksi_servis.kd_pelanggan = pelanggan.kd_pelanggan");
        $ada = $q->result_array();
        return $ada;
    }

    public function tampilPelanggan(){
        $q = $this->db->query("SELECT * FROM pelanggan");
        return $q->result_array();
    }

    public function pelanggan(){
        $kd = $this->input->post('get_option');
        $q = $this->db->query("SELECT * FROM pelanggan WHERE kd_pelanggan='$kd'");
        return $q->result_array();
    }

    public function kode(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_transaksi,4)) as kode FROM transaksi_servis", false);
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "01";
        }
        $kode = "TS".date('dmy').$kd;
        $data = array(
            'kd_transaksi' => $kode
        );
        return $kode;
    }

    public function kode_pelanggan(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_pelanggan,3)) as kode FROM pelanggan", false);
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        $kode = "KP".$kd;
        $data = array(
            'kd_pelanggan' => $kode
        );
        return $kode;
    }

    public function kode_barang(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_barang,2)) as kode FROM barang_servis", false);
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
        $kode = "BR".date('dm').$kd;
        $data = array(
            'kd_barang' => $kode
        );
        return $kode;
    }

    public function cek_pelanggan(){

    }

    public function insert($array){
        $this->db->insert("user", $array);
    }

    public function updateData($array, $kode){
        $this->db->update("user", $array, ['kd_user' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_user', $kode);
        $this->db->delete('teknisi');
        return true;
    }

    public function add_pelanggan(){
        $date = date('Y-m-d H:i:s');
        $data = array(
            'kd_pelanggan' => $this->input->post('kdPelanggan'),
            'nama' => $this->input->post('namaPl'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'no_hp' => $this->input->post('no_hp'),
            'create_by' => $_SESSION['kd']
        );

        $result = $this->db->insert('pelanggan', $data);

        $d = array();
        if ($result){
            $d = ['respons' => 'berhasil pelanggan'];
        }else{
            $d = ['respons' => 'gagal pelanggan'];
        }
        return $d;
    }

    public function simpan_transaksi(){
        $date = date('Y-m-d H:i:s');
        $data = array(
            'kd_transaksi' => $this->input->post('no_trans'),
            'tgl_transaksi' => $this->input->post('tgl_trans'),
            'kd_pelanggan' => $this->input->post('kdPelanggan'),
            'created_by' => $this->input->post('teknisi'),
            'date_created' => $date,
            'status' => 0
        );

        $data2 = array(
            'kd_transaksi' => $this->input->post('no_trans'),
            'kd_barang' => $this->input->post('kdBarang'),
            'status' => 0,
            'tgl_terima' => $this->input->post('terima'),
            'tgl_selesai' => $this->input->post('selesai'),
            'kerusakan' => $this->input->post('kerusakan'),
            'created_by' => $this->input->post('teknisi'),
            'created_at' => $date,
        );

        $barang = array(
            'kd_barang' => $this->input->post('kdBarang'),
            'nama' => $this->input->post('namaBarang'),
            'kd_pelanggan' => $this->input->post('kdPelanggan'),
            'jenis' => $this->input->post('jenis'),
            'spesifikasi' => $this->input->post('spek'),
            'nomor_seri' => $this->input->post('no_seri'),
            'kondisi' => $this->input->post('kerusakan'),
        );

        $result = $this->db->insert('transaksi_servis', $data);
        $simpanDetail = $this->db->insert('detail_servis', $data2);
        $simpanBarang = $this->db->insert('barang_servis', $barang);

        $d = array();
        if ($result && $simpanBarang && $simpanDetail){
            $d = ['respons' => 'berhasil transaksi'];
        }else{
            $d = ['respons' => 'gagal transaksi'];
        }
        return $d;
    }
}
?>