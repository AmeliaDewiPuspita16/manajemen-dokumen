<?php
session_start();

include '../config/conn.php';

$username = $_SESSION['username'];

include 'includes/header.php';
include 'includes/navbar.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat Datang <?php echo $username ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Dokumen yang Terdaftar</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php
                    include('../config/conn.php');
                    $sql = "SELECT COUNT(*) as total FROM dokumen";
                    $result = mysqli_query($conn, $sql);  

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $totalUsers = $row['total'];
                        echo $totalUsers;
                    } else {
                        echo "Belum ada skripsi yang terdaftar";
                    }
                  ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>