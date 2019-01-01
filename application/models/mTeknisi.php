<?php

class mTeknisi extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM teknisi");
        $ada = $q->result_array();
        return $ada;
    }

    public function kode(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_teknisi,2)) as kode FROM teknisi", false);
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
        $kode = "KT".$kd;
        $data = array(
            'kd_teknisi' => $kode
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