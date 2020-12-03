<?php
require('boss/connection.inc.php');
require('boss/functions.inc.php');

$msg = "";
if (isset($_POST['submit'])) {
    $username = get_safe_value($con, $_POST['username']);  
      $email = get_safe_value($con, $_POST['email']);
    $password = get_safe_value($con, $_POST['password']);
    $check_user=mysqli_num_rows(mysqli_query($con,"select * from users where username='$username'"));
    if($check_user>0){
        $msg = "username already exists";
    }else{
        $sql = "INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (NULL, '$username', '$password', '$email')";
        mysqli_query($con,$sql);
        echo "insert";
        $_SESSION['USER_LOGIN'] = 'yes';
        $_SESSION['USER_USERNAME'] = $username;
        header('location:index.php');
        die();
    }   
}
?>

<?php require('nav.php'); ?>
<div class="card">
    <div class="andar">

        <form method="post">
            <div class="imgcontainer">
                <img src="vinay.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <div>
                    <label for="username">
                        <h3>
                            USERNAME
                        </h3>
                    </label>
                    <input type="text" name="username" id="" placeholder="username" required>

                </div>
                <div>
                    <label for="email">
                        <h3>
                            EMAIL
                        </h3>
                    </label>
                    <input type="email" name="email" id="" placeholder="email" required>

                </div>

                <div>
                    <label for="password">
                        <h3>
                            PASSWORD
                        </h3>
                    </label>
                    <input type="password" name="password" id="" placeholder="password" required>
                </div>
                <div>
                    <button type="submit" name="submit">
                        <h4>
                            REGISTER
                        </h4>
                    </button>
                    <?php echo $msg ?>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">
   <p>Copyright© <a href="http://vinaypanchal.com/">VINAY PANCHAL</a> All right reserved.</p>
</div>
</body>
</html>