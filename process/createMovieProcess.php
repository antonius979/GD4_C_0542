<?php
 // untuk ngecek tombol yang namenya 'create' sudah di pencet atau belum
 // $_POST itu method di formnya
 if(isset($_POST['create'])){

 // untuk mengoneksikan dengan database dengan memanggil file db.php
 include('../db.php');

 // tampung nilai yang ada di from ke variabel
 // sesuaikan variabel name yang ada di registerPage.php disetiap input
 $name = $_POST['name'];
 $genre = $_POST['genre'];
 $realese = $_POST['realese'];
 $season = $_POST['season'];


 // Melakukan insert ke database dengan query dibawah ini
 $query = mysqli_query($con,
 "INSERT INTO movies(name, genre, realese, season)
 VALUES
 ('$name', '$genre','$realese', '$season')")
 or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

 if($query){
    echo
        '<script>
        alert("Create Data Success"); window.location = "../page/listMoviesPage.php"
        </script>';
 }else{
    echo
        '<script>
        alert("Create Data Failed");
        </script>';
 }

}else{
    echo
        '<script>
        window.history.back()
        </script>';
 }
?>