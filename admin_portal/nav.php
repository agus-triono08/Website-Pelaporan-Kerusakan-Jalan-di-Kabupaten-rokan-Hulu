<?php $file = $_SERVER["SCRIPT_NAME"];
$break = explode('/', $file);
$pfile = $break[count($break) - 1];

$pos = strpos($pfile, 'index');
if ($pos !== false) $is_Dashboard = true;

$pos = strpos($pfile, 'data_masyarakat');
if ($pos !== false) $is_Register_Services = true;

$pos = strpos($pfile, 'laporan_kerusakan_jalan.php');
if ($pos !== false) $is_Services_record = true;

$pos = strpos($pfile, 'data_profil_admin.php');
if ($pos !== false) $is_order_Detail = true;

$pos = strpos($pfile, 'lokasi_kerusakan_jalan.php');
if ($pos !== false) $is_Register_user = true;

$pos = strpos($pfile, 'Message-Info');
if ($pos !== false) $is_Message_Info = true;

$pos = strpos($pfile, 'change_password');
if ($pos !== false) $is_password_cahnge = true;
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.php">APKJ | Admin Portal</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item  <?php echo (isset($is_Dashboard) ? ' active' : '') ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link " href="index.php">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Dashboard</span>
        </a>
      </li>

      <li class="nav-item  <?php echo (isset($is_Register_Services) ? 'active' : '') ?>" data-toggle="tooltip" data-placement="right" title="Resister User">
        <a class="nav-link" href="data_masyarakat.php">
          <i class="fa fa-fw fa-users"></i>
          <span class="nav-link-text">Data Masyarakat</span>
        </a>
      </li>


      <li class="nav-item <?php echo (isset($is_Services_record) ? 'active' : '') ?>" data-toggle="tooltip" data-placement="right" title="Resister User">
        <a class="nav-link" href="data_laporan_kerusakan_jalan.php">
          <i class="fa fa-fw fa-exclamation-triangle"></i>
          <span class="nav-link-text">Data Laporan Kerusakan Jalan </span>
        </a>
      </li>

      <li class="nav-item <?php echo (isset($is_Register_user) ? 'active' : '') ?>" data-toggle="tooltip" data-placement="right" title="Resister User">
        <a class="nav-link" href="lokasi_kerusakan_jalan.php">
          <i class="fa fa-fw fa-map-marker"></i>
          <span class="nav-link-text">Lokasi Kerusakan Jalan</span>
        </a>
      </li>


      <li class="nav-item <?php echo (isset($is_order_Detail) ? 'active' : '') ?>" data-toggle="tooltip" data-placement="right" title="Delivery boy">
        <a class="nav-link" href="data_profil_admin.php">
          <i class="fa fa-fw fa-user-circle"></i>
          <span class="nav-link-text">Data Profile Admin</span>
        </a>
      </li>



    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>