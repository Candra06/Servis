<?php

class mProfil extends CI_Model{

    

    public function profil1(){
        $date = date('Y-m-d H:i:s');
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('noHP'),
            'modified_by' => $_SESSION['kd'],
            'modified_date' => $date
        );

        $result =  $this->db->update("user", $data, ['kd_user' => $_SESSION['kd']]);

        $d = array();
        if ($result){
            $d = ['respons' => 'berhasil update'];
        }else{
            $d = ['respons' => 'gagal update'];
        }
        return $d;
    }

    public function profil2(){
        $date = date('Y-m-d H:i:s');
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('noHP'),
            'password' => md5($this->input->post('pass')),
            'modified_by' => $_SESSION['kd'],
            'modified_date' => $date
        );

        $result =  $this->db->update("user", $data, ['kd_user' => $_SESSION['kd']]);

        $d = array();
        if ($result){
            $d = ['respons' => 'berhasil update'];
        }else{
            $d = ['respons' => 'gagal update'];
        }
        return $d;
    }

    
}
?>