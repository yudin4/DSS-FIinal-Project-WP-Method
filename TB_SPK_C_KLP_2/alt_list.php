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
            <a class="nav-link active " href="alt_list.php" role="button">Daftar Alternatif</a>
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

    <div class="tabel" style="margin: 10%;">
        
    <table id="tabelalt" class="table table-hover table-bordered" style="width:100%; text-align:center; border-color:#052f6e">
        <thead style="background-color: #052f6e; color:aliceblue">
            <tr>
                <th>ID</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>TELEPON</th>
                <th>RENTANG HARGA</th>
                <th>RENTANG JARAK</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                    $select = mysqli_query($connect,"SELECT * FROM alternatif ORDER BY id_alt ASC");
                    $i=1;
                    while ($show = mysqli_fetch_assoc($select)){
            ?>
            <tr >
                            <td ><?php echo $show ['id_alt'];?></td>
                            <td ><?php echo $show ['Nama'];?></td>
                            <td ><?php echo $show ['Alamat'];?></td>
                            <td ><?php echo $show ['Telepon'];?></td>
                            <td ><?php echo $show ['Harga_Rp'];?></td>
                            <td ><?php echo $show ['Jarak_Km'];?></td>
                            <td>
                                <a  href=""><span class="btn btn-outline-warning btn-sm">Edit</span></a>
                                <a  href="" onclick="return confirm(' Yakin mau dihapus? ⊹⋛⋋( ●´⌓`●)⋌⋚⊹')"><span class="btn btn-outline-danger btn-sm " >Delete</span> </a>
                            </td>
            </tr>
            <?php
                }
            ?>
    </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() 
        {
            $('#tabelalt').DataTable();
            $("#tabelalt").attr("data-show-footer", "false");
        } );
    </script>
  </body>
</html>