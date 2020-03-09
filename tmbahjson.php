<?php
$conn = new mysqli('localhost', 'id12170456_admin', '123456', 'id12170456_ilhamkun');
if(!$conn){
    echo json_encode(['status' => 0, 'msg' => 'Koneksi Error Gan!!']);
    exit();
}

if($_POST['show'] == 1){
    $asset = $_POST['asset'];
    $desc_ = $_POST['desc_'];
    $date_ = date('d m Y');
    $cek_ = mysqli_query($conn, "SELECT * FROM tugas2 WHERE asset='$asset'");
    $cek = mysqli_num_rows($cek_);
    if(!$cek){
        $insert = mysqli_query($conn, "INSERT INTO tugas2 (asset, desc_, date_) VALUES ('$asset', '$desc_', '$date')");
        if($insert){
            echo json_encode(['status' => 1, 'msg' => 'Data Berhasil di Masukkan.']);
            exit();
        }else{
            echo json_encode(['status' => 0, 'msg' => 'Data Tidak masuk.']);
            exit();
        }
    }else{
        echo json_encode(['status' => 0, 'msg' => 'Data Sudah Ada.']);
        exit();
    }
}else if($_POST['show'] == 2){
    $get_data = mysqli_query($conn, "SELECT * FROM tugas2 ORDER BY id DESC");
    $datas = [];
    while($post = mysqli_fetch_array($get_data)){
        $datas[] = $post;
    }
    echo json_encode(['status' => 1, 'data' => $datas]);
        exit();
}

echo json_encode(['status' => 0, 'msg' => 'Error.']);
    exit();
