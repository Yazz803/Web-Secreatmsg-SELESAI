<?php
include ('functions.php');

$id = $_GET["p"];
$post = query("SELECT * FROM postingan WHERE idPostingan=$id");

$pesanrahasia = query("SELECT * FROM pesan1 WHERE idPostingan=$id ORDER BY idPesan DESC ");

$i= rand(1,100); // masalah pas hostingnya lemot

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

   header("Location: post?p=$id&i=$i");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        /* contact2 */
        html {
            scroll-behavior: smooth;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* style */
        div.main, div.pesan {
            background-color: rgba(255, 255, 255, 0.8);
            color: black;
            border-radius: 0;
            width: 50%;
            padding: 20px;
        }
        div.main {
            text-align: center;
            margin: 100px auto;
        }

        div.pesan {
            margin: 20px auto;
        }

        div.pesan h5 {
            color: #333;
            text-align: center;
        }
        body::before {
            content: '';
            background-image: linear-gradient(
                rgba(0, 0, 0, 0.3),
                rgba(0, 0, 0, 0.3)
            ),
            url(img/bg.png);
            background-position: center;
            background-size: cover;
            position: fixed;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: -1;
        }

        /* clear */
        .clear {
            clear: both;
        }

        /* contact2 */
        .contact2 {
            background-color: rgba(5, 5, 5, 0.7);
            color: white;
            padding: 70px 10%;
        }
        .contact-info {
            width: 45%;
            float: left;
        }
        .contact-info a {
            text-decoration: none;
            color: rgb(153, 153, 153);
        }
        .contact-info p {
            margin: 0;
            padding-top: 5px;
        }
        .contact-info svg {
            float: left;
            margin-right: 20px;
        }

        /* socialmedia */
        .socialmedia {
            width: 45%;
            margin-left: 5%;
            float: left;
        }
        .socialmedia a {
            text-decoration: none;
            color: rgb(153, 153, 153);
        }
        .socialmedia p {
            margin: 0;
            padding-top: 5px;
        }
        .socialmedia svg {
            float: left;
            margin-right: 20px;
        }

        /* footer */
        footer {
            background-color: rgb(34, 34, 34);
            padding: 30px 100px;
        }
        footer p {
            margin: 0;
            color: rgb(153, 153, 153);
            letter-spacing: 2px;
            font-size: 14px;
        }
        .contact2 ul li {
            color: #bbb;
        }

        /* Responsive */
        @media (max-width: 1000px) {
            div.main, div.pesan {
                width: 100%;
            }

            /* contact2 */
            .contact2 {
                padding: 5%;
                float: none;
            }
            .contact-info {
                float: none;
                width: 100%;
                margin-bottom: 5%;
            }
            .contact-info h3 {
                margin-bottom: 0;
            }
            .contact-info hr {
                display: none;
            }
            .contact-info svg, .contact-info p {
                margin-top: 5%;
            }
            .socialmedia {
                width: 100%;
                margin: 0;
                box-sizing: border-box;
            }
            .socialmedia h3 {
                margin-bottom: 0;
            }
            .socialmedia hr {
                display: none;
            }
            .socialmedia svg, .socialmedia p {
                margin-top: 5%;
            }
            /* end contact2 */
            /* footer */
            footer {
                padding: 30px 20px;
            }
            footer p {
                font-size: 11px;
                text-align: center;
            }
            /* end footer */
        }
    </style>
    <link rel="icon" href="img/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Pesan Rahasia</title>
</head>
<body style="background-color: rgb(187, 187, 187);">
    <header>
        <nav class="navbar bg-dark fixed-top">
            <form class="container-fluid justify-content-space-between" action="index" method="post">
                <a href="https://www.instagram.com/yazz_803" target="_blank" class="navbar-brand">
                    <img src="img/picprofile.png" alt="kosong" style="border-radius: 50%;" width="40px" height="40px">
                    <button class="btn text-white me-2" type="button">Yazz803</button>
                </a>
              <button class="btn btn-sm btn-outline-secondary text-white" type="submit">Buat Postingan Baru</button>
            </form>
        </nav>
    </header>

     <div class="main">
        <?php foreach ($post as $p):?>
        <h3 class="lead">KIRIM PESAN TIDAK DIKENAL KEPADA</h3>
        <h2><?= $p["nama"] ;?></h2>
        <p style="text-align: left;width: 70%;font-size: 14px;" class="lead pt-3"># <?= $p['nama'] ;?> tidak akan pernah tahu yang mengirim pesan ini.</p>
        <form action="post?p=<?= $p["idPostingan"];?>&act=submit" method="post">
            <input class="form-control" type="text" autocomplete="off" name="pesan" aria-label="readonly input example" placeholder="Tulis Pesan Rahasia" required>
            <?php date_default_timezone_set("Asia/Jakarta") ;?>
            <input type="hidden" name="tanggal" value="<?= date("l, d F Y H:i");?>">
            <input type="hidden" name="idPostingan" value="<?= $p["idPostingan"] ;?>">
            <button class="btn btn-primary mt-3" name="kirimpesan" type="submit" name="act">Kirim pesan</button>
        </form>
        <p class="lead mt-3" style="font-size: 15px;text-align: left;">Posted : <?= $p["tgl"] ;?> </p>
        <?php endforeach;?>
        <input type="text" style="border: 0;" class="form-control" id="pilih" value="http://secreatmsg.epizy.com/post?p=<?= $id ;?>" readonly>
        <button style="text-align: left;" class="btn btn-success mt-3" onclick="copy_text()" type="button">Copy link</button>

        <script type="text/javascript">
            function copy_text() {
                document.getElementById("pilih").select();
                document.execCommand("copy");
            }
        </script>
    </div>

    <div class="pesan">
        <h5><svg width="24" height="27" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm.5 17h-1v-9h1v9zm-.5-12c.466 0 .845.378.845.845 0 .466-.379.844-.845.844-.466 0-.845-.378-.845-.844 0-.467.379-.845.845-.845z"/></svg> Pesan kamu akan tampil dibawah sini</h5>
    </div>

    <?php foreach($pesanrahasia as $pesan) :?>
    <div class="pesan" id="halo" style="margin-top: 0;">
        <p  style="width:100%;font-size:18px;"><b><?= $pesan["pesan"] ;?></b></p>
        <p class="lead" style="font-size: 12px;"><?= $pesan["tanggal"] ;?></p>
        <a style="text-decoration:none;" href="komen?p=<?= $pesan["idPostingan"];?>&idP=<?= $pesan["idPesan"] ;?>">Balas Pesan atau lihat komentar</a>
    </div>
    <?php endforeach;?>

    <div class="contact2">
        <?= $penjelasan;?>
        <br>
        <div class="contact-info">
            <h3>CONTACT INFO</h3>
            <br><br>
            <a href="#" target="_blank">
                <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                </svg>
                <p><span>Ciawi, Bogor Selatan, Jawa Barat, Indonesia</span></p>
            </a>
            <hr><br>
            <a href="https://wa.me/6281290215655" target="_blank">
                <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" />
                </svg>
                <p><span>+62 81290215655</span></p>
            </a>
            <hr><br>
            <a href="mailto:yazidakbar08@gmail.com" target="_blank">
                <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6M20 6L12 11L4 6H20M20 18H4V8L12 13L20 8V18Z" />
                </svg>
                <p><span>yazidakbar08@gmail.com</span></p>
            </a>
            <hr><br>
            <a href="https://github.com/Yazz803" target="_blank">
                <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                    <path fill="currentcolor" d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z" />
                </svg>
                <p><span>Yazz803</span></p>
            </a>
            <hr><br>
            <div class="clear"></div>
        </div>

        <div class="socialmedia">
            <h3>SOCIAL MEDIA</h3>
            <br><br>
            <a href="https://instagram.com/Yazz_501" target="_blank">
                <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
                </svg>
                <p><span>@Yazz_501</span></p>
            </a>
            <hr><br>
            <a href="https://web.facebook.com/profile.php?id=100075148972747" target="_blank">
                <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z" />
                </svg>
                <p>Muhammad Yazid Akbar</p>
            </a>
            <hr><br>
            <a href="https://www.linkedin.com/in/muhammad-yazid-akbar-0b6aaa21b" target="_blank">
                <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M18.5 18.5V13.2A3.26 3.26 0 0 0 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17A1.4 1.4 0 0 1 15.71 13.57V18.5H18.5M6.88 8.56A1.68 1.68 0 0 0 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19A1.69 1.69 0 0 0 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56M8.27 18.5V10.13H5.5V18.5H8.27Z" />
                </svg>
                <p>Muhammad Yazid Akbar</p>
            </a>
            <hr><br>
        </div>
        <div class="clear"></div>
    </div>

    <footer>
        <p>Copyright ©<?= date("Y") ;?> M.Yazid A -- All Right Reserved</p>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>