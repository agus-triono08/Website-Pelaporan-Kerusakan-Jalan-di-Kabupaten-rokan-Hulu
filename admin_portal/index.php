<?php
include('_secure.php');
$title = 'Dashboard';
include('header.php');

include('include/db.php');
include('include/function.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include('nav.php'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-building"></i>
              </div>
              <div class="mr-5"><?php echo Total_user_masyarakat(); ?> Total User Masyarakat!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="data_masyarakat.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-exclamation-triangle"></i>
              </div>
              <div class="mr-5"><?php echo Total_laporan_kerusakan_jalan(); ?> Total Laporan Kerusakan Jalan!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="data_laporan_kerusakan_jalan.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->


    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
  </div>
</body>

</html>