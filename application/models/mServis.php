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
        $kode = "TS".$kd;
        $data = array(
            'kd_transaksi' => $kode
        );
        return $kode;
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