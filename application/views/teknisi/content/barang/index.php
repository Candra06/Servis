      
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
          <div class="" style="width: 90%;">
            <h4><?= $header ?></h4>
          </div>
          <div style="width: 15%; float: right;">
            <a href="<?= base_url('teknisi')?>/add" style="width: 120px; margin-right:5px;" class="btn btn-primary btn-block mg-b-5"><i class="fa fa fa-plus mg-r-10"> </i>Add Data</a>   
          </div>  
      </div><!-- d-flex -->


      <div class="br-pagebody">
      <?php
            if(isset($_SESSION['message'])){
              echo "<div style='margin-top:20px' class='alert alert-".$_SESSION['message'][0]."'>
                ".$_SESSION['message'][1]."
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
            }
          ?>
      <div class="table-wrapper responsive">
            <table id="datatable1" class="table responsive display">
              <thead>
                <tr>
                  <th class="wd-10p">Kode Barang</th>
                  <th class="wd-15p">Merk Barang</th>
                  <th class="wd-10p">Kode Pelanggan</th>
                  <th class="wd-15p">Nama Pemilik</th>
                  <th class="wd-15p">Progress</th>
                  <th class="wd-10p">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($data as $d){
                ?>
                <tr>
                  <td><?= $d['kd_barang']?></td>
                  <td><?= $d['merk'].' '.$d['type'];?></td>
                  <td><?= $d['kd_pelanggan']?></td>
                  <td><?= $d['nama']?></td>
                  <td><?= $d['progres']?></td>
                  <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Aksi
                        </button>
                        <div class="dropdown-menu">
                          <a class="form-control dropdown-item form-control-dark" href="<?= base_url().$this->uri->segment(1)."/progresCek/$d[kd_barang]"?>">Checking</a>
                          <a class="form-control dropdown-item form-control-dark" href="<?= base_url().$this->uri->segment(1)."/progresPerbaikan/$d[kd_barang]"?>">Perbaikan</a>
                          <a class="form-control dropdown-item form-control-dark" href="#">Ganti Sparepart</a>
                          <a class="form-control dropdown-item form-control-dark" href="<?= base_url().$this->uri->segment(1)."/progresSelesai/$d[kd_barang]"?>">Selesai</a>
                        </div>
                      </div>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->
      </div><!-- br-pagebody -->
     
