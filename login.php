<?php 
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
        <meta charset="utf-8">
        <meta name="description" content="slick Login">
        <meta name="author" content="Webdesigntuts+">
        <link rel="stylesheet" type="text/css" href="style_login.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="http://www.modernizr.com/downloads/modernizr-latest.js"></script>
        <script type="text/javascript" src="placeholder.js"></script>
        

    </head>

    <body>
        <form id="slick-login"; method="post">
            <label>Username :</label>
            <input type="text" name="fusername" class="placeholder"placeholder="username"><br>
            <label>Password :</label>
            <input type="password" name="fpassword" class="placeholder" placeholder="password"><br>
            <input type="submit" name="fmasuk" value="Log In">
        </form>

        <?php 
            if (isset($_POST['fmasuk'])) {
                $user = $_POST['fusername'];
                $pass = $_POST['fpassword'];
                $data_user = mysqli_query($koneksi, "SELECT * FROM tab_login WHERE username='$user' AND pasword = '$pass'");
                $r = mysqli_fetch_array($data_user);
                $username = $r['username'];
                $password = $r['pasword'];
                $level = $r['level'];
                if($user == $username && $pass == $password){
                    $_SESSION['level'] = $level;
                    header('location:index.php');
                }else{
                    echo 'username dan password salah';
                }
                
            }
        ?>
    </body>

</html>