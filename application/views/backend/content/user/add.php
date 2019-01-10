      
      <div class="br-pagetitle">
      <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div class="" style="width: 90%;">
          <h4><?= $header ?></h4>
        </div>  
      </div><!-- d-flex -->

      <div class="br-pagebody">
      <div class="br-section-wrapper">
          <h6 class="br-section-label">Input Data User</h6>
          <p class="br-section-text">A form with a label on top of each form control.</p>

          <div class="form-layout form-layout-1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Kode User: <span class="tx-danger">*</span></label>
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
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="email" value="<?= Input_helper::postOrOr('email', $data['email']) ?>" placeholder="Masukkan Email" required >
                  <!-- <input class="form-control form-control-dark" type="hidden" name="kd_user" value="<?= Input_helper::postOrOr('kd_user', $data['kd_user']) ?>" placeholder="Kode Teknisi" disabled> -->
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="password" name="password" value="" placeholder="<?php if( $data == null){ echo 'Masukkan Password'; } else { echo 'Kosongkan Jika tidak ingin dirubah'; }; ?>">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Level: <span class="tx-danger">*</span></label>
                <?php 
                  $level = Input_helper::postOrOr('level', $data['level']);
                ?>
                <select class="form-control form-control-dark select-2" id="level" name="level" placeholder="Pilih Status">
                    <option value="">Pilih Level</option>
                    <option value="1" <?= ($level == '1' ? "selected" : '')?>>Admin</option>
                    <option value="2" <?= ($level == '2' ? "selected" : '')?>>Teknisi</option>
                    <option value="3" <?= ($level == '3' ? "selected" : '')?>>Operator</option>
                  </select>
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
                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                <?php 
                  $status = Input_helper::postOrOr('status', $data['status']);
                ?>
                  <select class="form-control form-control-dark select-2" id="status" name="status" placeholder="Pilih Status">
                    <option value="">Pilih Status</option>
                    <option value="1" <?= ($status == '1' ? "selected" : '')?>>Aktif</option>
                    <option value="0" <?= ($status == '0' ? "selected" : '')?>>Banned</option>
                    
                  </select>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-primary">Submit</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
            </form>
          </div><!-- form-layout -->

          
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
        $('#level, #status').select2({
          minimumResultsForSearch: Infinity
        });

        $('#level').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#status').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });
    </script>
     
