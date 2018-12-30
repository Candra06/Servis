      
      <div class="br-pagetitle">
      <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div class="" style="width: 90%;">
          <h4><?= $header ?></h4>
        </div>  
      </div><!-- d-flex -->

      <div class="br-pagebody">
      <div class="br-section-wrapper">
          <h6 class="br-section-label">Input Data Pelanggan</h6>
          <p class="br-section-text">A form with a label on top of each form control.</p>

          <div class="form-layout form-layout-1">
          <form action="" method="post">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Kode Pelanggan: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="kode" value="<?php  if( $data == null){ echo $kode_pelanggan; } else { echo Input_helper::postOrOr('kd_pelanggan', $data['kd_pelanggan']); } ?>" placeholder="Masukkan Kode">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nama Lengkap: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="nama" value="<?= Input_helper::postOrOr('nama', $data['nama']) ?>" placeholder="Masukkan Nama Pelanggan">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nomor Telp: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="number" name="no_hp" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan No HP">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Alamat: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="alamat" value="<?= Input_helper::postOrOr('alamat', $data['alamat']) ?>" placeholder="Masukkan Alamat">
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Pekerjaan: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="pekerjaan" value="<?= Input_helper::postOrOr('pekerjaan', $data['pekerjaan']) ?>" placeholder="Masukkan Pekerjaan">
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-primary">Submit Form</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
            </form>
          </div><!-- form-layout -->
        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
     
