
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH ALTERNATIF FOTOCOPY</title>    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="/style.css"></link>
</head>
<body>

    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="alt_add_fe.php">Tambah Alternatif</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link  " href="alt_list.php" role="button">Daftar Alternatif</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Daftar Kriteria</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="data.php">Data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="hasil.php">Ranking</a>
        </li>
    </ul>
    
    <div class="addalt " style="background-color: #dfe5f0; margin: 5%; border-radius:1%; max-width:60%;">
        <form  class="" action="alt_add_be.php" style="padding:7%" method="POST" >
                    <div class="form-group">
                    <label for="id_alt" style="padding: 2%;">ID Alternatif</label>
                    <input type="number" class="form-control" name="id_alt" maxlength="11" id="id_alt" style="max-width: 55%;" min="1" required>
                    </div>

                    <div class="form-group">
                    <label for="kepala_keluarga" style="padding: 2%;">Nama</label>
                    <input type="text" class="form-control" name="Nama" maxlength="35" style="max-width: 55%;" id="Nama" required>
                    </div>

                    <div class="form-group">
                    <label for="alamat" style="padding: 2%;">Alamat</label>
                    <input type="text" class="form-control" name="Alamat" maxlength="59" style="max-width: 55%;" id="Alamat" required>
                    </div>

                    <div class="form-group">
                    <label for="telepon" style="padding: 2%;">Telepon</label>
                    <input type="number" class="form-control" name="Telepon" maxlength="11" style="max-width: 55%;" id="Telepon" required>
                    </div>

                    <div class="form-group">
                    <label for="rjarak" style="padding: 2%;">Kualitas Hasil Print</label>
                    <br>
                    <select class="chosen-select" placeholder="" name="Kualitas" id="Kualitas" style="width: 55%; height:10mm">
                        <option value="">---Pilih salah satu---</option>;
                        <option value="1"><?php echo "Sangat Kurang";?> </option>;
                        <option value="2"><?php echo "Kurang";?> </option>;
                        <option value="3"><?php echo "Cukup";?> </option>;
                        <option value="4"><?php echo "Baik";?> </option>;
                        <option value="5"><?php echo "Sangat Baik";?> </option>;
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="rjarak" style="padding: 2%;">Range Harga Print</label>
                    <br>
                    <select class="chosen-select" placeholder="" name="Harga_Rp" id="Harga_Rp" style="width: 55%; height:10mm">
                        <option value="">---Pilih salah satu---</option>;
                        <option value="1"><?php echo "Kurang dari Rp250";?> </option>;
                        <option value="2"><?php echo "Rp250 - Rp500";?> </option>;
                        <option value="3"><?php echo "Rp500 - Rp1000";?> </option>;
                        <option value="4"><?php echo "Rp1000 - Rp2000";?> </option>;
                        <option value="5"><?php echo "Lebih dari Rp2000";?> </option>;
                    </select>

                    <div class="form-group">
                    <label for="rjarak" style="padding: 2%;">Range Jarak dari Unand</label>
                    <br>
                    <select class="chosen-select" placeholder="" name="Jarak_Km" id="Jarak_Km" style="width: 55%; height:10mm">
                        <option value="">---Pilih salah satu---</option>;
                        <option value="1"><?php echo "Kurang dari 2 KM";?> </option>;
                        <option value="2"><?php echo "2 KM - 3 KM";?> </option>;
                        <option value="3"><?php echo "3 KM - 4 KM";?> </option>;
                        <option value="4"><?php echo "4 KM - 5 KM";?> </option>;
                        <option value="5"><?php echo "Lebih dari 5 KM";?> </option>;
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="rjarak" style="padding: 2%;">Pelayanan Penjual</label>
                    <br>
                    <select class="chosen-select" placeholder="" name="Layanan" id="Layanan" style="width: 55%; height:10mm">
                        <option value="">---Pilih salah satu---</option>;
                        <option value="1"><?php echo "Sangat Kurang";?> </option>;
                        <option value="2"><?php echo "Kurang";?> </option>;
                        <option value="3"><?php echo "Cukup";?> </option>;
                        <option value="4"><?php echo "Baik";?> </option>;
                        <option value="5"><?php echo "Sangat Baik";?> </option>;
                    </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success" style="margin-top: 5%;">Add</button>
                    <a href="adminpage.php" class="btn btn-dark" style="margin-top: 5%;">Back</a>

        </form>
    </div>
</body>
</html>
