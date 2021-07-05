<?php
//koneksi database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_pertanian";

$con = mysqli_connect($hostname, $username, $password, $database);

# Cek Koneksi
if (!$con) {
    echo "Koneksi Gagal, Error: " . mysqli_connect_error();
    exit();
}

//akhir koneksi database

function query($query){
global $con;

$result = mysqli_query($con, $query);
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
return $rows;
}

//awal daftar

function tambah ($data){
  global $con;
//ambil data dari tiap elemen
    $nama = htmlspecialchars( $data["nama"]);
    $no_hp = htmlspecialchars( $data["no_hp"]);
    $tgl_lahir = htmlspecialchars( $data["tgl_lahir"]);
    $bidang = htmlspecialchars( $data["bidang"]);
    $email = htmlspecialchars( $data["email"]);
    $username = htmlspecialchars( $data["username"]);
    $password = htmlspecialchars( password_hash($data['password'], PASSWORD_DEFAULT));
    $level = $data["level"];
    $alamat = htmlspecialchars( $data["alamat"]);

    
    $query = "INSERT INTO tb_login
             VALUES
             ('','$nama','$no_hp','$tgl_lahir','$bidang','$email','$username','$password','$level','$alamat')
            ";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

//akhir daftar

//awal hapus

function hapus($id){

    global $con;

    mysqli_query($con, "DELETE FROM tb_login WHERE id=$id");
    return mysqli_affected_rows($con);

}

//akhir hapus

//awal ubah

function ubah($data){
      global $con;
//ambil data dari tiap elemen
    $id = $data["id"];
    $nama = htmlspecialchars( $data["nama"]);
    $no_hp = htmlspecialchars( $data["no_hp"]);
    $tgl_lahir = htmlspecialchars( $data["tgl_lahir"]);
    $bidang = htmlspecialchars( $data["bidang"]);
    $email = htmlspecialchars( $data["email"]);
    $username = htmlspecialchars( $data["username"]);
    $level =  $data["level"];
    $alamat = htmlspecialchars( $data["alamat"]);

    //enkripsi password
    // $password = password_hash($password, PASSWORD_DEFAULT);
        //query insert data
    $query = "UPDATE tb_login SET
                nama = '$nama',
                no_hp = '$no_hp',
                tgl_lahir = '$tgl_lahir',
                bidang = '$bidang',
                email = '$email',
                username = '$username',
                level = '$level',
                alamat = '$alamat'
                WHERE id = $id
            ";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

//akhir ubah

// awal cari data user

function cari($keyword){

    $query = "SELECT * FROM tb_login
                WHERE
                nama LIKE '%$keyword%' OR
                username LIKE '%$keyword%' OR
                no_hp LIKE '%$keyword%' OR
                tgl_lahir LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%'";
                return query($query);

}

//akhir cari data user

//tambah padi

function tambah_padi($data){
    global $con;
    $uraian =  $_POST ['uraian'];
        $bulanlalu = $_POST ['bulanlalu'];
        $panen = $_POST ['panen'];
        $tanam = $_POST['tanam'];
        $puso =$_POST['puso'];
        
        $bsbulanlalu =$_POST['bsbulanlalu'];
        $bspanen =$_POST['bspanen'];
        $bstanam =$_POST['bstanam'];
        $bspuso =$_POST['bspuso'];

        $kec = $_POST['kecamatan'];
        $bln = $_POST['bulan'];
        $thn = $_POST['tahun'];
        
    $query = "INSERT INTO tb_padi
            
            VALUES
            ('', '$uraian','$bulanlalu','$panen','$tanam','$puso','$bsbulanlalu','$bspanen','$bstanam', '$bspuso' , '$kec', '$bln' , '$thn')
            ";
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

//akhir tambah padi

//hapus padi
function delete_padi($id){

    global $con;

    mysqli_query($con, "DELETE FROM tb_padi WHERE id_padi=$id");
    return mysqli_affected_rows($con);

}
//akhir hapus padi

//ubah padi

function update_padi($data){
    
    global $con;
    //ambil data dari tiap elemen
    $id_padi = $data['id_padi'];
    $kecamatan = $data['kecamatan'];
    $bulan = $data ['bulan'];
    $tahun = $data ['tahun'];
    $id_nm_padi =  $data['id_nm_padi'];
    $bulanlalu =  $data['bulanlalu'];
    $panen =  $data['panen'];
    $tanam =  $data['tanam'];
    $puso =  $data['puso'];
    $bsbulanlalu =  $data['bsbulanlalu'];
    $bspanen =  $data['bspanen'];
    $bstanam =  $data['bstanam'];
    $bspuso =  $data['bspuso'];
    
    
    //query
    $query = "UPDATE tb_padi SET
                kecamatan = '$kecamatan',
                bulan = '$bulan',
                tahun = '$tahun',
                id_nm_padi= '$id_nm_padi',
                bulanlalu = '$bulanlalu',
                panen = '$panen',
                tanam = '$tanam',
                puso = '$puso',
                bsbulanlalu = '$bsbulanlalu',
                bspanen = '$bspanen',
                bstanam = '$bstanam',
                bspuso = '$bspuso'
                WHERE  id_padi = $id_padi";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);

}

//akhir ubah padi

//tambah palawija

function tambah_palawija($data){
    global $con;
    $uraian = htmlspecialchars ( $_POST ['uraian']);
        $bulanlalu = $_POST ['bulanlalu'];
        $panen = $_POST ['panen'];
        $tanam = $_POST['tanam'];
        $puso =$_POST['puso'];
        
        $bsbulanlalu =$_POST['bsbulanlalu'];
        $bspanen =$_POST['bspanen'];
        $bstanam =$_POST['bstanam'];
        $bspuso =$_POST['bspuso'];

        $kec = $_POST['kecamatan'];
        $bln = $_POST['bulan'];
        $thn = $_POST['tahun'];
        
    $query = "INSERT INTO tb_palawija
            
            VALUES
            ('', '$uraian','$bulanlalu','$panen','$tanam','$puso','$bsbulanlalu','$bspanen','$bstanam', '$bspuso' , '$kec', '$bln' , '$thn')
            ";
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

//akhir tambah palawija

//hapus palawija
function delete_palawija($id){

    global $con;

    mysqli_query($con, "DELETE FROM tb_palawija WHERE id_palawija=$id");
    return mysqli_affected_rows($con);

}
//akhir hapus palawija

//ubah palawija

function update_palawija($data){
    
    global $con;

    //ambil data dari tiap elemen
    $id_palawija = $data['id_palawija'];
    $kecamatan = $data['kecamatan'];
    $bulan = $data ['bulan'];
    $tahun = $data ['tahun'];
    $id_nm_palawija =  $data['id_nm_palawija'];
    $bulanlalu =  $data['bulanlalu'];
    $panen =  $data['panen'];
    $tanam =  $data['tanam'];
    $puso =  $data['puso'];
    $bsbulanlalu =  $data['bsbulanlalu'];
    $bspanen =  $data['bspanen'];
    $bstanam =  $data['bstanam'];
    $bspuso =  $data['bspuso'];
    
    
    //query
    $query = "UPDATE tb_palawija SET
                kecamatan = '$kecamatan',
                bulan = '$bulan',
                tahun = '$tahun',
                id_nm_palawija = '$id_nm_palawija',
                bulanlalu = '$bulanlalu',
                panen = '$panen',
                tanam = '$tanam',
                puso = '$puso',
                bsbulanlalu = '$bsbulanlalu',
                bspanen = '$bspanen',
                bstanam = '$bstanam',
                bspuso = '$bspuso'
                WHERE  id_palawija = $id_palawija
                ";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);

}

//akhir ubah palawija

//tambah sbs

function tambah_sbs($data){
    global $con;
    $uraian = htmlspecialchars ( $_POST ['uraian']);
        $bulanlalu = $_POST ['bulanlalu'];
        $panen = $_POST ['panen'];
        $tanam = $_POST['tanam'];
        $puso =$_POST['puso'];
        
        $bsbulanlalu =$_POST['bsbulanlalu'];
        $bspanen =$_POST['bspanen'];
        $bstanam =$_POST['bstanam'];
        $bspuso =$_POST['bspuso'];

        $kec = $_POST['kecamatan'];
        $bln = $_POST['bulan'];
        $thn = $_POST['tahun'];
        
    $query = "INSERT INTO tb_sbs
            
            VALUES
            ('', '$uraian','$bulanlalu','$panen','$tanam','$puso','$bsbulanlalu','$bspanen','$bstanam', '$bspuso' , '$kec', '$bln' , '$thn')
            ";
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

//akhir tambah sbs

//hapus sbs
function delete_sbs($id){

    global $con;

    mysqli_query($con, "DELETE FROM tb_sbs WHERE id_sbs=$id");
    return mysqli_affected_rows($con);

}
//akhir hapus sbs

//ubah sbs

function update_sbs($data){
    
    global $con;

    //ambil data dari tiap elemen
    $id_sbs = $data['id_sbs'];
    $kecamatan = $data['kecamatan'];
    $bulan = $data ['bulan'];
    $tahun = $data ['tahun'];
    $id_nm_sbs =  $data['id_nm_sbs'];
    $bulanlalu =  $data['bulanlalu'];
    $panen =  $data['panen'];
    $tanam =  $data['tanam'];
    $puso =  $data['puso'];
    $bsbulanlalu =  $data['bsbulanlalu'];
    $bspanen =  $data['bspanen'];
    $bstanam =  $data['bstanam'];
    $bspuso =  $data['bspuso'];
    
    
    //query
    $query = "UPDATE tb_sbs SET
                kecamatan = '$kecamatan',
                bulan = '$bulan',
                tahun = '$tahun',
                id_nm_sbs = '$id_nm_sbs',
                bulanlalu = '$bulanlalu',
                panen = '$panen',
                tanam = '$tanam',
                puso = '$puso',
                bsbulanlalu = '$bsbulanlalu',
                bspanen = '$bspanen',
                bstanam = '$bstanam',
                bspuso = '$bspuso'
                WHERE  id_sbs = $id_sbs
                ";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);

}

//akhir ubah sbs

//rekap bulan

function rpb($data){
    global $con;
    var_dump($data);
    $total = $data['total'];
    $kecamatan = $data['kecamatan'];
    //mencari id padi
 $sql = "SELECT id_padi as last_id FROM tb_padi LIMIT 1";
 $hasil = mysqli_query($con, $sql);
 $row = mysqli_fetch_array($hasil);
 $lastId = $row['last_id'];

 //menyimpan data rakap ke tb_rpb
 $sql = "INSERT INTO tb_rpb (id_padi) SELECT id_padi FROM tb_padi WHERE kecamatan = '$kecamatan'";
 mysqli_query($con, $sql);
 return mysqli_affected_rows($con);
}

//akhir rekap bulan

//ubah password

function password($data){
    global $con;
    $id = $data['id'];
    $oldPassword = $data['old_password'];
    $newPassword = $data['new_password'];
    $repeatNewPassword = $data['repeat_new_password'];

    $passwordUpdate = password_hash($newPassword, PASSWORD_DEFAULT);
    $query = "UPDATE tb_login SET password = '$passwordUpdate' WHERE id = $id";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

// akhir ubah password
?>