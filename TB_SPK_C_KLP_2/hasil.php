<?php
    include "connect_db.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" integrity="" crossorigin="">
    
    <link href="style.css"></link>
    <title>DAFTAR ALTERNATIF</title>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
   
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a class="nav-link " href="alt_add_fe.php">Tambah Alternatif</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="alt_list.php" role="button">Daftar Alternatif</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Daftar Kriteria</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="data.php">Data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="hasil.php">Ranking</a>
        </li>
    </ul>

    
    <?php

    //Menghitung data bobot

    $query = $connect->query("SELECT SUM(bobot) AS ttl FROM bobot");

    $dt = $query->fetch_assoc();

    $ttl = $dt['ttl'];

    $query = $connect->query("SELECT bobot FROM bobot");

    $nb = 0;

    foreach ($query as $row) {

        $nb += 1;

        //Karna semua kriteria adalah Keuntungan maka dikali 1

        $bobot[$nb] = ($row['bobot'] / $ttl) * 1;

    }

    //Menghitung Vektor S

    $i = 0;

    $ttl_v = 0;

    $s = [];

    $query = $connect->query('SELECT id_alt FROM alternatif');

    foreach ($query as $row) {

        $id_alt = $row['id_alt'];

        $sql = $connect->query("SELECT nilai FROM data WHERE id_alternatif=$id_alt");

        $nb = 0;

        $temp_s = 1;

        foreach ($sql as $data) {

            $nb++;

            $temp_s *= pow($data['nilai'], $bobot[$nb]);

        }

        $s[] = $temp_s;

        $ttl_v += $s[$i];

        $i++;

    }

    //Menghitung Vektor V

    for ($a = 1; $a <= $i; $a++) {

        $v[$a] = $s[$a - 1] / $ttl_v;

    }

    //Proses Perankingan

    for ($a = 1; $a <= $i; $a++) {

        $rank[$a] = 1;

        for ($b = 1; $b <= $i; $b++) {

            if ($v[$a] < $v[$b]) {

                $rank[$a]++;

            }

        }

    }

    ?>

    <h3>Hasil Normalisasi Bobot</h3>
    <table border="1">

        <thead>

            <tr>

                <th>Kriteria</th>

                <th>Nilai</th>


            </tr>

        </thead>

        <tbody>

            <?php

            $query = $connect->query("SELECT nama_kri FROM kriteria") or die($connect->error);

            $z = 0;

            foreach ($query as $row) {

                $z++;

            ?>

            <tr>

                <td><?php echo $row['nama_kri'] ?></td>

                <td><?php echo round($bobot[$z], 3) ?></td>

            </tr>

            <?php

            }

            ?>

        </tbody>

    </table>
    
    <h3>Hasil Normalisasi S</h3>
    <table border="1">

        <thead>

            <tr>

                <th>S Alternatif</th>

                <th>Nilai</th>


            </tr>

        </thead>

        <tbody>

            <?php

            $query = $connect->query("SELECT nama FROM alternatif") or die($connect->error);

            $z = 0;
            $y = -1;
            foreach ($query as $row) {

                $z++;
                $y++;
            ?>

            <tr>

                <td><?php echo $row['nama'] ?></td>

                <td><?php echo round($s[$y], 3) ?></td>

            </tr>

            <?php

            }

            ?>

        </tbody>

    </table>

    <h3>Hasil Perankingan V</h3>
    <table border="1">

        <thead>

            <tr>

                <th>Alternatif</th>

                <th>Nilai</th>

                <th>Ranking</th>

            </tr>

        </thead>

        <tbody>

            <?php

            $query = $connect->query("SELECT nama FROM alternatif") or die($connect->error);

            $z = 0;

            foreach ($query as $row) {

                $z++;

            ?>

            <tr>

                <td><?php echo $row['nama'] ?></td>

                <td><?php echo round($v[$z], 3) ?></td>

                <td><?php echo $rank[$z] ?></td>

            </tr>

            <?php

            }

            ?>

        </tbody>

    </table>

    <hr>

    <hr>
  </body>
</html>