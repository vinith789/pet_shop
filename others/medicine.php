
<?php
   $set_title = "Medicine-page";

   include("../common/head.php");
   require("../html/header.html");
?>

<?php include("../admin/addtocart.php"); ?>

<?php
include("../common/html/header.html");
?>

<body style="font-family: 'Poppins', sans-serif; margin:0; padding:0; box-sizing: border-box; outline: none; border:none; text-decoration: none text-transform: capitalize;">


<?php
include("../admin/message.php");
?>

<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php

      $select_products = mysqli_query($conn, "SELECT * FROM `medicine`");
      if(mysqli_num_rows($select_products) > 0){
       while($fetch_product = mysqli_fetch_assoc($select_products)){

      ?>

      <form action="" method="post">
         <div class="box">

            <img src="../admin/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="" style="width:100%; height: 250px;">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>
<?php
require("../html/footer.html");
?>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>