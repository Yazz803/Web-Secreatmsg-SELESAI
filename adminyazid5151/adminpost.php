<?php



include ('../functions.php');

$id = $_GET["idPostingan"];

$post = query("SELECT * FROM postingan WHERE idPostingan=$id");



$pesanrahasia = query("SELECT * FROM pesan1 WHERE idPostingan=$id ORDER BY idPesan DESC ");



$i= rand(1,100);

// proses yang dilakukan setelah tombol submit pesanrahasia diklik

if (isset($_GET['act']) == "submit" && "submit&i=$i")

{

   // membaca data pesanrahasia dari form

   $pesan = $_POST['pesan'];

   $id = $_POST['idPostingan'];

   $tanggal = $_POST["tanggal"];

    

   // proses insert pesanrahasia ke database

   $query = "INSERT INTO pesan1 VALUES ('', '$id', '$pesan', '$tanggal')";

   $hasil = mysqli_query($koneksi, $query);



   header("Location: post.php?idPostingan=$id&i=$i");

}



// menampilkan komentar dari setiap pesan pada postingan tertentu

$komentar = query("SELECT * FROM komentar WHERE idPostingan=$id");

?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Pesan Rahasia</title>

</head>

<body style="background-color: rgb(187, 187, 187);">

    <header>

        <nav class="navbar bg-dark fixed-top">

            <form class="container-fluid justify-content-space-between" action="../index.php" method="post">

                <a href="https://www.instagram.com/yazz_803" target="_blank" class="navbar-brand">

                    <img src="../img/picprofile.png" alt="kosong" style="border-radius: 50%;" width="40px" height="40px">

                    <button class="btn text-white me-2" type="button">Yazz803</button>

                </a>

                <a class="btn btn-sm btn-outline-secondary text-white" href="index.php">Postingan</a>

              <button class="btn btn-sm btn-outline-secondary text-white" type="submit">Posting</button>

            </form>

        </nav>

    </header>



    <div class="main">

        <?php foreach ($post as $p):?>

        <h3 class="lead">KIRIM PESAN TIDAK DIKENAL KEPADA</h3>

        <h2><?= $p["nama"] ;?></h2>

        <p style="text-align: left;width: 70%;font-size: 14px;" class="lead pt-3"># <?= $p['nama'] ;?> tidak akan pernah tahu yang mengirim pesan ini.</p>

        <form action="post.php?idPostingan=<?= $p["idPostingan"];?>&act=submit" method="post">

            <input class="form-control" type="text" autocomplete="off" name="pesan" aria-label="readonly input example" placeholder="Tulis Pesan Rahasia" required>

            <?php date_default_timezone_set("Asia/Jakarta") ;?>

            <input type="hidden" name="tanggal" value="<?= date("l, d-M-Y H:i:s T") ;?>">

            <input type="hidden" name="idPostingan" value="<?= $p["idPostingan"] ;?>">

            <button class="btn btn-primary mt-3" name="kirimpesan" type="submit" name="act">Kirim pesan</button>

        </form>

        <p class="lead mt-3" style="font-size: 15px;text-align: left;">Posted : <?= $p["tgl"] ;?> </p>

        <?php endforeach;?>
        <a href="../CRUD/hapus.php?idPostingan=<?= $id ;?>" onclick=" return confirm('Hapus postingan ini?')" class="btn btn-danger">Hapus Postingan</a>

    </div>

    

    <?php foreach($pesanrahasia as $pesan) :?>

    <div class="pesan" style="margin-top: 0;">

        <p style="width:100%;"><?= $pesan["pesan"] ;?></p>

        <p class="lead" style="font-size: 12px;"><?= $pesan["tanggal"] ;?></p>

        <a href="adminpesan.php?idPostingan=<?= $pesan["idPostingan"];?>&idP=<?= $pesan["idPesan"] ;?>">Balas Pesan</a>

    </div>

    <?php endforeach;?>

        

    <footer>

        <p class="lead">Copyright - <?= $kopirek ;?></p>

        <p>Cara menggunakan website ini : </p>

        <ul>

            <li>Masukan Nama (terserah), kemudian tap mulai</li>

            <li>Klik postingan yang ada nama kamu </li>

            <li>Salin link url untuk dibagikan kepada teman-teman kamu dan mintalah mereka untuk mengisi pesan rahasia</li>

            <li>Selesai :)</li>

        </ul>

        <p style="color: lightblue;"><?= $update ;?></p>

        <p><?= $peringatan ;?></p>

        <p><?= $hubungi;?></p>

        <br>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>