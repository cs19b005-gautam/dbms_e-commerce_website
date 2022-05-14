<!-- Shopping cart section  -->
<?php
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
      if(isset($_POST['delete_button']))
      {
         $deleteditem=$cart->deleteItem($_POST['item_id'],'wishlist');
      }
      if(isset($_POST['cart_button']))
      {
         $cart->saveForLater($_POST['item_id'],'cart','wishlist');
      }
  }
?>
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Wish List</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php 
                   foreach($product->getData('wishlist') as $item):
                      $cartitems=$product->getProduct($item['item_id']);
                      $sub_total[]=array_map(function($item){
                  ?>      
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ??"unknown"; ?></h5>
                        <small>by <?php echo $item['item_brand'] ?? "unknown"; ?></small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!--  !product rating-->

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">

                            <form method="post">
                             <input type="hidden" name="item_id" value="<?php echo $item['item_id']??0 ;?>" >   
                            <button type="submit" name="delete_button" class="btn font-baloo text-danger pl-0 pr-3 border-right">Delete</button>
                            </form>
                            <form method="post">
                             <input type="hidden" name="item_id" value="<?php echo $item['item_id']??0 ;?>" >   
                            <button type="submit" name="cart_button" class="btn font-baloo text-danger pl-0 pr-3 border-right">Add to Cart</button>
                            </form>

                        </div>
                        <!-- !product qty -->
  
                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            Rs.<span class="product_price"  data-id="<?php echo $item['item_id']?? '0';?>"><?php echo $item['item_price'] ?? 0; ?>/-</span>
                        </div>
                    </div>
                </div>
                <?php
                return $item['item_price'];
                   },$cartitems);  //printing cart items
                   endforeach;
                ?>
                <!-- !cart item -->
 
            </div>

        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->