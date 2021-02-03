<?php 
session_start();
require 'functions.php';

if ( !isset($_SESSION["login"]) ){
	echo "<script>
      alert('Anda Harus Login Terlebih Dahulu!')
      window.location.href='login.php'
		</script>";
}

$product = query("SELECT * FROM product ORDER BY product_id ASC");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Action Figure Shop</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Action Figure <span>Shop</span></h3>
      </div>
      <div class="right_area">
        <a href="logout.php" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
      <center>
        <img src="1.jpg" class="profile_image" alt="">
        <h4>Welcome <br>
		      	<?php echo $_SESSION["username"]; ?>
		    </h4>
      </center>
      <a href="index.php"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="halaman2.php"><i class="fas fa-table"></i><span>Gallery Figure</span></a>
      <a href="halaman3.php"><i class="fas fa-shopping-cart"></i><span>Shopping Cart</span></a>
      <a href="halaman4.php"><i class="fas fa-info-circle"></i><span>About Us</span></a>
      <a href="halaman5.php"><i class="fas fa-address-card"></i><span>Member Area</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
      <div class="content_cf">
			<div class="main">
				<br><br>
				<h1>List of Action Figure!
				</h1><hr>
			</div>
			<?php $i = 1; ?>
			<?php foreach ( $product as $row)  : ?>
			
			<div class="box">
			<form method="post" action="halaman3.php?action=add&id=<?php echo $row["product_id"]; ?>">
				<img src="<?php echo $row["images"]; ?>">
					<div class="desc"><b> <?php echo $row["product_name"]; ?></b> <p> <b> Rp. <?php echo number_format($row["price"]); ?> </b></p> </div>
					<input type="number" min="1" max="25" name="quantity" class="form-control" value="1" >
					<input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />
					<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
					<div class="btn"> <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn-success" value="Add to Cart" /></div>
			</form>
			</div>
			
			<?php endforeach; ?>
		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>