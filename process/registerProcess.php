<?php
 // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
 // $_POST itu method di formnya
 if(isset($_POST['register'])){

 // untuk mengoneksikan dengan database dengan memanggil file db.php
 include('../db.php');

 // tampung nilai yang ada di from ke variabel
 // sesuaikan variabel name yang ada di registerPage.php disetiap input
 $email = $_POST['email'];
 $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 $name = $_POST['name'];
 $phonenum = $_POST['phonenum'];
 $membership = $_POST['membership'];

 $sql = "SELECT *FROM users where email='$email'";
 $query = mysqli_query($con,$sql);
 if(mysqli_num_rows($query)>0){
    echo
    '<script>
    alert("Email already registered");
    window.location = "../process/registerProcess.php"
    </script>';
 }else{
    // Melakukan insert ke databse dengan query dibawah ini
    $query = mysqli_query($con,
    "INSERT INTO users(email, password, name, phonenum, membership)
    VALUES
    ('$email', '$password', '$name', '$phonenum', '$membership')")
    or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

    if($query){
        echo
            '<script>
            alert("Register Success"); 
            window.location = "../index.php"
            </script>';
     }
    
     else{
        echo
            '<script>
            alert("Register Failed");
            </script>';
     }
 }
 

// if($con){
//     if(isset($_POST['register'])){
//         $email = $_POST['email'];
//         $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//         $name = $_POST['name'];
//         $phonenum = $_POST['phonenum'];
//         $membership = $_POST['membership'];

//         $sql_match = "SELECT * FROM users WHERE email ='$email'";
//         $sql_query = mysqli_query($con, $sql_match);
//         $row = mysqli_num_rows($sql_query);
//         if($row>0){
//             echo "Mail is already exits";
//         }else{
//             $sql = "INSERT INTO users VALUES(NULL,'$email', '$password', '$name', '$phonenum', '$membership')";
//             $result = mysqli_query($con,$sql);
//             if($result){
//                 echo"inserted";
//             }else{
//                 echo"not inserted";
//             }
//         }

//     }
// }

// if($query != null){
// 	$_SESSION['error'] = 'Username yang anda masukkan sudah ada di database.';
// 	header("Location: registerPage.php");

// }else{
// 	//username unik. simpan di database.
// 	$query = "insert into users (nama, username, password) values  (?,?,?)";
// 	$stmt = $mysqli->stmt_init();
// 	$stmt->prepare($query);
// 	$stmt->bind_param('sss', $user['nama'],$user['username'],$user['password']);
// 	$stmt->execute();
// 	$result = $stmt->get_result();
// 	var_dump($result);

// 	$_SESSION['message']  = 'Berhasil register ke dalam sistem. Silakan login dengan username dan password yang sudah dibuat.';
// 	header("Location: registerPage.php");
// }


// $sql = "SELECT *FROM users where email='$email'";
// $query = mysqli_query($con,$sql);
// if($email>0){
//     echo '<script>alert("Email sudah terdaftar");</script>';
//  }
 

}else{
    echo
        '<script>
        window.history.back()
        </script>';
 }
?>