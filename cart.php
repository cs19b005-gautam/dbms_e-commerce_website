<?php
    include('header.php')
?>

        <?php
            
            count($product->getData('cart'))?include('Templates/_cart-template.php'): include('Templates/notFound/_cart_notFound.php');
            count($product->getData('cart'))?include('Templates/_wishlist-template.php'):include('Templates/notFound/_wishlist_notFound.php');
            include('Templates/_new-products.php');
        ?>

<?php
include('footer.php')
?>