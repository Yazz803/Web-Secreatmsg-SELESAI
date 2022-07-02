<?php
require('../functions.php');

$id = $_GET["idPostingan"];  // id ini yg akan mengambil data dari "id" database, nanti datanya diambil dan akan 
$idP = $_GET["idP"];
                    //  ditambahkan ke url sesuai dengan data id yg ada di database.

if (hapuspesan($id, $idP)>0){
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href='../adminyazid5151/adminpost.php?idPostingan=$id';
        </script>
    ";
}else {
    echo "
        <script>
            alert('data tidak berhasil dihapus');
            document.location.href='../adminyazid5151/adminpost.php?idPostingan=$id';
        </script>
    ";
}

?>