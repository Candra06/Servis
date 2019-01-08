<?php

class mTeknisi extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM user");
        $ada = $q->result_array();
        return $ada;
    }

    public function kode(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_user,2)) as kode FROM user", false);
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
            'kd_user' => $kode
        );
        return $kode;
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
        $this->db->delete('user');
        return true;
    }
}
?>