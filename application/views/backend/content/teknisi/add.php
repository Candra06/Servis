      
      <div class="br-pagetitle">
      <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div class="" style="width: 90%;">
          <h4><?= $header ?></h4>
        </div>  
      </div><!-- d-flex -->

      <div class="br-pagebody">
      <div class="br-section-wrapper">
          <h6 class="br-section-label">Input Data Teknisi</h6>
          <p class="br-section-text">A form with a label on top of each form control.</p>

          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Kode Teknisi: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="kode" value="" placeholder="Kode Teknisi">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nama Lengkap: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="nama" value="" placeholder="Masukkan Nama Lengkap">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nomor Telp: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="number" name="no_hp" value="" placeholder="Masukkan Masukkan No HP">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="email" value="" placeholder="Masukkan Email">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="password" name="password" value="" placeholder="Masukkan Password">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Level: <span class="tx-danger">*</span></label>
                  <select name="level" class="form-control select2" data-placeholder="Pilih Level">
                    <option label="Level"></option>
                    <option value="1">Admin</option>
                    <option value="2">Teknisi</option>
                    
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Alamat: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="address" value="Market St. San Francisco" placeholder="Enter address">
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                  <select name="status" class="form-control select2" data-placeholder="Pilih Status">
                    <option label="Status"></option>
                    <option value="1">Aktif</option>
                    <option value="0">Banned</option>
                    
                  </select>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-primary">Submit</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
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
     
