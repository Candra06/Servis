      
      <div class="br-pagetitle">
      <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div class="" style="width: 90%;">
          <h4><?= $header ?></h4>
        </div> 
        <div style="width: 40%; float: right; padding-left: 170px;">
          <a href="" data-toggle="modal" data-target="#addPelanggan" style="width: 150px; margin-right:5px;" class="btn btn-primary btn-block mg-b-5"><i class="fa fa fa-plus mg-r-10"> </i>Add Pelanggan</a>   
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">        
        <div class="br-section-wrapper">
    
          <h6 class="br-section-label">Detail Transaksi</h6>          
          <div class="form-layout form-layout-1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mg-b-25">

              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Nomor Transaksi: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" id="kd_transaksi" name="kd_transaksi" value="<?php echo $kode_user; ?>" placeholder="Masukkan Total Harga" required disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Tanggal Transaksi: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="date" id="tgl_transaksi" name="tgl_transaksi" value="<?= date('Y-m-d'); ?>" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Operator: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="teks" value="<?= $_SESSION['nama'] ?>" placeholder="Masukkan Masukkan No HP" disabled required>
                  <input class="form-control form-control-dark" type="hidden" id="operator" name="operator" value="<?= $_SESSION['kd'] ?>" placeholder="Masukkan Masukkan No HP" disabled required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Nama Pelanggan <span class="tx-danger">*</span></label>
                  <select class="form-control form-control-dark select-2" id="pelanggan" name="pelanggan" placeholder="Pilih Status" Required>
                    <option value="">Pilih Pelanggan</option>
                    <?php foreach ($dataPelanggan as $dp) {?>
                    <option value="<?= $dp['kd_pelanggan'];?>"><?= $dp['nama']?></option>
                    <?php } ?>
                    
                  </select>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            </form>
          </div><!-- form-layout -->

         
        
          <h6 class="br-section-label">Data Barang</h6>
          
          <div class="form-layout form-layout-1">
            <!-- <form action="" method="post" enctype="multipart/form-data"> -->
            <div class="row mg-b-25">
              
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Jenis: <span class="tx-danger">*</span></label>
                  <select class="form-control form-control-dark select-2" id="jenis" name="jenis" onchange="java_script_:jenisBarang(this.options[this.selectedIndex].value)" placeholder="Pilih Jenis" required>
                    <option value="">Pilih Jenis Barang</option>
                    <option value="1">Laptop</option>
                    <option value="2">PC</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Merk Barang: <span class="tx-danger">*</span></label>

                  <select class="form-control form-control-dark select-2" id="merk" name="merk" placeholder="Pilih Merk">
                    <option value="">Pilih Merk</option>
                    <option value="ASUS">ASUS</option>
                    <option value="Acer">Acer</option>
                    <option value="Dell">Dell</option>
                    <option value="Hp">Hp</option>
                    <option value="Fujitsu">Fujitsu</option>
                    <option value="Compact">Compact</option>
                    <option value="Toshiba">Toshiba</option>
                    <option value="Lenovo">Lenovo</option>
                    <option value="Axioo">Axioo</option>
                  </select>
                  <input class="form-control form-control-dark" type="hidden" id="kd_barang" name="kd_barang" value="<?= $kode_barang ?>" placeholder="Masukkan Type" required>
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Type: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" id="type" name="type" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan Type" required>
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">RAM: <span class="tx-danger">*</span></label>
                  <select class="form-control form-control-dark select-2" id="ram" name="ram" placeholder="Pilih ram">
                    <option value="">Pilih RAM</option>
                    <option value="2gb DDR3">2gb DDR3</option>
                    <option value="4gb DDR3">4gb DDR3</option>
                    <option value="6gb DDR3">6gb DDR3</option>
                    <option value="8gb DDR3">8gb DDR3</option>
                    <option value="2gb DDR4">2gb DDR4</option>
                    <option value="4gb DDR4">4gb DDR4</option>
                    <option value="6gb DDR4">6gb DDR4</option>
                    <option value="8gb DDR4">8gb DDR4</option>
                  </select>
                  <input class="form-control form-control-dark" type="hidden" id="kd_spec" name="kd_spec" value="<?= $kode_spec; ?>" placeholder="Masukkan Type" required>
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">VGA: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" id="vga" name="vga" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Kapasitas dan Type VGA" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Storage: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" id="storage" name="storage" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Kapasitas dan Type Storage" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Processor: <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" id="processor" name="processor" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Type Processor" required>
                </div>
              </div><!-- col-4 -->

             
             <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Kondisi Barang: <span class="tx-danger">*</span></label>
                <textarea rows="2" id="kondisi" name="kondisi" class="form-control form-control-dark" placeholder="Masukkan Kondisi Barang"></textarea>
                </div>
              </div><!-- col-4 -->
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
                  <textarea rows="2" id="kelengkapan" name="kelengkapan" class="form-control form-control-dark" placeholder="Masukkan Kelengkapan Barang"></textarea>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                  <button class="btn btn-primary" id="tampil" onclick="java_script_:simpanData()">Tambahkan</button> 
                </div>
              </div>

              <script type="text/javascript">

                function tampil() {
                  
                  $.ajax({
                    type: 'ajax',
                    url: '<?=base_url()?>Servis/tampilBarang',
                    async: false,
                    dataType: "JSON",
                    success: function(data){
                      var html = '';
                      var i;
                      var no=1;
                      for (i=0; i<data.length; i++) {
                        var barang = JSON.stringify(data[i].kd_barang);
                        var y = "<td style='text-align:right;'><button type='button' class='btn btn-danger mg-r-5 mg-b-10' onclick='java_script_:hapus("+data[i].id_detail+","+barang+")'><div><i class='fa fa-trash'></i></div></button></td>";
                        html += '<tr>'+
                                  '<td>'+no+'</td>'+
                                  '<td>'+data[i].kd_barang+'</td>'+
                                  '<td>'+data[i].merk+' '+data[i].type+'</td>'+
                                  '<td>'+data[i].jenis_barang+'</td>'+
                                  '<td>'+data[i].nama+'</td>'+
                                  '<td>'+data[i].problem+'</td>'+
                                  '<td>'+
                                    // '<button type="button" class="btn btn-primary mg-r-5 mg-b-10" onclick="java_script_:hapus('+data[i].id_detail+','+barang+','+data[i].merk+','+data[i].type+','+data[i].problem+','++','++','++','+)"><div><i class="fa fa-pencil-alt"></i></div></button>'+' '+
                                    '<button type="button" class="btn btn-danger mg-r-5 mg-b-10" onclick="java_script_:hapus('+data[i].id_detail+','+barang+')"><div><i class="fa fa-trash"></i></div></button></td>'+
                                '</tr>';
                                no++;
                      }
                      $('#show').html(html);
                      JSON.stringify;
                    },error: function(data){
                      
                    }
                  })
                }

                function hapus(detail,barang) {
                  var idDetail  = detail;
                  var idBarang  = barang;

                  $.ajax({
                    type: "POST",
                    url: '<?= base_url()?>/Servis/hapusData',
                    dataType: "JSON",
                    data: { 
                      idDetail: idDetail,
                      idBarang: idBarang
                     },
                    success: function(data){
                      tampil();
                      alert(data);
                    },error: function(data) {
                      console.log(data);
                      alert(data);
                    }
                  })
                }

                function simpanTransaksi(){
                  var no_trans      = $('#kd_transaksi').val();
                  var tgl_trans     = $('#tgl_transaksi').val();
                  var kdPelanggan   = document.getElementById("pelanggan").value;

                  $.ajax({
                    type: "POST",
                    url: '<?= base_url() ?>Servis/simpanTransaksi',
                    dataType: "JSON",
                    data: {
                      no_trans: no_trans,
                      tgl_trans: tgl_trans,
                      kdPelanggan: kdPelanggan
                    },success: function(data){
                      tampil();
                      resetPelanggan();
                    },error: function(data){
                      
                    }
                  }) 
                }

                function simpanData(){
                  var no_trans      = $('#kd_transaksi').val();
                  var tgl_trans     = $('#tgl_transaksi').val();
                  var kdPelanggan   = document.getElementById("pelanggan").value;
                  var kdBarang      = $('#kd_barang').val();
                  var jenis         = $('#jenis').val();
                  var merk          = $('#merk').val();
                  var type          = $('#type').val();   
                  var kerusakan     = $('#kerusakan').val();
                  var keterangan    = $('#keterangan').val();
                  var spek          = $('#kd_spec').val();
                  var ram           = $('#ram').val();
                  var vga           = $('#vga').val();
                  var storage       = $('#storage').val();
                  var processor     = $('#processor').val();
                  var kondisi       = $('#kondisi').val();
                  var kelengkapan   = $('#kelengkapan').val();
                  var keterangan    = $('#keterangan').val();      

                  $.ajax({      //simpan ke tabel transaksi servis
                    type: "POST",
                    url: '<?= base_url() ?>Servis/simpanData',
                    dataType: "JSON",
                    data: {
                      no_trans: no_trans,
                      tgl_trans: tgl_trans,
                      kdPelanggan: kdPelanggan,
                      merk: merk,
                      kdBarang: kdBarang,     //simpan ke tabel barang
                      jenis: jenis,
                      spek: spek,
                      type: type,
                      keterangan: keterangan,   //simpan ke tabel transaksi detail
                      kelengkapan: kelengkapan,
                      ram: ram,
                      vga: vga,
                      kondisi: kondisi,
                      storage: storage,
                      processor: processor,
                      kerusakan: kerusakan,
                    },success: function(data){
                      tampil();
                      resetBarang();
                    },error: function(data){
                      
                    }
                  })
                }

                function resetBarang(){
                  $('#merk').val('');
                  $('#merk').trigger('change');
                  $('#ram').val('');
                  $('#ram').trigger('change');
                  document.getElementById("jenis").value = '';
                  document.getElementById("type").value = '';
                  document.getElementById("kerusakan").value = '';
                  document.getElementById("keterangan").value = '';
                  document.getElementById("kondisi").value = '';
                  document.getElementById("vga").value = '';
                  document.getElementById("storage").value = '';
                  document.getElementById("processor").value = '';
                  document.getElementById("kelengkapan").value = '';
                }

                function resetPelanggan() {
                  $('#pelanggan').val('');
                  $('#pelanggan').trigger('change');
                }
              </script>
             
              <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                <div class="bd bd-white-1 rounded table-responsive">
                  <table class="table mg-b-0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Pelanggan</th>
                        <th>Problem</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="show">
                     
                    </tbody>
                    </table>
                    </div>
                </div>
              </div>
              
            </div><!-- row -->
            <!-- </form> -->
          </div><!-- form-layout -->



          <h6 class="br-section-label"></h6>


            <div class="form-layout-footer">
              <button class="btn btn-primary" id="simpan" onclick="java_script_:simpanTransaksi()">Simpan</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
        
          

          
        </div><!-- br-section-wrapper -->
      
      </div><!-- br-pagebody -->

      <!-- BASIC MODAL -->
      <div id="addPelanggan" class="modal fade">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bd-0 tx-14">
              <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Pelanggan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-25">
                <div class="form-group">
                  <label class="form-control-label">Kode Pelanggan: <span class="tx-danger">*</span></label>
                  <input class="form-control " type="text" id="kd_pelanggan" name="kd_pelanggan" value="<?php  if( $data == null){ echo $kode_pelanggan; } else { echo Input_helper::postOrOr('kd_pelanggan', $data['kd_pelanggan']); } ?>" placeholder="Kode Pelanggan" disabled required>
                  <!-- <input class="form-control form-control-dark" type="hidden" name="kd_user" value="<?= Input_helper::postOrOr('kd_user', $data['kd_user']) ?>" placeholder="Kode Teknisi" disabled> -->
                </div>
                <div class="form-group">
                  <label for="form-control-label" class="">Nama</label>
                  <input type="text" name="namaPl" id="namaPl" value="" class="form-control pd-y-12" placeholder="Masukkan Nama">
                </div><!-- form-group -->
                <div class="form-group">
                  <label for="form-control-label" class="">Pekerjaan</label>
                  <input type="email" name="pekerjaanPl" id="pekerjaanPl" value="" class="form-control pd-y-12" placeholder="Masukkan Pekerjaan">
                </div><!-- form-group -->
                <div class="form-group">
                  <label for="form-control-label" class="">Alamat</label>
                  <textarea rows="2" id="alamatPl" name="alamatPl" value="" class="form-control" placeholder="Masukkan Alamat"></textarea>
                </div><!-- form-group -->
                <div class="form-group">
                  <label for="form-control-label" class="">No HP</label>
                  <input type="text" name="no_hpPl" id="no_hpPl" value="" class="form-control pd-y-12" placeholder="Masukkan No HP">
                </div><!-- form-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" onclick="java_script_:simpanPelanggan()">Simpan</button>
                <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

      <script type="text/javascript">
      $(function(){
        tampil()        
        $('.form-layout .form-control').on('focusin', function(){
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // $('select').selectize(options);
       

        // Select2
        $('#jenis').select2({
          minimumResultsForSearch: Infinity
        });

        $(' #pelanggan, #merk, #ram').select2({
         
        });

        $('#merk').selectize({
            create: true,
            sortField: 'text'
        });

        $('#jenis').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#jenis').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });

      function jenisBarang(select_item){
        if(select_item == "1"){
          document.getElementById("kelengkapanSelect").style.visibility = 'visible';
          document.getElementById("kelengkapanSelect").style.display = 'block';
        }else{
          document.getElementById("kelengkapanSelect").style.display = 'none';
          document.getElementById("kelengkapanSelect").style.visibility = 'hidden';
        }
        
      }

      function simpanPelanggan() {
        var kdPelanggan   = $('#kd_pelanggan').val();
        var namaPl        = $('#namaPl').val();
        var alamat        = $('#alamatPl').val();
        var pekerjaan     = $('#pekerjaanPl').val();
        var no_hp         = $('#no_hpPl').val();

        $.ajax({
          type: "POST",
          url: '<?= base_url() ?>Servis/addPelanggan',
          dataType: "JSON",
          data: {
            kdPelanggan: kdPelanggan,
            namaPl: namaPl,
            alamat: alamat,
            pekerjaan: pekerjaan,
            no_hp: no_hp
          },success: function(data){
           
          },error: function(data){
           
          }
        })
      }

      

     
    </script>
     
