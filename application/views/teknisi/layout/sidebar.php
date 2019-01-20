<!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>Prima <i>Comp</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="<?= base_url('dashboard1');?>" class="br-menu-link <?= base_url('dashboard1');?>">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="<?= base_url('pelanggan/indexTeknisi');?>" class="br-menu-link <?= (($this->uri->segment(1) == 'pelanggan' ? 'active' : ''))?>">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Data Pelanggan</span>
          </a><!-- br-menu-link -->
        </li>
 
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Data Barang</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?= base_url('barang');?>" class="sub-link <?= base_url('barang');?>">Barang Servis</a></li>
          </ul>
        </li><!-- br-menu-item -->
      
      </ul><!-- br-sideleft-menu -->

      

      
      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

   