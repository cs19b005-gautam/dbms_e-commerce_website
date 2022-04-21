<?php

    ob_start();
    // include header.php file
    include('header.php');
?>

        <?php
                    //include banner template file
                    include('Templates/_banner-area.php');
                    //include banner template file
                include('Templates/_top-sale.php');

                //include special price file
                include('Templates/_special-price.php');
                //include special price file
                include('Templates/_new-products.php');
        ?>

<?php
    // include footer.php file
    include('footer.php');
?>