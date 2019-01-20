<?php

class mServis extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT transaksi_servis.*, pelanggan.nama AS namaPelanggan, 
                                user.nama AS namaTeknisi,
                                (CASE WHEN(transaksi_servis.status = '1') THEN 'Masuk Antrian' ELSE 'Selesai' END) AS status
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
        $q = $this->db->query("SELECT MAX(RIGHT(kd_transaksi,4)) as kode FROM transaksi_servis WHERE status!='0'", false);
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
                $kd = random_string('alnum', 3);
            }
        } else {
            $kd = random_string('alnum', 3);
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
                $kd = random_string('alnum', 2);
            }
        } else {
            $kd =  random_string('alnum', 2);
        }
        $kode = "BR".date('dm').$kd;
        $data = array(
            'kd_barang' => $kode
        );
        return $kode;
    }

    public function kode_spec(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_spec,2)) as kode FROM spec", false);
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k){
                $kd = random_string('alnum', 2);
            }
        } else {
            $kd = random_string('alnum', 2);
        }
        $kode = "SP".$kd;
        $data = array(
            'kd_spec' => $kode
        );
        return $kode;
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_transaksi', $kode);
        $this->db->delete('transaksi_servis');
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

    public function simpantrans(){
        $date = date('Y-m-d H:i:s');
        $kd_transaksi = $this->input->post('no_trans');

        $detail = array(
            'modified_by' => $_SESSION['kd'],
            'modified_at' => $date,
            'status' => 1
        ); 

        $update = $this->db->update("detail_servis", $detail, ['kd_transaksi' => $kd_transaksi]);

        $transaksi = array(
            'kd_transaksi' => $this->input->post('no_trans'),
            'tgl_transaksi' => $this->input->post('tgl_trans'),
            'kd_pelanggan' => $this->input->post('kdPelanggan'),
            'created_by' => $_SESSION['kd'],
            'date_created' => $date,
            'status' => 1
        );

        $result = $this->db->insert('transaksi_servis', $transaksi);

        $d = array();
        if ( $update && $transaksi){
            $d = ['respons' => 'berhasil transaksi'];
        }else{
            $d = ['respons' => 'gagal transaksi'];
        }
        return $d;
        $this->load->view('operator/index',$data);
    }

    public function simpan_transaksi(){
        $date = date('Y-m-d H:i:s');
        

        $detail = array(
            'kd_transaksi' => $this->input->post('no_trans'),
            'kd_barang' => $this->input->post('kdBarang'),
            'status' => 0,
            'tgl_terima' => $this->input->post('tgl_trans'),
            'kerusakan' => $this->input->post('kerusakan'),
            'created_by' => $_SESSION['kd'],
            'created_at' => $date,
        );

        $barang = array(
            'kd_barang' => $this->input->post('kdBarang'),
            'merk' => $this->input->post('merk'),
            'type' => $this->input->post('type'),
            'kd_pelanggan' => $this->input->post('kdPelanggan'),
            'jenis' => $this->input->post('jenis'),
            'kd_spec' => $this->input->post('spek'),
            'problem' => $this->input->post('kerusakan'),
            'kondisi' => $this->input->post('kondisi'),
            'progres' => 0,
            'kelengkapan' => $this->input->post('kelengkapan'),
            'create_by' => $_SESSION['kd'],
            'create_at' => $date
        );

        $spec = array(
            'kd_spec' => $this->input->post('spek'),
            'ram' => $this->input->post('ram'),
            'vga' => $this->input->post('vga'),
            'hdd' => $this->input->post('storage'),
            'prosesor' => $this->input->post('processor'),
            'keterangan' => $this->input->post('keterangan')
        );

        
        $simpanDetail = $this->db->insert('detail_servis', $detail);
        $simpanBarang = $this->db->insert('barang_servis', $barang);
        $simpanSpec = $this->db->insert('spec', $spec);

        $d = array();
        if ( $simpanBarang && $simpanDetail && $simpanSpec){
            $d = ['respons' => 'berhasil transaksi'];
        }else{
            $d = ['respons' => 'gagal transaksi'];
        }
        return $d;
    }

    public function hapus_data(){
        $detail =  $this->input->post('idDetail');
        $barang = $this->input->post('idBarang');

        $hapusBarang = $this->db->query("DELETE FROM barang_servis WHERE kd_barang='$barang'");
        $hapusDetail = $this->db->query("DELETE FROM detail_servis WHERE id_detail='$detail'");
        

        $data = array();
        if ( $hapusDetail){
            $data = ['respons' => 'berhasil hapus'];
        }else{
            $data = ['respons' => 'gagal hapus'];
        }
        return $hapusBarang;
    }
}
?>