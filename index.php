<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Total Nilai Matakuliah</title>
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alegreya+SC:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body class="bg-info" style='font-family: "Alegreya SC", serif;'>

  <nav class="navbar bg-body-tertiary bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand a-img-span" href="index.php">
          <img src="assets/images/universitas-halu-logo.png" alt="Logo" width="70" height="55" class="d-inline-block align-text-top img-logo">
          <span class="text-light" style="margin-left: 10px; font-size: 1.5em;">Universitas Halu</span>
        </a>
    </div>
  </nav>

  <div class="container">
    <h1 class="page-header text-center mt-5">Total Nilai Matakuliah</h1>
    <div class="d-flex align-items-center justify-content-center mt-5">
      <form method="post">
        <div class="mb-3 row">
          <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="namaMahasiswa" name="namaMahasiswa">
        </div>
        <div class="mb-3 row">
          <label for="kelas" class="form-label">Kelas</label>
          <input type="text" class="form-control" id="kelas" name="kelas">
        </div>
        <div class="mb-3 row">
          <label for="nim" class="form-label">Nim</label>
          <input type="text" class="form-control" id="nim" name="nim">
        </div>
        <div class="mb-3 row">
          <label for="matakuliah" class="form-label">Matakuliah</label>
          <select class="form-select" name="matakuliah">
            <option selected value="Web Programming">Web Programming</option>
            <option value="Statistika">Statistika</option>
            <option value="Mobile Programming">Mobile Programming</option>
            <option selected value="Matematika Diskrit">Matematika Diskrit</option>
            <option value="Struktur Data">Struktur Data</option>
            <option value="Sistem Basis Data">Sistem Basis Data</option>
          </select>
        </div>
        <div class="mb-3 row">
          <label for="dosen" class="form-label">Dosen</label>
          <select class="form-select" name="dosen">
            <option selected value="Ayu Aye, S.Kom., M.Cs.">Ayu aye, S.Kom., M.Cs.</option>
            <option value="Jena Jeni, S.Kom., M.Cs.">Jena Jeni, S.Kom., M.Cs.</option>
            <option value="Joko Joki, S.Kom., M.Cs.">Joko Joki, S.Kom., M.Cs.</option>
            <option selected value="Budi Buda, S.Kom., M.Cs.">Budi Buda, S.Kom., M.Cs.</option>
            <option value="Mala Mili, S.Kom., M.Cs.">Mala Mili, S.Kom., M.Cs.</option>
            <option value="Ajeng Ajong, S.Kom., M.Cs.">Ajeng Ajong, S.Kom., M.Cs.</option>
          </select>
        </div>
        <div class="mb-3 row">
          <label for="kehadiran" class="form-label">Kehadiran</label>
            <input type="text" class="form-control" id="kehadiran" name="kehadiran">
        </div>
        <div class="mb-3 row">
          <label for="tugas" class="form-label">Tugas</label>
          <input type="text" class="form-control" id="tugas" name="tugas">
        </div>
        <div class="mb-3 row">
          <label for="uts" class="form-label">UTS</label>
          <input type="text" class="form-control" id="uts" name="uts">
        </div>
        <div class="mb-3 row">
          <label for="uas" class="form-label">UAS</label>
          <input type="text" class="form-control" id="uas" name="uas">
        </div>

        <div class="mt-3 mb-5">
          <button type="submit" class="btn btn-primary" name="submit" value="Kirim">Kirim</button>
          <button type="submit" class="btn btn-primary" name="lihatData" value="Lihat Data"><a href="tampilan/tampilan.php" class="text-light" style="text-decoration: none;">Lihat Data</a></button>
        </div>
      </form>
    </div>
  </div>

  <?php

    if(isset($_POST['submit'])) {
      $data = file_get_contents('assets/datas/data.json');
      $data = json_decode($data, true);

      $totalNilai = $rataNilai = ($_POST['kehadiran'] * 0.2) + ($_POST['tugas'] * 0.25) + ($_POST['uts'] * 0.25) + ($_POST['uas'] * 0.3);

      if ($rataNilai >= 80 && $rataNilai <= 100) {
        $grade = "A";
      } elseif ($rataNilai >= 70 && $rataNilai <=79) {
        $grade = "B";
      } elseif ($rataNilai >= 60 && $rataNilai <= 69) {
        $grade = "C";
      } elseif ($rataNilai >= 31 && $rataNilai <= 59) {
        $grade = "D";
      } elseif ($rataNilai >= 0 && $rataNilai <= 30) {
        $grade = "E";
      } else {
        $grade = "INVALID";
      }

      $input = array(
        'namaMahasiswa' => $_POST['namaMahasiswa'],
        'kelas' => $_POST['kelas'],
        'nim' => $_POST['nim'],
        'matakuliah' => $_POST['matakuliah'],
        'dosen' => $_POST['dosen'],
        'kehadiran' => $_POST['kehadiran'],
        'tugas' => $_POST['tugas'],
        'uts' => $_POST['uts'],
        'uas' => $_POST['uas'],
        'totalNilai' => $totalNilai,
        'grade' => $grade
      );

      $data[] = $input;
      $data = json_encode($data, JSON_PRETTY_PRINT);
      file_put_contents('assets/datas/data.json', $data);
    }

  ?>

</body>
</html>