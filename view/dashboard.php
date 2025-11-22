<?php
require '../model/anggota_function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $title = "Dashboard";
    require '../global/header.php';
    ?>
</head>
<body class="sb-nav-fixed">
<?php
require '../global/navigation_header.php';
?>
<div id="layoutSidenav">
    <?php
    require '../global/sidebar.php';
    ?>
    <!-- Main Content -->
    <div id="layoutSidenav_content">
        <main class="container-fluid px-4 mt-4">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb bg-light p-2 rounded">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>

            <!-- Welcome Card -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card shadow-sm p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2>Selamat Datang, <?= isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Pengguna' ?>!</h2>
                                <p class="text-muted">Semoga hari anda produktif dan menyenangkan.</p>
                            </div>
                            <div>
                                <i class="bi bi-speedometer2 display-1 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Cards -->
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-white bg-primary shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Anggota</h5>
                            <p class="card-text fs-2">
                                <?= $list = getAnggotaList()->num_rows ?>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="../view/anggota_list.php" class="text-white text-decoration-none">Lihat Senarai <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">Aktiviti Terbaru</h5>
                            <p class="card-text fs-2">5</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="#" class="text-white text-decoration-none">Lihat <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">Notifikasi</h5>
                            <p class="card-text fs-2">3</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="#" class="text-white text-decoration-none">Lihat <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <?php
        require '../global/script.php';
        ?>
    </div>
</div>
</body>
</html>
