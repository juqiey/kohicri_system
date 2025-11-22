<?php
require '../model/anggota_function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $title = "Senarai Anggota";
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
                    <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Senarai Anggota</li>
                </ol>
            </nav>

            <!-- Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Senarai Anggota</h5>
                            <a href="../view/form.php" class="btn btn-sm btn-primary">
                                <i class="bi bi-plus-circle"></i> Tambah Anggota
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="datatablesSimple">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Nama Penuh</th>
                                        <th>IC Baru</th>
                                        <th>No Telefon</th>
                                        <th>Warganegara</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot class="table-light">
                                    <tr>
                                        <th>Nama Penuh</th>
                                        <th>IC Baru</th>
                                        <th>No Telefon</th>
                                        <th>Warganegara</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $list = getAnggotaList();
                                    while ($anggota = $list->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?= $anggota['nama_penuh'] ?></td>
                                            <td><?= $anggota['ic_baru'] ?></td>
                                            <td><?= $anggota['no_telefon_mobile_1'] ?></td>
                                            <td><?= $anggota['warganegara'] ?></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="../view/anggota_view.php?id=<?= $anggota['id'] ?>" class="btn btn-info btn-sm text-white">
                                                        <i class="bi bi-eye"></i> Lihat
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row end -->
        </main>

        <?php
        require '../global/script.php';
        ?>
    </div>
</div>
</body>
</html>
