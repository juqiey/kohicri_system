<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = "Borang Keahlian KOHICRI";
        require '../global/header.php';
    ?>
    <link rel="stylesheet" href="../css/form_style.css">
</head>
<body>

<div class="container py-5">
    <h3 class="text-center fw-bold mb-4 text-primary">📝 Borang Keahlian KOHICRI</h3>
    <form method="POST" enctype="multipart/form-data" action="../controller/anggota_add_exec.php">

        <!-- Bahagian 1: Butiran Peribadi -->
        <h6>SIla baca arahan dengan teliti sebelum mengisi permohonan anda. Semua maklumat yang diminta mesti dijawab dengan lengkap.</h6>
        <div class="form-section">
            <h5>Bahagian 1: Butiran Peribadi</h5>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Left Column: Form Inputs -->
                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Nama Penuh</label>
                                <input type="text" class="form-control" name="nama_penuh" required>
                            </div>
                            <div class="col-md-6">
                                <label>No. IC Baru</label>
                                <input type="text" class="form-control" name="ic_baru" required>
                            </div>
                            <div class="col-md-6">
                                <label>No. IC Lama</label>
                                <input type="text" class="form-control" name="ic_lama">
                            </div>
                            <div class="col-md-6">
                                <label>Kewarganegaraan</label>
                                <input type="text" class="form-control" name="warganegara">
                            </div>
                            <div class="col-md-12">
                                <label>Alamat Tetap</label>
                                <textarea class="form-control" name="alamat_tetap" rows="2"></textarea>
                            </div>
                            <div class="col-md-4">
                                <label>No. Telefon (Rumah)</label>
                                <input type="text" class="form-control" name="tel_rumah">
                            </div>
                            <div class="col-md-4">
                                <label>No. Telefon (Mobile 1)</label>
                                <input type="text" class="form-control" name="tel_mobile1">
                            </div>
                            <div class="col-md-4">
                                <label>No. Telefon (Mobile 2)</label>
                                <input type="text" class="form-control" name="tel_mobile2">
                            </div>
                            <div class="col-md-4">
                                <label>Tarikh Lahir</label>
                                <input type="date" class="form-control" name="tarikh_lahir">
                            </div>
                            <div class="col-md-4">
                                <label>Agama</label>
                                <input type="text" class="form-control" name="agama">
                            </div>
                            <div class="col-md-4">
                                <label>Jantina</label>
                                <select class="form-select" name="jantina">
                                    <option selected disabled>Pilih</option>
                                    <option value="Lelaki">Lelaki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Kaum</label>
                                <select class="form-select" name="kaum">
                                    <option selected disabled>Pilih</option>
                                    <option value="Melayu">Melayu</option>
                                    <option value="Cina">Cina</option>
                                    <option value="India">India</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Status Perkahwinan</label>
                                <select class="form-select" name="status_perkahwinan">
                                    <option selected disabled>Pilih</option>
                                    <option>Bujang</option>
                                    <option>Berkahwin</option>
                                    <option>Duda</option>
                                    <option>Janda</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Jumlah Tanggungan</label>
                                <input type="number" class="form-control" name="tanggungan">
                            </div>
                            <div class="col-md-6">
                                <label>No. Akaun Bank Muamalat</label>
                                <input type="text" class="form-control" name="akaun_bank">
                            </div>
                            <div class="col-md-6">
                                <label>Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan">
                            </div>
                            <div class="col-md-12">
                                <label>Alamat Emel</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Passport Image Upload -->
                    <div class="col-md-4 text-center">
                        <label class="form-label">Muat Naik Gambar Passport</label>
                        <div class="mb-2">
                            <img id="passportPreview" src="https://via.placeholder.com/200x200?text=Passport+Image" 
                                alt="Passport Preview" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                        </div>
                        <input type="file" class="form-control" name="passport_image" id="passportImage" accept="image/*">
                    </div>
                </div>
            </div>
        </div>


        <!-- Bahagian 2: Maklumat Penama / Wasi -->
        <div class="form-section">
            <h5>Bahagian 2: Maklumat Penama / Wasi</h5>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label>Nama Penuh</label>
                        <input type="text" class="form-control" name="penama_nama">
                    </div>
                    <div class="col-md-6">
                        <label>No. Telefon</label>
                        <input type="text" class="form-control" name="penama_telefon">
                    </div>
                    <div class="col-md-6">
                        <label>Hubungan</label>
                        <input type="text" class="form-control" name="penama_hubungan">
                    </div>
                    <div class="col-md-6">
                        <label>No. IC Baru</label>
                        <input type="text" class="form-control" name="penama_ic">
                    </div>
                    <div class="col-md-12">
                        <label>Alamat Tetap</label>
                        <textarea class="form-control" name="penama_alamat" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bahagian 3: Akuan / Persetujuan -->
        <div class="form-section">
            <h5>Bahagian 3: Akuan / Persetujuan</h5>
            <div class="card-body">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="check1" name="akuan_1" required>
                    <label class="form-check-label" for="check1">
                       Saya bersetuju membayar yuran sebanyak RM100.00 (Ringgit Malaysia: Satu Ratus Ringgit Sahaja)
                       sebagai yuran menjadi anggota Koperasi Hicri Terengganu Berhad dan Modal Saham RM20,000 (Ringgit Malaysia: Dua Puluh Ribu Ringgit Sahaja).
                    </label>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="check2" name="akuan_2">
                    <label class="form-check-label" for="check2">
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
                    </label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="check3" name="akuan_3">
                    <label class="form-check-label" for="check3">
                       Saya dengan rela hati melantik penama (waris) untuk mewarisi sebarang hak saya yang ada dalam Koperasi ini apabila saya meninggal dunia atau apa-apa perkara lain yang berkenaan dengan diri saya.
                    </label>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-submit">Hantar Borang</button>
                </div>
            </div>
        </div>

    </form>
</div>

<?php
require '../global/script.php';
?>

<script>
    const passportImageInput = document.getElementById('passportImage');
    const passportPreview = document.getElementById('passportPreview');

    passportImageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                passportPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            passportPreview.src = "https://via.placeholder.com/200x200?text=Passport+Image";
        }
    });
</script>

</body>
</html>
