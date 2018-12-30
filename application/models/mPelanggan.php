<?php

class mPelanggan extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM tb_pelanggan");
        $ada = $q->result_array();
        return $ada;
    }

    public function kode(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_pelanggan,3)) as kode FROM tb_pelanggan", false);
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

    public function insert($array){
        $this->db->insert("tb_pelanggan", $array);
    }

    public function updateData($array, $kode){
        $this->db->update("tb_pelanggan", $array, ['kd_pelanggan' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_pelanggan', $kode);
        $this->db->delete('tb_pelanggan');
        return true;
    }
}
?>