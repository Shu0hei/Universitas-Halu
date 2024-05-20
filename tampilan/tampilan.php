<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Total Nilai Matakuliah</title>
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alegreya+SC:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body class="bg-info" style='font-family: "Alegreya SC", serif;'>

  <nav class="navbar bg-body-tertiary bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand a-img-span" href="../index.php">
          <img src="../assets/images/universitas-halu-logo.png" alt="Logo" width="70" height="55" class="d-inline-block align-text-top img-logo">
          <span class="text-light" style="margin-left: 10px; font-size: 1.5em;">Universitas Halu</span>
        </a>
    </div>
  </nav>

  <div class="container text-center">
    <h1 class="page-header text-center mt-5">Data</h1>
    <table class="table table-bordered table-striped mt-5 bg-light" style="margin-top: 20px;">
    <thead>
      <th>Nama Mahasiswa</th>
      <th>Kelas</th>
      <th>Nim</th>
      <th>Matakuliah</th>
      <th>Dosen</th>
      <th>Kehadiran</th>
      <th>Tugas</th>
      <th>UTS</th>
      <th>UAS</th>
      <th>Total Nilai</th>
      <th>Grade</th>
      <th colspan="2">Action</th>
    </thead>
    <tbody>
      <?php

        $data = file_get_contents('../assets/datas/data.json');
        $data = json_decode($data);

        $index = 0;
        foreach ($data as $row) {
          echo "<tr>
          <td>".$row->namaMahasiswa."</td>
          <td>".$row->kelas."</td>  
          <td>".$row->nim."</td>
          <td>".$row->matakuliah."</td>
          <td>".$row->dosen."</td>
          <td>".$row->kehadiran."</td>
          <td>".$row->tugas."</td>
          <td>".$row->uts."</td>
          <td>".$row->uas."</td>
          <td>".$row->totalNilai."</td>
          <td>".$row->grade."</td>
          <td>
            <a href='../edit/edit.php?index=".$index."' class='btn btn-success btn-sm'>Edit</a>
            <a href='../delete/delete.php?index=".$index."' class='btn btn-danger btn-sm'>Delete</a>
          </td>";

          $index++;
        };
      ?>
    </tbody>
    </table>
    <div class="col-10">
      <button type="submit" class="btn btn-primary" name="submit" value="Kirim"><a href="../index.php" class="text-light" style="text-decoration: none;">Tambah</a></button>
    </div>
  </div>
</body>
</html>