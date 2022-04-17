<?php
    require_once('../config/konek.php');
    if (isset($_POST['nama_baju']) && isset($_POST['jenis_baju']) && isset($_POST['harga'])&& isset($_POST['stok'])){
        $nama_baju = $_POST['nama_baju'];
        $jenis_baju = $_POST['jenis_baju'];
        $sql = $conn->prepare("INSERT INTO tbbaju (nama_baju, jenis_baju, harga, stok) VALUES (?, ?, ?, ?)");
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $sql -> bind_param('ssdd', $nama_baju, $jenis_baju, $harga, $stok);
        $sql->execute();
        if ($sql){
            //echo json_encode(array('RESPONSE' =&gt; 'FAILED'));
            echo json_encode(array('RESPONSE' => 'SUCCESS'));
            //header("location:../readapi/tampil.php");
        } else{
            echo "GAGAL";
        }
    }
?>