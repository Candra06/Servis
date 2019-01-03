<?php

class mServis extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT transaksi_servis.*, pelanggan.nama AS namaPelanggan, 
                                teknisi.nama AS namaTeknisi 
                                FROM transaksi_servis, teknisi, pelanggan
                                WHERE transaksi_servis.created_by = teknisi.kd_teknisi 
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

    public function cek_pelanggan(){

    }

    public function insert($array){
        $this->db->insert("teknisi", $array);
    }

    public function updateData($array, $kode){
        $this->db->update("teknisi", $array, ['kd_teknisi' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_teknisi', $kode);
        $this->db->delete('teknisi');
        return true;
    }
}
?>