<?php

class mTeknisi extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM tb_user");
        $ada = $q->result_array();
        return $ada;
    }

    public function kode(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_user,2)) as kode FROM tb_user", false);
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
        $kode = "UT".$kd;
        $data = array(
            'kd_user' => $kode
        );
        return $kode;
    }

    public function insert($array){
        $this->db->insert("tb_user", $array);
    }

    public function updateData($array, $kode){
        $this->db->update("tb_user", $array, ['kd_user' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_user', $kode);
        $this->db->delete('tb_user');
        return true;
    }
}
?>