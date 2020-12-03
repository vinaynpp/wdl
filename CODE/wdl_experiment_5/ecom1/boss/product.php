<?php
require('connection.inc.php');
require('functions.inc.php');


$name = '';
$mrp = '';
$qty = '';
$image = '';
$description    = '';


$msg = '';
$image_required = 'required';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from product where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);

        $name = $row['name'];
        $mrp = $row['mrp'];

        $qty = $row['qty'];

        $description = $row['description'];
    } else {
        header('location:index.php');
        die();
    }
}

if (isset($_POST['submit'])) {

    $name = get_safe_value($con, $_POST['name']);
    $mrp = get_safe_value($con, $_POST['mrp']);

    $qty = get_safe_value($con, $_POST['qty']);

    $description = get_safe_value($con, $_POST['description']);


    $res = mysqli_query($con, "select * from product where name='$name'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "Product already exist";
            }
        } else {
            $msg = "Product already exist";
        }
    }


    if ($_GET['id'] == 0) {
        if ($_FILES['file']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['file']['type'] != 'image/jpeg') {
            $msg = "Please select only png,jpg and jpeg image formate";
        }
    } else {
        if ($_FILES['file']['type'] != '') {
            if ($_FILES['file']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['file']['type'] != 'image/jpeg') {
                $msg = "Please select only png,jpg and jpeg image formate";
            }
        }
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if ($_FILES['image']['name'] != '') {
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
                $update_sql = "update product set name='$name',mrp='$mrp',qty='$qty',description='$description',image='$image' where id='$id'";
            } else {
                $update_sql = "update product set name='$name',mrp='$mrp',qty='$qty',description='$description' where id='$id'";
            }
            mysqli_query($con, $update_sql);
        } else {
            $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            mysqli_query($con, "insert into product(name,mrp,qty,description,status,image) values('$name','$mrp','$qty','$description',1,'$image')");
        }
        header('location:index.php');
        die();
    }
}
?>
<?php require('bossnav.php');?>

    <div class="card">
        <div><strong>Product</strong><small> Form</small></div>
        <form method="post" enctype="multipart/form-data">
            <div>


                <div class="form-group">
                    <label for="categories" class=" form-control-label">Product Name</label>
                    <input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name ?>">
                </div>

                <div class="form-group">
                    <label for="categories" class=" form-control-label">MRP</label>
                    <input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp ?>">
                </div>


                <div class="form-group">
                    <label for="categories" class=" form-control-label">Qty</label>
                    <input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty ?>">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" <?php echo  $image_required ?>>
                </div>



                <div class="form-group">
                    <label for="categories" class=" form-control-label">Description</label>
                    <textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description ?></textarea>
                </div>




                <button name="submit" type="submit">
                    <span>Submit</span>
                </button>
                <div class="field_error"><?php echo $msg ?></div>
            </div>
        </form>
    </div>




    <div class="footer">

        <p>Copyright© <a href="http://vinaypanchal.com/">VINAY PANCHAL</a> All right reserved.</p>


    </div>


</body>

</html>