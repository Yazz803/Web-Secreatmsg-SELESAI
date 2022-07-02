<?php

include ('../functions.php');

$postingan = query("SELECT * FROM postingan ORDER BY idPostingan DESC");

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

            <form class="container-fluid justify-content-space-between" action="../index.php">

                <a href="https://www.instagram.com/yazz_803" target="_blank" class="navbar-brand">

                    <img src="../img/picprofile.png" alt="kosong" style="border-radius: 50%;" width="40px" height="40px">

                    <button class="btn text-white me-2" type="button">Yazz803</button>

                </a>

              <button class="btn btn-sm btn-outline-secondary text-white" type="submit">Posting</button>

            </form>

        </nav>

    </header>



    <div class="main">

        <h2>Postingan</h2>

        <?php foreach ($postingan as $post):?>

            <a style="color: black; text-decoration: none;" href="adminpost.php?idPostingan=<?= $post["idPostingan"] ;?>">

                <div class="user mb-3" style="text-align: left;border: 1px black solid;border-radius: 5px;padding:10px;">

                    <p class="lead" style="margin: 0;font-weight:bold;"><?= $post["nama"] ;?></p>

                    <p class="lead" style="font-size: 15px;">

                        Diposting pada : <?= $post['tgl'] ;?>

                    </p>

                </div>

            </a>

        <?php endforeach ;?>

    </div>



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