<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Mahasiswa</title>
</head>
<body><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form action="output.php" method="post">
  <br>
  <div class="form-group row">
    <label for="nama" class="col-2 col-form-label">Nama Mahasiswa</label> 
    <div class="col-5">
      <input id="nama" name="nama" type="text" class="form-control">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="matkul" class="col-2 col-form-label">Mata Kuliah</label> 
    <div class="col-5">
      <select id="matkul" name="matkul" class="custom-select">
        <option value="Dasar-Dasar Pemograman">Dasar-Dasar Pemograman</option>
        <option value="Pemograman WEB">Pemograman WEB</option>
        <option value="Basis Data">Basis Data</option>
      </select>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="nilai_uts" class="col-2 col-form-label">Nilai UTS</label> 
    <div class="col-5">
      <input id="nilai_uts" name="nilai_uts" type="text" class="form-control">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="nilai_uas" class="col-2 col-form-label">Nilai UAS</label> 
    <div class="col-5">
      <input id="nilai_uas" name="nilai_uas" type="text" class="form-control">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="nilai_tugas" class="col-2 col-form-label">Nilai Tugas/Praktikum</label> 
    <div class="col-5">
      <input id="nilai_tugas" name="nilai_tugas" type="text" class="form-control">
    </div>
  </div> 
  <br>
  <div class="form-group row">
    <div class="offset-2 col-8">
      <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
</body>
</html>