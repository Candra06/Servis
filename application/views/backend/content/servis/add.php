      
      <div class="br-pagetitle">
      <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div class="" style="width: 90%;">
          <h4><?= $header ?></h4>
        </div>  
      </div><!-- d-flex -->

      <div class="br-pagebody">
      <div class="br-section-wrapper">
          <h6 class="br-section-label">Data Pelanggan</h6>
          
          <div class="form-layout form-layout-1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Kode Pelanggan: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="kd_user" value="<?php  if( $data == null){ echo $kode_user; } else { echo Input_helper::postOrOr('kd_user', $data['kd_user']); } ?>" placeholder="Kode Teknisi" required>
                  <!-- <input class="form-control form-control-dark" type="hidden" name="kd_user" value="<?= Input_helper::postOrOr('kd_user', $data['kd_user']) ?>" placeholder="Kode Teknisi" disabled> -->
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nama Pelanggan <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="nama" value="<?= Input_helper::postOrOr('nama', $data['nama']) ?>" placeholder="Masukkan Nama Lengkap" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Pekerjaan: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="pekerjaan" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan Masukkan No HP" required>
                </div>
              </div><!-- col-4 -->
              
              

              <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Alamat: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="alamat" value="<?= Input_helper::postOrOr('alamat', $data['alamat']) ?>" placeholder="Masukkan Alamat" required>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Nomor Telp: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="number" name="no_hp" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan Masukkan No HP" required>
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
                  <input class="form-control form-control-dark" type="text" name="nama_barang" value="<?= Input_helper::postOrOr('nama', $data['nama']);  ?>" placeholder="Masukkan Nama Barang" required disabled>
                  <input class="form-control form-control-dark" type="hidden" name="kd_barang" value="<?= Input_helper::postOrOr('kd_barang', $data['kd_barang']) ?>" placeholder="Kode Teknisi" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Jenis: <span class="tx-danger">*</span></label>
                  <select class="form-control form-control-dark select-2" name="jenis" placeholder="Pilih Status">
                    <option value="">Pilih Jenis Barang</option>
                    <option value="1">Laptop</option>
                    <option value="2">PC</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Nomor Seri: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="number" name="no_seri" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan No Seri" required>
                </div>
              </div><!-- col-4 -->
              
              

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Spesifikasi: <span class="tx-danger">*</span></label>
                  <textarea rows="2" name="spek" class="form-control form-control-dark" placeholder="Masukkan Spesifikasi Barang"></textarea>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Kerusakan: <span class="tx-danger">*</span></label>
                  <textarea rows="2" name="kerusakan" class="form-control form-control-dark" placeholder="Masukkan Keluhan Barang"></textarea>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Keterangan: <span class="tx-danger">*</span></label>
                <textarea rows="2" name="keterangan" class="form-control form-control-dark" placeholder="Masukkan Keterangan"></textarea>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
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

          <h6 class="br-section-label">Pembayaran</h6>
          
          <div class="form-layout form-layout-1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Kode Teknisi: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="kd_user" value="<?php  if( $data == null){ echo $kode_user; } else { echo Input_helper::postOrOr('kd_user', $data['kd_user']); } ?>" placeholder="Kode Teknisi" required disabled>
                  <!-- <input class="form-control form-control-dark" type="hidden" name="kd_user" value="<?= Input_helper::postOrOr('kd_user', $data['kd_user']) ?>" placeholder="Kode Teknisi" disabled> -->
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nama Lengkap: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="nama" value="<?= Input_helper::postOrOr('nama', $data['nama']) ?>" placeholder="Masukkan Nama Lengkap" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Nomor Telp: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="number" name="no_hp" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan Masukkan No HP" required>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            </form>
          </div><!-- form-layout -->

          <h6 class="br-section-label"></h6>


            <div class="form-layout-footer">
              <button class="btn btn-primary">Submit</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
        
          

          
        </div><!-- br-section-wrapper -->

      </div><!-- br-pagebody -->

      <script>
      $(function(){
        'use strict'

        $('.form-layout .form-control').on('focusin', function(){
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });
    </script>
     
