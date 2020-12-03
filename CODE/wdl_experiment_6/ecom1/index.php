<?php
require('boss/connection.inc.php');
require('boss/functions.inc.php');

if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != '') {
} else {
  header('location:andar.php');
  die();
}
?>

<?php require('nav.php'); ?>


<div class="header">
  <h2 style="font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif"> <img src="VYDMART.png" alt="" height="60px"> VYD MART</h2>
</div>
<form>
<input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form>


<div class="row">
  <div class="leftcolumn">


    <?php
    $get_product = get_product($con,);

    foreach ($get_product as $list) {
    ?>
      <div class="dabba">


        <div class="card">
          <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images" style="width: 100%;">

          <h5><?php echo $list['name'] ?></h5>

          <H4 class="price"><?php echo "₹";
                            echo  $list['mrp'] ?></H4>

          <H3><?php echo "STOCK BAAKI : ";
              echo $list['qty'] ?></H3>


          <H3><?php// echo "DETAIL : ";
            //      echo $list['description'] ?></H3>

          <h4><br><br></h4>
          <p><button>Add to Cart</button></p>
        </div>

      </div>
    <?php } ?>



  </div>





  <div class="rightcolumn">

    <div>

      <?php
      $get_product = get_product($con, 1, 10);

      foreach ($get_product as $list) {
      ?>
        <div>


          <div class="card">
            <h1>BEST SELLING</h1>
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images" style="width: 100%;">

            <h5><?php echo $list['name'] ?></h5>

            <H4 class="price"><?php echo "₹";
                              echo  $list['mrp'] ?></H4>

            <H3><?php echo "STOCK BAAKI : ";
                echo $list['qty'] ?></H3>


            <H3><?php// echo "DETAIL : ";
            //      echo $list['description'] ?></H3>

            <h4><br><br></h4>
            <p><button>Add to Cart</button></p>
          </div>

        </div>
      <?php } ?>
    </div>
    <div class="card">
      <h2>CREATOR</h2>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="vinay.JPG" alt="profile images" style="width: 100%;border-radius: 50%;">
          </div>
          <div class="flip-card-back">
            <h1>VINAY PANCHAL</h1>
            <P> </P>
            <p>Architect & Engineer</p>
            <P> </P>
            <p>MASTER OF ALL</p>
            <P>BUT</P>
            <p>GOOD FOR NOTHING</p>
          </div>
        </div>
      </div>

      <div><img></div>
      <p><button>VIEW PORTFOLIO</button></p>
    </div>

  </div>
</div>




<div class="footer">
  <div>
    <p>Copyright© <a href="http://vinaypanchal.com/">VINAY PANCHAL</a> All right reserved.</p>

  </div>
</div>

</body>

</html>