<?php require('upar.php') ?>

<?php
$get_product = get_product($con, 4);

foreach ($get_product as $list) {
?>

    <div class="bich">
        <div class="dabba">
            <h4><br><br></h4>


            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">

            <h5><?php echo $list['name'] ?></h5>
            <ul>
                <li>
                    <H4><?php echo "ORIGINAL BHAAV : ₹";
                        echo  $list['mrp'] ?></H4>
                </li>
                <li>
                    <H3><?php echo "STOCK BAAKI : ";
                        echo $list['qty'] ?></H3>
                </li>

                <H3><?php echo "DETAIL : ";
                    echo $list['description'] ?></H3>

                <h4><br><br></h4>
        </div>

    <?php } ?>


    </div>



    <?php require('niche.php') ?>