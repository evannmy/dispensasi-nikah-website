<?php 
  require_once __DIR__ . '/vendor/autoload.php';
  require_once 'utility/function.php';

  $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template-document/template.docx');

  $data = getSpecificData($_GET);

  $namaSuami = $data['data_suami']['nama'];
  $tempatLahirSuami = $data['data_suami']['tempat_lahir'];
  $tanggalLahirSuami = $data['data_suami']['tanggal_lahir'];
  $agamaSuami = $data['data_suami']['agama'];
  $pekerjaanSuami = $data['data_suami']['pekerjaan'];
  $statusNikahSuami = $data['data_suami']['status_nikah'];
  $alamatSuami = $data['data_suami']['alamat'];

  $namaIstri = $data['data_istri']['nama'];
  $tempatLahirIstri = $data['data_istri']['tempat_lahir'];
  $tanggalLahirIstri = $data['data_istri']['tanggal_lahir'];
  $agamaIstri = $data['data_istri']['agama'];
  $pekerjaanIstri = $data['data_istri']['pekerjaan'];
  $statusNikahIstri = $data['data_istri']['status_nikah'];
  $alamatIstri = $data['data_istri']['alamat'];

  $hariPernikahan = $data['data_waktu_pernikahan']['hari'];
  $tanggalPernikahan = $data['data_waktu_pernikahan']['tanggal'];
  $jamPernikahan = formatTime($data['data_waktu_pernikahan']['jam']);
  $tempatPernikahan = $data['data_waktu_pernikahan']['tempat'];

  $nomorSurat = getMailNumber();

  date_default_timezone_set('Asia/Jakarta');
  $tanggalSaatIni = indonesianDate(date("Y-m-d"));

  $templateProcessor->setValues([
    "namaSuami" => $namaSuami,
    "tempatLahirSuami" => $tempatLahirSuami,
    "tanggalLahirSuami" => indonesianDate($tanggalLahirSuami),
    "agamaSuami" => $agamaSuami,
    "pekerjaanSuami" => $pekerjaanSuami,
    "statusNikahSuami" => $statusNikahSuami,
    "alamatSuami" => $alamatSuami,

    "namaIstri" => $namaIstri,
    "tempatLahirIstri" => $tempatLahirIstri,
    "tanggalLahirIstri" => indonesianDate($tanggalLahirIstri),
    "agamaIstri" => $agamaIstri,
    "pekerjaanIstri" => $pekerjaanIstri,
    "statusNikahIstri" => $statusNikahIstri,
    "alamatIstri" => $alamatIstri,

    "hariPernikahan" => $hariPernikahan,
    "tanggalPernikahan" => indonesianDate($tanggalPernikahan),
    "jamPernikahan" => $jamPernikahan,
    "tempatPernikahan" => $tempatPernikahan,

    "nomorSurat" => $nomorSurat,

    "tanggalSaatIni" => $tanggalSaatIni
  ]);

  $pathToSave = 'result/tmpResult.docx';
  $templateProcessor->saveAs($pathToSave);



  // convert docx to pdf
  use NcJoes\OfficeConverter\OfficeConverter;

  $converter = new OfficeConverter('result/tmpResult.docx');
  $converter->convertTo('tmpResult.pdf'); //generates pdf file in same directory as test-file.docx




  // show pdf in browser

  // Store the file name into variable
  $file = 'result/tmpResult.pdf';
  $filename = 'dispensasi-nikah.pdf';
  
  // Header content type
  header('Content-type: application/pdf');
  header('Content-Disposition: inline;
  filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  
  // Read the file
  @readfile($file);
?>