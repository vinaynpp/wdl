<?php
require('connection.inc.php');
require('functions.inc.php');

$msg="";
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
    $password=get_safe_value($con,$_POST['password']);
    
	$sql="select * from admin_users where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:index.php');
		die();
	}else{
		$msg="Please enter correct login details";	
	}
	
}
?>



<?php require('bossnav.php');?>
    <div class="card" >
    <div class="andar">

        <form  method="post">
            <div class="imgcontainer">
                <img src="../vinay.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <div>
                    <label for="username">
                        <h1>
                            USERNAME
                        </h1>
                    </label>
                    <input type="text" name="username" id="" placeholder="username" required>

                </div>

                <div>
                    <label for="password">
                        <h1>
                            PASSWORD
                        </h1>
                    </label>
                    <input type="password" name="password" id="" placeholder="password" required>
                </div>
                <div>
                    <button type="submit" name="submit">
                        <h2>
                            SIGN IN
                        </h2>
                    </button>
                    <?php echo $msg?>
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