<?php
require '../model/anggota_function.php';
$id = $_GET['id'];

// Fetch anggota data
$anggota = viewAnggota($id)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $title = "Maklumat Anggota";
    require '../global/header.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .resume-card {
            max-width: 900px;
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,.15);
        }
        .resume-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .resume-header h2 {
            margin: 0;
            font-weight: 700;
        }
        .resume-img {
            width: 150px;
            border-radius: 0.25rem;
            border: 1px solid #dee2e6;
        }
        .section-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: #343a40;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 0.3rem;
        }
        .detail-row {
            display: flex;
            margin-bottom: 0.5rem;
        }
        .detail-label {
            width: 200px;
            font-weight: 600;
            color: #495057;
        }
        .detail-value {
            flex: 1;
            color: #212529;
        }
        .checkbox-row {
            margin-bottom: 0.5rem;
        }
        .export-btn {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="sb-nav-fixed">
<?php require '../global/navigation_header.php'; ?>
<div id="layoutSidenav">
    <?php require '../global/sidebar.php'; ?>

    <!-- Main Content -->
    <div id="layoutSidenav_content">
        <main class="container-fluid px-4 mt-4">
            <div class="resume-card" id="resumeContent">

                <a href="../controller/export_pdf_exec.php?id=<?= $anggota['id'] ?>" class="btn btn-success mb-3">
                    <i class="bi bi-file-earmark-pdf"></i> Export PDF
                </a>


                <!-- Header with name and image -->
                <div class="resume-header">
                    <h2><?= $anggota['nama_penuh'] ?></h2>
                    <?php if(!empty($anggota['gambar_url'])): ?>
                        <img src="../img/<?= $anggota['gambar_url'] ?>" alt="Gambar" class="resume-img">
                    <?php endif; ?>
                </div>

                <!-- Butiran Peribadi -->
                <div class="mb-4">
                    <div class="section-title">Butiran Peribadi</div>
                    <div class="detail-row"><div class="detail-label">No IC Baru:</div><div class="detail-value"><?= $anggota['ic_baru'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">No IC Lama:</div><div class="detail-value"><?= $anggota['ic_lama'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">Alamat Tetap:</div><div class="detail-value"><?= $anggota['alamat_tetap'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">No Telefon Rumah:</div><div class="detail-value"><?= $anggota['no_telefon_rumah'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">No Telefon Mobile 1:</div><div class="detail-value"><?= $anggota['no_telefon_mobile_1'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">No Telefon Mobile 2:</div><div class="detail-value"><?= $anggota['no_telefon_mobile_2'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">Jantina:</div><div class="detail-value"><?= $anggota['jantina'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">Kaum:</div><div class="detail-value"><?= $anggota['kaum'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">Status Perkahwinan:</div><div class="detail-value"><?= $anggota['status_perkahwinan'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">Pekerjaan:</div><div class="detail-value"><?= $anggota['pekerjaan'] ?> <?= !empty($anggota['jawatan']) ? '(' . $anggota['jawatan'] . ')' : '' ?></div></div>
                    <div class="detail-row"><div class="detail-label">No Akaun Bank:</div><div class="detail-value"><?= $anggota['no_akaun'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">Kewarganegaraan:</div><div class="detail-value"><?= $anggota['warganegara'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">Tarikh Lahir:</div><div class="detail-value"><?= $anggota['tarikh_lahir'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">Agama:</div><div class="detail-value"><?= $anggota['agama'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">Jumlah Tanggungan:</div><div class="detail-value"><?= $anggota['jumlah_tanggungan'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">Emel:</div><div class="detail-value"><?= $anggota['email'] ?></div></div>
                </div>

                <!-- Maklumat Penama/Wasi -->
                <div class="mb-4">
                    <div class="section-title">Maklumat Penama / Wasi</div>
                    <div class="detail-row"><div class="detail-label">Nama Penuh:</div><div class="detail-value"><?= $anggota['penama_nama'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">No Telefon:</div><div class="detail-value"><?= $anggota['penama_no_telefon'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">Alamat Tetap:</div><div class="detail-value"><?= $anggota['penama_alamat'] ?></div></div>
                    <div class="detail-row"><div class="detail-label">No IC Baru:</div><div class="detail-value"><?= $anggota['penama_ic_baru'] ?></div></div>
                </div>

                <!-- Akuan / Persetujuan -->
                <div class="mb-4">
                    <div class="section-title">Akuan / Persetujuan</div>
                    <div class="checkbox-row">
                        <input class="form-check-input" type="checkbox" disabled <?= $anggota['akuan_1'] ? 'checked' : '' ?>>
                        Saya bersetuju membayar yuran sebanyak RM100.00 (Ringgit Malaysia: Satu Ratus Ringgit Sahaja)
                        sebagai yuran menjadi anggota Koperasi Hicri Terengganu Berhad dan Modal Saham RM20,000 (Ringgit Malaysia: Dua Puluh Ribu Ringgit Sahaja).
                    </div>
                    <div class="checkbox-row">
                        <input class="form-check-input" type="checkbox" disabled <?= $anggota['akuan_2'] ? 'checked' : '' ?>>
                        Sekiranya saya diterima menjadi Anggota KOHICRI, saya bersetuju/mengaku :
                        <ul>
                            <li>Mematuhi UndangUndangKecil (UUK) KOHICRI dan segala perundangan berkaitan dengan KOHICRI.</li>
                            <li>Membenarakan Wang Yuran/Saham /Simpanan Khas saya ditadbir oleh Koperasi untuk urusan perniagaan/ pelaburan/ Skim dan lain-lain yang difikirkan oleh KOHICRI untuk faedah dan kebaikan bersama.</li>
                            <li>Perlantikan ini dalah untuk menjadi ahli KOHICRI sahaja dan bukanlah Ahli Lembaga KOHICRI</li>
                            <li>Perlantikan Wasi (wakil waris) sebagai pewaris adalah mengikut hukum faraid dan</li>
                            <li>
                                Pada bila-bila masa pun setelah saya tidak menjadi Anggota KOHICRI, segala caruman saya masih di koperasi ini, saya ikhlas hati
                                menghibahkannya kepada KOHICRI setelah usaha dilaksanakan oleh Anggota Lembaga gagal menghubungi saya ataupun waris saya selama tiga (3) tahun.
                            </li>
                        </ul>
                    </div>
                    <div class="checkbox-row">
                        <input class="form-check-input" type="checkbox" disabled <?= $anggota['akuan_3'] ? 'checked' : '' ?>>
                        Saya dengan rela hati melantik penama (waris) untuk mewarisi sebarang hak saya yang ada dalam Koperasi ini apabila saya meninggal dunia atau apa-apa perkara lain yang berkenaan dengan diri saya.
                    </div>
                </div>

            </div>

            <!-- JS for PDF Export -->
            <script>
                document.getElementById('exportPDFBtn').addEventListener('click', () => {
                    const element = document.getElementById('resumeContent');
                    html2pdf()
                        .set({ margin: 0.5, filename: 'anggota_resume.pdf', html2canvas: { scale: 2 }, jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' } })
                        .from(element)
                        .save();
                });
            </script>

        </main>
    </div>
</div>
</body>
</html>
