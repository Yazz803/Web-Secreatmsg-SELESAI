<?php
    include ('functions.php');

    if(tambahpost($_POST)>0)
    $id = $_POST['p'];

    echo " 
    <script>
    document.location.href = 'post?p=$id';
    </script>
    ";
?>