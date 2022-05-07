<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriteria alternatif</title>
    
    <link href="style.css"></link>
</head>
<body>
    
<table id="myTable" class="table table-bordered" style="margin-top: 20px" >
    <thead>
      <tr >
        <th width="130px">Kode</th>
        <th width="190px">Nama</th>
        <th width="200px">Jenis</th>
        <th width="140px">Bobot</th>
        <th>Pilihan</th>
      </tr>
    </thead>

    <tbody>
    <!-- awal menampilkan data 
    <?php
    /* $sql = "SELECT*FROM kriteria";
     $result = $connect->query($sql);
     while($row = $result->fetch_assoc()) {
    ?>
     <tr>
        <td><?php echo $row['id_kriteria']; ?></td>
        <td><?php echo $row['nama_kriteria']; ?></td>
        <td><?php echo $row['atribut']; ?></td>
        <td><?php echo $row['bobot_kriteria']; ?></td>
        <td align="center" width="250px">
            <a class="btn btn-warning" href="?page=edit_bobot&action=update&id_kriteria=<?php echo $row['id_kriteria']; ?>">Edit</a>
        </td>
     </tr>
 <?php
     }
     $connect->close();*/
 ?>-->
   </tbody>
</table>
</body>
</html>