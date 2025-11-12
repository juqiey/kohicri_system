<?php
include '../db/config.php';

function addNewAnggota($data) {
    $conn = db();

    $sql = "INSERT INTO anggota (
        nama_penuh, alamat_tetap, ic_baru, ic_lama, no_telefon_rumah,
        no_telefon_mobile_1, no_telefon_mobile_2, warganegara, tarikh_lahir,
        agama, jantina, kaum, status_perkahwinan, jumlah_tanggungan, no_akaun,
        pekerjaan, jawatan, gambar_url, email, akuan_1, akuan_2, akuan_3
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("SQL prepare error: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssssssssssisssssiii",
        $data['nama_penuh'],
        $data['alamat_tetap'],
        $data['ic_baru'],
        $data['ic_lama'],
        $data['no_telefon_rumah'],
        $data['no_telefon_mobile_1'],
        $data['no_telefon_mobile_2'],
        $data['warganegara'],
        $data['tarikh_lahir'],
        $data['agama'],
        $data['jantina'],
        $data['kaum'],
        $data['status_perkahwinan'],
        $data['jumlah_tanggungan'],
        $data['no_akaun'],
        $data['pekerjaan'],
        $data['jawatan'],
        $data['gambar_url'],
        $data['email'],
        $data['akuan_1'],
        $data['akuan_2'],
        $data['akuan_3']
    );

    $result = $stmt->execute();

    if (!$result) {
        die("SQL execute error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    return $result;
}
?>
