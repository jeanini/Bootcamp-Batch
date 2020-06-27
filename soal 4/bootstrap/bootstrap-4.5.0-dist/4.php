<?php
   ///koneksi database
   $server = "localhost";
   $user = "root";
   $pass = "";
   $database = "nama";

   $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_errno($koneksi));

   // jika Tombol sipam diklik
   if(isset($_POST['bsimpan']))
   {
     $simpan = mysqli_query($koneksi, "INSERT INTO provinci_tb (nama,diresmikan, photo, pulau)
                                       VALUES ('$_POST[tnama]', 
                                       '$_POST[tdiresmikan]',
                                       '$_POST[tphoto]',
                                       '$_POST[tpulau]')
                                      ");
        if($simpan)
        {
          echo "<script>
                  alert('Simpan data suksess!');
                  document.location='index.php';
                </script>";
        }
        else
        {
          echo "<script>
                  alert ('Simpan data GAGAL!!');
                  document.location='index.php';
                </script>";

        }
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provinsi Dan Kabupaten Indonesia</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1 class="text-center">Provinsi Dan Kabupaten</h1>
    <h2 class="text-center">Selamat Datang</h2>

    <div class="card mt-3">
  <div class="card-header bg-primary text-white">
    Provinsi Dan Kabupaten
  </div>
  <div class="card-body">
    <form method="post" action"">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="tnama" class="form-control" placeholder="Add Nama Provinsi!" require>
      </div>
      <div class="form-group">
        <label>Diresmikan</label>
        <input type="text" name="tdiresmikan" class="form-control" placeholder="diresmikan" require>
      </div>
      <div class="form-group">
        <label>Photo</label>
        <input type="text" name="tphoto" class="form-control" placeholder="Photo!" require>
      </div>
      <div class="form-group">
        <label>Pulau</label>
        <select class="form-control" name="tpulau">
          <option></option>
          <option value="jawa-barat">Jawa Barat</option>
          <option value="jawa-tengah">Jawa Tengah</option>
          <option value="bali">Bali</option>
          <option value="aceh">Aceh</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
      <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

    </form>
  </div>
</div>

<!-- Awal Card Table -->
<div class="card mt-3">
  <div class="card-header bg-success text-white">
    
  </div>
  <div class="card-body">

    <table class="table table-bordered table-striped">
      <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Diresmikan</th>
          <th>Photo</th>
          <th>Pulau</th>
          <th>Aksi</th>
      </tr>
      <?php
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * from provinci_tb order by id_provinsi desc");
        while($data = mysqli_fetch_array($tampil)) :

      ?>
      <tr>
          <td><?=$no++;?></td>
          <td><?=$data['nama']?></td>
          <td><?=$data['diresmikan']?></td>
          <td><?=$data['photo']?></td>
          <td><?=$data['pulau']?></td>
          <td>
            <a href="#" class="btn btn-warning"> Edit </a>
            <a href="#" class="btn btn-danger">  Delete </a>
          </td>
      </tr>
        <?php endwhile; //penutup perulangan while ?>
    </table>
   
  </div>
</div>
<!-- Akhir card table -->

      <div class="row row-cols-1 row-cols-md-3">
    <div class="col mb-4">
      <div class="card h-100">
        <img src="gambar1.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="text-center" class="card-title">Jawa Barat</h5>
          <p class="text-center" class="card-text">6-Agustus 1945</p>
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card h-100">
        <img src="gambar2.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="text-center" class="card-title">Jawa Tengah</h5>
          <p class="text-center" class="card-text">15-Agustos 1950</p>
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card h-100">
        <img src="gambar3.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="text-center" class="card-title">Bali</h5>
          <p class="text-center" class="card-text">14 - Agustos 1959</p>
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card h-100">
        <img src="gambar4.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="text-center" class="card-title">Aceh</h5>
          <p class="text-center" class="card-text">7 - December - 1956</p>
        </div>
      </div>
    </div>
  </div>

</div>
<script text="text/javascript" src="js/bootstrap.min.js"><script>

</body>
</html>