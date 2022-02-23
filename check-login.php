<?php
SESSION_START();
require_once("include/connect.php");

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      $username = test_input($_POST['username']);
      $password = test_input($_POST['password']);
      $role = test_input($_POST['role']);

      if(empty($username)){
          header("Location:./login.php?error= Username is Required");
      }else if (empty($password)){
          header("Location:./login.php?error= Password is Required");
      }else{
        $password = md5($password);
        $sql = "SELECT *FROM users WHERE username = '$username' AND password='$password'"; 
        $result = mysqli_query($connect,$sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['password'] === $password && $row ['role'] == $role){
                $_SESSION['name'] = $row ['name'];
                $_SESSION['id'] = $row ['id'];
                $_SESSION['role'] = $row ['role'];
                $_SESSION['username'] = $row ['username'];

                header("location:./admin/index.php");

            }else{
                header("Location:./login.php?error= Incorrect username or password is Required");
            }
        }else{
            header("Location:./login.php?error= Incorrect username or password is Required");
        }

    }

}else{
    header("location:login.php");
}
?>