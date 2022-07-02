<?php
$koneksi = mysqli_connect("localhost","root","","secreatmsg");
$kopirek = "Yazz";
$update = "Update date : 6-Juni-2022";
$peringatan = "Mohon maaf apabila websitenya lemot, jika tidak tampil apa-apa, bisa refresh aja halamannya. Terima kasih.";
$hubungi = "Jika ada kendala, bisa hubungi saya di whatsapp saya <a href='https://api.whatsapp.com/send?phone=6281290215655' target='_blank'>081290215655</a>";
$penjelasan = 
'
<h3># Penjelasan</h3>
        <ul>
            <li>Terima kasih sudah mengunjungi website saya</li>
            <li>Websitenya masih pake hosting gratis, jadi maaf kalau sering lag dan banyak iklan</li>
            <li>Kalau pagenya/halamannya gk ke load/ngeblank, bisa direfresh aja</li>
            <li>Mohon untuk tidak menggunakan bahasa yg toxic (kecuali ke sahabat sendiri)</li>
        </ul>
        <h3># Cara memakai website ini</h3>
        <ul>
            <li>Ketikan nama kamu bebas, lalu tekan mulai</li>
            <li>Salin dan simpan link postingan kamu</li>
            <li>Bagikan link postingan kamu ke berbagai media sosial</li>
            <li>Ajak temanmu juga untuk memakai website ini ya :)</li>
        </ul>
';

function query($query){
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambahpost($data){
    global $koneksi;

    $id = $data['p'];
    $nama = $data["nama"];
    $tgl = $data["tgl"];

    $query = "INSERT INTO postingan VALUES ('$id', '$nama', '$tgl')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function tambahKomen($data){
    
    global $koneksi;

   $komen = $data['pesan'];
   $idP = $data['idPesan'];
   $idPostingan = $data["idPostingan"];
    
   // proses insert komentar ke database
   $query = "INSERT INTO komentar VALUES ('', '$idP', '$idPostingan', '$komen')";
   $hasil = mysqli_query($koneksi, $query);
}

function hapuspostingan($id){
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM postingan where idPostingan = $id"); // ini akan menghapus data dari table mahasiswa yg idnya sesuai dengan yg kita inginkan
    return mysqli_affected_rows($koneksi);
}

function hapuspesan($id, $idP){
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM pesan1 WHERE idPostingan=$id AND idPesan = $idP"); // ini akan menghapus data dari table mahasiswa yg idnya sesuai dengan yg kita inginkan
    return mysqli_affected_rows($koneksi);
}



?>
