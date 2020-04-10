<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=BASEURL?>index3.html" class="brand-link">
      <img src="<?=BASEURL?>img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Elenka</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=BASEURL?>img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?= isset($_SESSION['elenka_adminsession']) ? $_SESSION['elenka_adminname'] : "" ; ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=BASEURL?>admin" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">DOCUMENT</li>
          <li class="nav-item">
            <a href="<?=BASEURL?>admin/arsip" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Bank Soal
              </p>
            </a>
          </li>
          <li class="nav-item">
            <!-- <a href="#" class="nav-link"> -->
            <a href="<?=BASEURL?>admin/listsiswa" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Daftar Siswa
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
           <a href="<?=BASEURL?>Admin/report" class="nav-link">
             <i class="nav-icon far fa-file-pdf"></i>
             <p>
               Laporan
             </p>
           </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
