<?php
    //backend adding alternatif

    include "connect_db.php";
    
    $id_alt = $_POST['id_alt'];
    $Nama= $_POST['Nama'];
    $Alamat = $_POST['Alamat'];
    $Telepon = $_POST['Telepon'];
    $id_harga = $_POST['Harga_Rp'];
    $id_jarak = $_POST['Jarak_Km'];
    $id_kualitas = $_POST['Kualitas'];
    $id_layanan = $_POST['Layanan'];

    if($id_alt==1){
        $Harga = "Kurang dari Rp250";
    }
    elseif($id_alt==2){
        $Harga = "Rp250 - Rp500";
    }
    elseif($id_alt==3){
        $Harga = "Rp500 - Rp1000";
    }
    elseif($id_alt==4){
        $Harga = "Rp1000 - Rp2000";
    }
    elseif($id_alt==5){
        $Harga = "Lebih dari Rp2000";
    }

    if($id_jarak==1){
        $Jarak = "Kurang dari 2 KM";
    }
    elseif($id_jarak==2){
        $Jarak = "Kurang dari 2 KM";
    }
    elseif($id_jarak==3){
        $Jarak = "3 KM - 4 KM";
    }
    elseif($id_jarak==4){
        $Jarak = "4 KM - 5 KM";
    }
    elseif($id_jarak==5){
        $Jarak = "Lebih dari 5 KM";
    }

    $select_alt = mysqli_num_rows(mysqli_query($connect, "SELECT id_alt FROM alternatif WHERE id_alt = $id_alt"));
    $row_data = mysqli_num_rows(mysqli_query($connect, "SELECT id_data FROM data"));
    if ($select_alt > 0) {
        echo "<script>
                    alert('DATA DENGAN ID ALTERNATIF $id_alt SUDAH ADA!');
                    document.location.href='alt_add_fe.php';
              </script>";
    } 
    else {
        if($row_data==0){
            $id_data = 1;
        }
        elseif($row_data>0){
            $id_data = $row_data + 1;
        }
        $insert_alt = mysqli_query($connect,"INSERT INTO alternatif value ('$id_alt','$Nama','$Alamat','$Telepon','$Harga','$Jarak')");
        $nilai=array($id_kualitas,$id_harga,$id_jarak,$id_layanan);
        for($a=0;$a<=4;$a++)
        {
            $insert_data = mysqli_query($connect,"INSERT INTO data value ('$id_data'+$a,'$id_alt',$a+1,'$nilai[$a]')");
      
        }
        
        if($insert_alt and $a!=0)
           {
                echo "<script>
                            alert('DATA DENGAN ID ALTERNATIF $id_alt BERHASIL DITAMBAHKAN ٩(◕‿◕｡)۶');
                            document.location.href='alt_list.php';
                      </script>";
            }
        else
            {
                echo "<script>
                            alert('DATA DENGAN ID ALTERNATIF $id_alt GAGAL DITAMBAHKAN o〒﹏〒o');
                            document.location.href='alt_add_be.php';
                      </script>";
                }
    }
?>