<?php
    require_once('../config/konek.php');
    $data = json_decode(file_get_contents("php://input"));

    if ($data->id!=null){
        $id = $data->id;
        $nama_baju = $data->nama_baju;
        $jenis_baju= $data->jenis_baju;
   
        
        $sql = $conn -> prepare("UPDATE tbbaju SET nama_baju=?, jenis_buku=?, harga=?, stok=? WHERE id=?");
        $harga = $data->harga;
        $stok = $data->stok;

        $sql -> bind_param('sssdd', $nama_baju, $jenis_baju, $harga, $stok, $id);
        $sql -> execute();
        if ($sql){
            echo json_encode(array('RESPONSE' => 'SUCCESS'));
        }else{
            echo json_encode(array('RESPONSE' => 'FAILED'));
        }
    }else{
        echo "GAGAL";
    }
?>