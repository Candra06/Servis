<?php

class mBarang extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT bs.*, pl.kd_pelanggan, pl.nama AS nama, 
                                (CASE WHEN (bs.progres= '0') THEN 'Dalam Antrian'
                                        WHEN (bs.progres='1') THEN 'Checking'
                                        WHEN (bs.progres='2') THEN 'Perbaikan'
                                        WHEN (bs.progres='4') THEN 'Selesai' END) AS progres
                                FROM barang_servis bs, pelanggan pl 
                                WHERE bs.kd_pelanggan=pl.kd_pelanggan");
        $ada = $q->result_array();
        return $ada;
    }

    public function progres_Cek($array, $kode){
        $this->db->update("barang_servis", $array, ['kd_barang' => $kode]);
    }

    public function insert($kode){
        $this->db->insert("user", $array);
    }

    public function updateData($array, $kode){
        $this->db->update("user", $array, ['kd_user' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_user', $kode);
        $this->db->delete('user');
        return true;
    }
}
?>