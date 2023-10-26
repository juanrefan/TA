<?php
 include_once 'util.php';
 session_start();


//echo $_POST['nama'];
// echo "test";
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


// if (isset($_SESSION['username'])) {
//     //header("Location: berhasil_login.php");
//     echo "Berhasil Login";
//     //exit();
// }
 
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $password = hash('sha1', $_POST['kunci']); // Hash the input password using SHA-256
 
    $sql = "SELECT * FROM tbmemberkhusus WHERE memberNama='$nama' AND memberLogin='$password'";
    $result = mysqli_query($conn, $sql);
    

   echo var_dump($result);
    // if ($result->num_rows > 0) {
    //     $row = mysqli_fetch_assoc($result);
    //     $_SESSION['username'] = $row['username'];
    //     //header("Location: berhasil_login.php");
    //     //exit();
    //     echo "<script>alert(Berhasil Login')</script>";
    // } else {
    //     echo "<script>alert('Username atau password Anda salah. Silakan coba lagi!')</script>";
    // }
}



?>