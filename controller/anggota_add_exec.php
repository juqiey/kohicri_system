<?php
require '../model/anggota_function.php';
require '../global/script.php';

// -------------------
// Bahagian 1: Butiran Peribadi
// -------------------
$nama_penuh = $_POST['nama_penuh'];
$ic_baru = $_POST['ic_baru'];
$ic_lama = $_POST['ic_lama'];
$warganegara = $_POST['warganegara'];
$alamat_tetap = $_POST['alamat_tetap'];
$tel_rumah = $_POST['tel_rumah'];
$tel_mobile1 = $_POST['tel_mobile1'];
$tel_mobile2 = $_POST['tel_mobile2'];
$tarikh_lahir = $_POST['tarikh_lahir'];
$agama = $_POST['agama'];
$jantina = $_POST['jantina'];
$kaum = $_POST['kaum'];
$status_perkahwinan = $_POST['status_perkahwinan'];
$tanggungan = (int)$_POST['tanggungan'];   // cast to int
$akaun_bank = $_POST['akaun_bank'];
$pekerjaan = $_POST['pekerjaan'];
$email = $_POST['email'];

// -------------------
// Bahagian 2: Maklumat Penama / Wasi
// -------------------
$penama_nama = $_POST['penama_nama'];
$penama_telefon = $_POST['penama_telefon'];
$penama_hubungan = $_POST['penama_hubungan'];
$penama_ic = $_POST['penama_ic'];
$penama_alamat = $_POST['penama_alamat'];

// -------------------
// Bahagian 3: Akuan / Persetujuan
// -------------------
$akuan_1 = isset($_POST['akuan_1']) ? 1 : 0;
$akuan_2 = isset($_POST['akuan_2']) ? 1 : 0;
$akuan_3 = isset($_POST['akuan_3']) ? 1 : 0;

// -------------------
// Passport image upload
// -------------------
$passport_image = null;
if(!empty($_FILES['passport_image']) && $_FILES['passport_image']['name'] != null){
    $errors = [];
    $file_name = $_FILES['passport_image']['name'];
    $file_size = $_FILES['passport_image']['size'];
    $file_tmp = $_FILES['passport_image']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $profileurl = "profile_" . str_replace(' ', '_', $file_name);
    $target_dir = "../img/";
    $target_file = $target_dir . $profileurl;

    $extensions = ["jpeg","jpg","png","gif"];

    if(!in_array($file_ext, $extensions)){
        $errors[] = "Extension not allowed. Allowed: JPEG, JPG, PNG, GIF.";
    }
    if($file_size > 4194304){
        $errors[] = "File size must be below 4 MB.";
    }

    if(empty($errors)){
        move_uploaded_file($file_tmp, $target_file);
        $passport_image = $profileurl;
    } else {
        $err_text = implode("<br>", $errors);
        echo "<script>alert('Ralat gambar: $err_text');</script>";
    }
}

// -------------------
// Combine data
// -------------------
$data = [
    'nama_penuh' => $nama_penuh,
    'ic_baru' => $ic_baru,
    'ic_lama' => $ic_lama,
    'warganegara' => $warganegara,
    'alamat_tetap' => $alamat_tetap,
    'no_telefon_rumah' => $tel_rumah,
    'no_telefon_mobile_1' => $tel_mobile1,
    'no_telefon_mobile_2' => $tel_mobile2,
    'tarikh_lahir' => $tarikh_lahir,
    'agama' => $agama,
    'jantina' => $jantina,
    'kaum' => $kaum,
    'status_perkahwinan' => $status_perkahwinan,
    'jumlah_tanggungan' => $tanggungan,
    'no_akaun' => $akaun_bank,
    'pekerjaan' => $pekerjaan,
    'jawatan'=>null,
    'gambar_url' => $passport_image,
    'email' => $email,
    'penama_nama' => $penama_nama,
    'penama_telefon' => $penama_telefon,
    'penama_hubungan' => $penama_hubungan,
    'penama_ic' => $penama_ic,
    'penama_alamat' => $penama_alamat,
    'akuan_1' => $akuan_1,
    'akuan_2' => $akuan_2,
    'akuan_3' => $akuan_3
];

// -------------------
// Insert into DB
// -------------------
if (addNewAnggota($data)) {
    echo "<script>alert('Pendaftaran berjaya!'); window.location.href='../view/senarai_anggota.php';</script>";
} else {
    echo "<script>alert('Ralat semasa menyimpan ke pangkalan data.');</script>";
}
?>
