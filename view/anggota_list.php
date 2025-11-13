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
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Senarai Anggota</span>
                        <a href="tambah_anggota.php" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Anggota
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Nama Penuh</th>
                                    <th>IC Baru</th>
                                    <th>No Telefon</th>
                                    <th>Warganegara</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
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
                                            <div class="d-flex">
                                                <a href="../view/anggota_view.php?id=<?= $anggota['id'] ?>" class="btn btn-info btn-md text-white me-2">
                                                    <i class="bi bi-eye"></i>
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
            </main>
        </div>

    <?php
    require '../global/script.php';
    ?>
</div>
</body>
</html>
