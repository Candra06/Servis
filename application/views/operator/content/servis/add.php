      
      <div class="br-pagetitle">
      <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div class="" style="width: 90%;">
          <h4><?= $header ?></h4>
        </div>  
      </div><!-- d-flex -->

      <div class="br-pagebody">
      <div class="br-section-wrapper">
        <h6 class="br-section-label">Detail Transaksi</h6>
          
          <div class="form-layout form-layout-1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nomor Transaksi: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" id="kd_transaksi" name="kd_transaksi" value="<?php  if( $data == null){ echo $kode_user; } else { echo Input_helper::postOrOr('kd_user', $data['kd_user']); } ?>" placeholder="Masukkan Total Harga" required disabled>
                  <!-- <input class="form-control form-control-dark" type="hidden" name="kd_user" value="<?= Input_helper::postOrOr('kd_user', $data['kd_user']) ?>" placeholder="Kode Teknisi" disabled> -->
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Tanggal Transaksi: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="date" id="tgl_transaksi" name="tgl_transaksi" value="<?= date('Y-m-d'); ?>" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Teknisi: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="teks" id="teknisi" name="teknisi" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan Masukkan No HP" required>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            </form>
          </div><!-- form-layout -->

          <h6 class="br-section-label">Data Pelanggan</h6>
          
          <div class="form-layout form-layout-1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Kode Pelanggan: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" id="kd_pelanggan" name="kd_pelanggan" value="<?php  if( $data == null){ echo $kode_pelanggan; } else { echo Input_helper::postOrOr('kd_pelanggan', $data['kd_pelanggan']); } ?>" placeholder="Kode Teknisi" required>
                  <!-- <input class="form-control form-control-dark" type="hidden" name="kd_user" value="<?= Input_helper::postOrOr('kd_user', $data['kd_user']) ?>" placeholder="Kode Teknisi" disabled> -->
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nama Pelanggan <span class="tx-danger">*</span></label>
                  <select class="form-control form-control-dark select-2" id="pelanggan" name="jenis" placeholder="Pilih Status" onchange="java_script_:getPelanggan(this.options[this.selectedIndex].value)">
                    <option value="">Pilih Pelanggan</option>
                    <?php foreach ($dataPelanggan as $dp) {?>
                    <option value="<?= $dp['kd_pelanggan'];?>"><?= $dp['nama']?></option>
                    <?php } ?>
                    
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Pekerjaan: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" id="pekerjaan" name="pekerjaan" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan Masukkan No HP" required>
                </div>
              </div><!-- col-4 -->
              
              

              <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Alamat: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" id="alamat" name="alamat" value="<?= Input_helper::postOrOr('alamat', $data['alamat']) ?>" placeholder="Masukkan Alamat" required>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Nomor Telp: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="number" id="no_hp" name="no_hp" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan Masukkan No HP" required>
                </div>
              </div><!-- col-4 -->
              
            </div><!-- row -->
            </form>
          </div><!-- form-layout -->

        
          <h6 class="br-section-label">Data Barang</h6>
          
          <div class="form-layout form-layout-1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nama Barang: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" id="nama_barang" name="nama_barang" value="<?= Input_helper::postOrOr('nama', $data['nama']);  ?>" placeholder="Masukkan Nama Barang" required>
                  <input class="form-control form-control-dark" type="hidden" id="kd_barang" name="kd_barang" value="<?php  if( $data == null){ echo $kode_barang; } else { echo Input_helper::postOrOr('kd_barang', $data['kd_barang']); } ?>" placeholder="Kode Teknisi" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Jenis: <span class="tx-danger">*</span></label>
                  <select class="form-control form-control-dark select-2" id="jenis" name="jenis" onchange="java_script_:jenisBarang(this.options[this.selectedIndex].value)" placeholder="Pilih Status">
                    <option value="">Pilih Jenis Barang</option>
                    <option value="1">Laptop</option>
                    <option value="2">PC</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Nomor Seri: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="number" id="no_seri" name="no_seri" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan No Seri" required>
                </div>
              </div><!-- col-4 -->
              
              

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Spesifikasi: <span class="tx-danger">*</span></label>
                  <textarea rows="2" id="spek" name="spek" class="form-control form-control-dark" placeholder="Masukkan Spesifikasi Barang"></textarea>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Kerusakan: <span class="tx-danger">*</span></label>
                  <textarea rows="2" id="kerusakan" name="kerusakan" class="form-control form-control-dark" placeholder="Masukkan Keluhan Barang"></textarea>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Keterangan: <span class="tx-danger">*</span></label>
                <textarea rows="2" id="keterangan" name="keterangan" class="form-control form-control-dark" placeholder="Masukkan Keterangan"></textarea>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4" id="kelengkapanSelect" style="display:none;visibility: hiddden;">
                <div class="form-group">
                  <label class="form-control-label">Kelengkapan: <span class="tx-danger">*</span></label>
                  <label class="ckbox">
                    <input type="checkbox" name="tas"><span>Tas</span>
                  </label>
                  <label class="ckbox">
                    <input type="checkbox" name="charger"><span>Charger</span>
                  </label>
                </div>
              </div><!-- col-4 -->
              
              
            </div><!-- row -->
            </form>
          </div><!-- form-layout -->

          <h6 class="br-section-label">Pelayanan</h6>
          
          <div class="form-layout form-layout-1">
            
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Jumlah Harga: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="number" id="jml_bayar" name="jml_bayar" value="<?php  if( $data == null){ echo $kode_user; } else { echo Input_helper::postOrOr('kd_user', $data['kd_user']); } ?>" placeholder="Masukkan Total Harga" required >
                  <!-- <input class="form-control form-control-dark" type="hidden" name="kd_user" value="<?= Input_helper::postOrOr('kd_user', $data['kd_user']) ?>" placeholder="Kode Teknisi" disabled> -->
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Tanggal Terima: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="date" id="tgl_terima" name="tgl_terima" value="<?= Input_helper::postOrOr('nama', $data['nama']) ?>" placeholder="Masukkan Nama Lengkap" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Tanggal Selesai: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="date" id="tgl_selesai" name="tgl_selesai" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan Masukkan No HP" required>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
           
          </div><!-- form-layout -->

          <h6 class="br-section-label"></h6>


            <div class="form-layout-footer">
              <button class="btn btn-primary" id="simpan" onclick="java_script_:simpanData()">Submit</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
        
          

          
        </div><!-- br-section-wrapper -->

      </div><!-- br-pagebody -->

      <script type="text/javascript">
      $(function(){
        'use strict'

        $('.form-layout .form-control').on('focusin', function(){
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('#jenis').select2({
          minimumResultsForSearch: Infinity
        });

        $(' #pelanggan').select2({
         
        });

        $('#jenis').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#jenis').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });

      function getPelanggan(select_item){
        $.ajax({
          type: 'post',
          url: '<?= base_url()."Servis/dtPelanggan"?>',
          dataType: 'JSON',
          data: {
            get_option:select_item
          },
          success: function(response){
            document.getElementById('kd_pelanggan').value=response[0].kd_pelanggan;
            document.getElementById('pekerjaan').value=response[0].pekerjaan;
            document.getElementById('alamat').value=response[0].alamat;
            document.getElementById('no_hp').value=response[0].no_hp;
            document.getElementById('kd_pelanggan').disabled = true;
            document.getElementById('pekerjaan').disabled = true;
            document.getElementById('alamat').disabled = true;
            document.getElementById('no_hp').disabled = true;
          },error: function(XMLHttpRequest, textStatus, errorThrown){
            alert("Status: "+textStatus);
            alert("Error: "+errorThrown);
          }
        })
      }

      function jenisBarang(select_item){
        if(select_item == "1"){
          document.getElementById("kelengkapanSelect").style.visibility = 'visible';
          document.getElementById("kelengkapanSelect").style.display = 'block';
        }else{
          document.getElementById("kelengkapanSelect").style.display = 'none';
          document.getElementById("kelengkapanSelect").style.visibility = 'hidden';
        }
        
      }

      function simpanData(){
        var no_trans      = $('#kd_transaksi').val();
        var tgl_trans     = $('#tgl_transaksi').val();
        var kdPelanggan   = $('#kd_pelanggan').val();
        var kdBarang      = $('#kd_barang').val();
        var jenis         = $('#jenis').val();
        var terima        = $('#tgl_terima').val();
        var selesai       = $('#tgl_selesai').val();   
        var kerusakan     = $('#kerusakan').val();
        var keterangan    = $('#keterangan').val();
        var spek          = $('#spek').val();
        var no_seri       = $('#no_seri').val();
        var namaBarang    = $('#nama_barang').val();
        var teknisi       = $('#teknisi').val();

        $.ajax({      //simpan ke tabel transaksi servis
          type: "POST",
          url: '<?= base_url() ?>Servis/simpanTransaksi',
          dataType: "JSON",
          data: {
            no_trans: no_trans,
            tgl_trans: tgl_trans,
            kdPelanggan: kdPelanggan,
            teknisi: teknisi,
            kdBarang: kdBarang,     //simpan ke tabel barang
            namaBarang: namaBarang,
            jenis: jenis,
            spek: spek,
            no_seri: no_seri,
            keterangan: keterangan,   //simpan ke tabel transaksi detail
            terima: terima,
            selesai: selesai,
            kerusakan: kerusakan
          },success: function(data){
            console.log(data);
          },error: function(data){
            console.log(data);
          }
        })
      }
    </script>
     
