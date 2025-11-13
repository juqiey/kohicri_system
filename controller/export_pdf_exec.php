<?php
require '../model/anggota_function.php';
require '../vendor/autoload.php'; // Dompdf autoload

use Dompdf\Dompdf;
use Dompdf\Options; // Import Options class

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID not specified.");
}

// Fetch anggota data
$anggota = viewAnggota($id)->fetch_assoc();

$image_data = '';
if (!empty($anggota['gambar_url'])) {
    $absolute_image_path = dirname(__DIR__) . '/img/' . $anggota['gambar_url'];
    if(file_exists($absolute_image_path)) {
        $image_type = pathinfo($absolute_image_path, PATHINFO_EXTENSION);
        $image_data = 'data:image/' . $image_type . ';base64,' . base64_encode(file_get_contents($absolute_image_path));
    }
}



// Initialize Dompdf Options
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Define the name and ID for the footer
$nama_penuh = htmlspecialchars($anggota['nama_penuh']);
$ic_baru = htmlspecialchars($anggota['ic_baru']);

// HTML content with Form-style design (3 Sections)
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BORANG PERMOHONAN MENJADI ANGGOTA</title>
<style>
body { 
    font-family: DejaVu Sans, sans-serif; 
    margin: 0; 
    padding: 0; 
    font-size: 10pt; 
    line-height: 1.5;
}
.page { 
    padding: 30px; 
    margin: 0; 
}
.header { 
    text-align: center; 
    margin-bottom: 20px; 
}
.header h1 { 
    margin: 0; 
    font-size: 18pt; 
    color: #000080; 
}
.header p { 
    margin: 0; 
    font-size: 11pt; 
    color: #555;
}
/* New style for photo container integrated within the section */
.photo-field-container {
    display: table;
    width: 100%;
    margin-bottom: 10px;
}
.name-ic-details {
    display: table-cell;
    vertical-align: top;
    padding-right: 20px;
    width: 70%;
}
.photo-box {
    display: table-cell;
    vertical-align: top;
    width: 30%;
    text-align: right;
}
.resume-img { 
    width: 90px; 
    height: 110px;
    border: 3px solid #000080;
    object-fit: cover;
    display: inline-block;
}
.section-title { 
    font-weight: bold; 
    font-size: 12pt; 
    margin-top: 20px; 
    margin-bottom: 10px; 
    color: #333; 
    background-color: #f0f0f0; 
    padding: 5px 10px;
    border-left: 5px solid #000080;
}
.field-group { 
    display: table; 
    width: 100%; 
    margin-bottom: 5px; 
    border-collapse: collapse; 
}
.field-label, .field-value { 
    display: table-cell; 
    padding: 4px 0;
    vertical-align: top;
}
.field-label { 
    width: 220px; 
    font-weight: 600; 
    color: #495057; 
}
.field-value { 
    border-bottom: 1px solid #ccc; 
    padding-left: 10px;
}
.akuan-row {
    margin-bottom: 8px;
    padding: 5px;
    border: 1px dashed #ccc;
    background-color: #f9f9f9;
}
.akuan-status {
    font-weight: bold;
    color: #000080;
    margin-right: 10px;
}
.signature-box {
    margin-top: 40px;
    width: 100%;
    display: table;
    table-layout: fixed;
}
.signature-col {
    display: table-cell;
    width: 50%;
    text-align: center;
    padding: 0 20px;
}
.signature-line {
    border-bottom: 1px solid #000;
    padding: 10px;
    margin-bottom: 5px;
}

/* Dompdf specific footer for page numbering */
@page {
    margin: 1cm 1cm 1.5cm 1cm;
}
</style>
</head>
<body>

<script type="text/php">
    if ( isset($pdf) ) {
        $font = $pdf->getFontMetrics()->get_font("DejaVu Sans, sans-serif");
        $pdf->page_script(\'$pdf->text(50, $pdf->get_height() - 30, "ID: ' . $ic_baru . ' | ' . $nama_penuh . '", $font, 8, array(0.5, 0.5, 0.5));\');
        $pdf->page_script(\'$pdf->text($pdf->get_width() - 80, $pdf->get_height() - 30, "Halaman " . $PAGE_NUM . " dari " . $PAGE_COUNT, $font, 8, array(0.5, 0.5, 0.5));\');
    }
</script>

<div class="page">
    <div class="header">
        <h1>BORANG PERMOHONAN MENJADI ANGGOTA</h1>
        <p>KOHICRI</p>
    </div>

    <div class="section-title">1. BUTIRAN PERIBADI</div>

    <div class="photo-field-container">
        <div class="name-ic-details">
            <div class="field-group">
                <div class="field-label">Nama Penuh:</div>
                <div class="field-value">'.htmlspecialchars($anggota['nama_penuh']).'</div>
            </div>
            <div class="field-group">
                <div class="field-label">No IC Baru:</div>
                <div class="field-value">'.htmlspecialchars($anggota['ic_baru']).'</div>
            </div>
            <div class="field-group">
                <div class="field-label">Tarikh Borang Dijana:</div>
                <div class="field-value">'.htmlspecialchars(date('d F Y')).'</div>
            </div>
        </div>
        <div class="photo-box">
            ' . ($image_data ? '<img src="'.$image_data.'" class="resume-img" alt="Photo">' : '<div class="resume-img" style="background-color: #e9ecef; text-align: center; line-height: 110px; font-size: 8pt; color: #6c757d;">[Tiada Foto]</div>') . '
        </div>

    </div>
    
    <div class="field-group">
        <div class="field-label">No IC Lama:</div>
        <div class="field-value">'.htmlspecialchars($anggota['ic_lama']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">Alamat Tetap:</div>
        <div class="field-value">'.nl2br(htmlspecialchars($anggota['alamat_tetap'])).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">No Telefon Mobile 1:</div>
        <div class="field-value">'.htmlspecialchars($anggota['no_telefon_mobile_1']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">No Telefon Mobile 2:</div>
        <div class="field-value">'.htmlspecialchars($anggota['no_telefon_mobile_2']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">No Telefon Rumah:</div>
        <div class="field-value">'.htmlspecialchars($anggota['no_telefon_rumah']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">Emel:</div>
        <div class="field-value">'.htmlspecialchars($anggota['email']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">Jantina:</div>
        <div class="field-value">'.htmlspecialchars($anggota['jantina']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">Kaum:</div>
        <div class="field-value">'.htmlspecialchars($anggota['kaum']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">Agama:</div>
        <div class="field-value">'.htmlspecialchars($anggota['agama']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">Status Perkahwinan:</div>
        <div class="field-value">'.htmlspecialchars($anggota['status_perkahwinan']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">Jumlah Tanggungan:</div>
        <div class="field-value">'.htmlspecialchars($anggota['jumlah_tanggungan']).' orang</div>
    </div>
    <div class="field-group">
        <div class="field-label">Pekerjaan:</div>
        <div class="field-value">'.htmlspecialchars($anggota['pekerjaan']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">Jawatan:</div>
        <div class="field-value">'.htmlspecialchars($anggota['jawatan']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">No Akaun Bank:</div>
        <div class="field-value">'.htmlspecialchars($anggota['no_akaun']).'</div>
    </div>


    <div class="section-title">2. MAKLUMAT PENAMA / WASI</div>
    
    <div class="field-group">
        <div class="field-label">Nama Penuh Penama:</div>
        <div class="field-value">'.htmlspecialchars($anggota['penama_nama']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">No IC Baru Penama:</div>
        <div class="field-value">'.htmlspecialchars($anggota['penama_ic_baru']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">No Telefon Penama:</div>
        <div class="field-value">'.htmlspecialchars($anggota['penama_no_telefon']).'</div>
    </div>
    <div class="field-group">
        <div class="field-label">Alamat Tetap Penama:</div>
        <div class="field-value">'.nl2br(htmlspecialchars($anggota['penama_alamat'])).'</div>
    </div>
    
    <div class="section-title">3. AKUAN / PERSETUJUAN</div>

    <div class="akuan-row">
        <span class="akuan-status">'.($anggota['akuan_1'] ? '&#10003; BERSETUJU' : '&#10007; TIDAK BERSETUJU').'</span> 
        Saya bersetuju membayar yuran sebanyak RM100.00 (Ringgit Malaysia: Satu Ratus Ringgit Sahaja)
                       sebagai yuran menjadi anggota Koperasi Hicri Terengganu Berhad dan Modal Saham RM20,000 (Ringgit Malaysia: Dua Puluh Ribu Ringgit Sahaja).
    </div>
    <div class="akuan-row">
        <span class="akuan-status">'.($anggota['akuan_2'] ? '&#10003; BERSETUJU' : '&#10007; TIDAK BERSETUJU').'</span> 
        Sekiranya saya diterima menjadi Anggota KOHICRI, saya bersetuju/mengaku :
            <ul>
                <li>Mematuhi UndangUndangKecil (UUK) KOHICRI dan segala perundangan berkaitan dengan KOHICRI.</li>
                <li>Membenarkan Wang Yuran/Saham /Simpanan Khas saya ditadbir oleh Koperasi untuk urusan perniagaan/ pelaburan/ Skim dan lain-lain yang difikirkan oleh KOHICRI untuk faedah dan kebaikan bersama.</li>
                <li>Perlantikan ini dalah untuk menjadi ahli KOHICRI sahaja dan bukanlah Ahli Lembaga KOHICRI</li>
                <li>Perlantikan Wasi (wakil waris) sebagai pewaris adalah mengikut hukum faraid dan</li>
                <li>
                    Pada bila-bila masa pun setelah saya tidak menjadi Anggota KOHICRI, segala caruman saya masih di koperasi ini, saya ikhlas hati
                    menghibahkannya kepada KOHICRI setelah usaha dilaksanakan oleh Anggota Lembaga gagal menghubungi saya ataupun waris saya selama tiga (3) tahun.
                </li>
            </ul>
    </div>
    <div class="akuan-row">
        <span class="akuan-status">'.($anggota['akuan_3'] ? '&#10003; BERSETUJU' : '&#10007; TIDAK BERSETUJU').'</span> 
        Saya dengan rela hati melantik penama (waris) untuk mewarisi sebarang hak saya yang ada dalam Koperasi ini apabila saya meninggal dunia atau apa-apa perkara lain yang berkenaan dengan diri saya.
    </div>

    <div class="signature-box">
        <div class="signature-col">
            <div class="signature-line"></div>
            <p>(Tandatangan Anggota)</p>
        </div>
        <div class="signature-col">
            <div class="signature-line"></div>
            <p>(Tarikh)</p>
        </div>
    </div>

    <div class="section-title">4. KEGUNAAN PEJABAT (OFFICE USE)</div>

    <div class="field-group" style="margin-bottom: 10px;">
        <div class="field-label">Keputusan (Decision):</div>
        <div class="field-value" style="border-bottom: none;">
            &#9744; Diterima &nbsp;&nbsp;&nbsp;&nbsp; &#9744; Ditolak
        </div>
    </div>

    <div style="display: table; width: 100%; border-collapse: collapse; margin-bottom: 5px;">
        <div style="display: table-row;">
            <div style="display: table-cell; width: 50%;">
                <div class="field-group">
                    <div class="field-label" style="width: 100px;">Tarikh (Date):</div>
                    <div class="field-value" style="border-bottom: 1px solid #000;">&nbsp;</div>
                </div>
            </div>
            <div style="display: table-cell; width: 50%;">
                <div class="field-group">
                    <div class="field-label" style="width: 150px;">No. Keahlian Anggota:</div>
                    <div class="field-value" style="border-bottom: 1px solid #000;">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>

    <div class="field-group">
        <div class="field-label">Pengerusi KOHICRI:</div>
        <div class="field-value" style="border-bottom: 1px solid #000;">&nbsp;</div>
    </div>

    <div class="field-group">
        <div class="field-label">Setiausaha KOHICRI:</div>
        <div class="field-value" style="border-bottom: 1px solid #000;">&nbsp;</div>
    </div>

    <div class="signature-box" style="margin-top: 50px;">
        <div class="signature-col">
            <div class="signature-line"></div>
            <p>Tandatangan Pengerusi</p>
        </div>
        <div class="signature-col">
            <div class="signature-line"></div>
            <p>Tandatangan Setiausaha</p>
        </div>
    </div>
</div>
</body>
</html>
';

// Load HTML and render PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Get the person's name
$nama_penuh = $anggota['nama_penuh'];

// Sanitize the name for filename (replace spaces with underscores, remove invalid characters)
$filename = preg_replace('/[^A-Za-z0-9_\-]/', '', str_replace(' ', '_', $nama_penuh)) . '.pdf';

// Stream the PDF with the dynamic name
$dompdf->stream($filename, ['Attachment' => true]);