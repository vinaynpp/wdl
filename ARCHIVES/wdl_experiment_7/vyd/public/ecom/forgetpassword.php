<?php
require('boss/connection.inc.php');
require('boss/functions.inc.php');

$msg = "";
if (isset($_POST['submit'])) {
   $email = get_safe_value($con, $_POST['email']);

   $sql = "select * from users where email='$email' ";
   $res = mysqli_query($con, $sql);
   $count = mysqli_num_rows($res);
   if ($count > 0) {
      $sql = " SELECT USERNAME FROM `users` WHERE `email`= '$email'";
      $res = mysqli_query($con, $sql);
      $arrr = mysqli_fetch_array($res);
      $username = $arrr['USERNAME'];
      $sql = " SELECT PASSWORD FROM `users` WHERE `email`= '$email'";
      $res = mysqli_query($con, $sql);
      $arrr = mysqli_fetch_array($res);
      $password = $arrr['PASSWORD'];


      $html = "<table><tr><td>username</td><td>$username</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>password</td><td>$password</td></tr</table>";
      $khudkaemail = "yaadnahiabhi@gmail.com";
      $khudkapassword = "khuljasimsim";

      include('smtp/PHPMailerAutoload.php');
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 587;
      $mail->SMTPSecure = "tls";
      $mail->SMTPAuth = true;
      $mail->Username = $khudkaemail;
      $mail->Password = $khudkapassword;
      $mail->SetFrom($khudkaemail);
      $mail->addAddress($email);
      $mail->IsHTML(true);
      $mail->Subject = "New Contact Us";
      $mail->Body = $html;
      $mail->SMTPOptions = array('ssl' => array(
         'verify_peer' => false,
         'verify_peer_name' => false,
         'allow_self_signed' => false
      ));
      if ($mail->send()) {
         $msg = "mail has been sent";
      } else {
         $msg = "mail has not been sent";
      }
     

   } else {
      $msg = "Please enter correct email id";
   }


   
}



require('nav.php'); ?>
<div class="card">
   <div class="andar">

      <form method="post">
         <div class="imgcontainer">
            <img src="vinay.jpg" alt="Avatar" class="avatar">
         </div>

         <div class="container">
            <div>
               <label for="email">
                  <h3>
                     EMAIL
                  </h3>
               </label>
               <input type="email" name="email" id="" placeholder="email" required>

            </div>
            <button type="submit" name="submit">
               <h2>
                  submit
               </h2>
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