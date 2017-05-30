<?php
session_start();
if($_SESSION){
  header("Location: admin/media.php");
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Kepegawaian</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">

<style>
body {
  font-family: "Open Sans", sans-serif;
  height: 100vh;
  background: url("http://linkis.com/url-image/https://scontent.cdninstagram.com/t51.2885-15/e35/12729414_1640546179543594_1915694026_n.jpg?ig_cache_key=MTE4OTg3MjI0NTI1MDIyNTI4Mg%3D%3D.2") 50% fixed;
  background-size: cover;
}

@keyframes spinner {
  0% {
    transform: rotateZ(0deg);
  }
  100% {
    transform: rotateZ(359deg);
  }
}
* {
  box-sizing: border-box;
  color: #ccc;
}

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
  background: rgba(4, 40, 68, 0.85);
}

.login {
  border-radius: 2px 2px 5px 5px;
  padding: 10px 20px 20px 20px;
  width: 90%;
  max-width: 320px;
  background: #ffffff;
  position: relative;
  padding-bottom: 80px;
  box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
}
.register {
  border-radius: 2px 2px 5px 5px;
  padding: 10px 20px 20px 20px;
  width: 90%;
  max-width: 320px;
  background: #ffffff;
  position: relative;
  padding-bottom: 80px;
  box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
}
.login.loading button {
  max-height: 100%;
  padding-top: 50px;
}
.login.loading button .spinner {
  opacity: 1;
  top: 40%;
}
.login.ok button {
  background-color: #8bc34a;
}
.login.ok button .spinner {
  border-radius: 0;
  border-top-color: transparent;
  border-right-color: transparent;
  height: 20px;
  animation: none;
  transform: rotateZ(-45deg);
}
.login input {
  display: block;
  padding: 15px 10px;
  margin-bottom: 10px;
  width: 100%;
  border: 1px solid #ddd;
  transition: border-width 0.2s ease;
  border-radius: 2px;
  color: #0B0A0A;
}
.login input + i.fa {
  color: #fff;
  font-size: 1em;
  position: absolute;
  margin-top: -47px;
  opacity: 0;
  left: 0;
  transition: all 0.1s ease-in;
}
.login input:focus {
  outline: none;
  color: #444;
  border-color: #2196F3;
  border-left-width: 35px;
}
.login input:focus + i.fa {
  opacity: 1;
  left: 30px;
  transition: all 0.25s ease-out;
}
/*select*/
.login select {
  display: block;
  padding: 15px 10px;
  margin-bottom: 10px;
  width: 100%;
  border: 1px solid #ddd;
  transition: border-width 0.2s ease;
  border-radius: 2px;
  color: #ccc;
}
.login select + i.fa {
  color: #fff;
  font-size: 1em;
  position: absolute;
  margin-top: -47px;
  opacity: 0;
  left: 0;
  transition: all 0.1s ease-in;
}
.login select:focus {
  outline: none;
  color: #444;
  border-color: #2196F3;
  border-left-width: 35px;
}
.login select:focus + i.fa {
  opacity: 1;
  left: 30px;
  transition: all 0.25s ease-out;
}
.login a {
  font-size: 0.8em;
  color: #2196F3;
  text-decoration: none;
}
.login .title {
  color: #444;
  font-size: 1.2em;
  font-weight: bold;
  margin: 10px 0 30px 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 20px;
}
.login button {
  width: 100%;
  height: 100%;
  padding: 10px 10px;
  background: #2196F3;
  color: #fff;
  display: block;
  border: none;
  margin-top: 20px;
  position: absolute;
  left: 0;
  bottom: 0;
  max-height: 60px;
  border: 0px solid rgba(0, 0, 0, 0.1);
  border-radius: 0 0 2px 2px;
  transform: rotateZ(0deg);
  transition: all 0.1s ease-out;
  border-bottom-width: 7px;
}



 </style>
    <script src="js/prefixfree.min.js"></script>
</head>
<body>
<div class="wrapper">  
        <?php
        if(isset($_POST['login'])){
          include("config/koneksi.php");
          
          $username = $_POST['username'];
          $password = sha1($_POST['password']);
          $level    = $_POST['level'];
          
          $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");


          if(mysqli_num_rows($query) == 0){
            echo '<div class="alert alert-danger"> Data Yang dimasukan Salah.</div>';
          }else{
            $row = mysqli_fetch_assoc($query);
            $nip = $row['nip'];
            $foto = $row['foto'];
            if($row['level'] == 1){
              $_SESSION['username']=$username;
              $_SESSION['level']='1';
              $_SESSION['foto']= $foto;
              header("Location: admin/media.php?page=home");
            }else if($row['level'] == 2){
              $_SESSION['username']=$username;
              $_SESSION['level']='2';
              $_SESSION['foto']= $foto;
              $_SESSION['nip']=$nip;
              header("Location: admin/media.php?page=home");
            }else{
              echo '<div class="alert alert-danger"> Data Yang dimasukan Salah</div>';
            }
          }
        }
        ?>
        <!-- Form -->
    <form class="login" role="form" action="" method="post">
        <p class="title">Log in Aplikasi Kepegawaian</p>
        <input type="text" name="username"  placeholder="Username" required autofocus /><i class="fa fa-user"></i>
        <input type="password" name="password"  placeholder="Password" required autofocus /><i class="fa fa-key"></i>
        <button  name="login" id="alert">
          <span class="state">Log in </span>
        </button>
    </form>
    <div>
    
    </div>
  </div>   

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>