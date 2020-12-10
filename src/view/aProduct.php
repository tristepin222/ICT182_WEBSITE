<?php
/**
 * Created by PhpStorm
 * Project's name :
 * Use :
 * User : Jessy.BORCARD
 * Date : 20.01.2020
 * Time : 14:20
 *
 *
 */


ob_start();

@$titre = "Détails de l'article";


require_once "model/ProductsManagement.php";
$data = $product;


?>

<div class="super_container">

    <!-- Product Details -->
    <div class="product_details">
        <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        <a href="<?php echo $data[0][8] ?>">
                            <div class="details_image_large">

                                <?php if(file_exists($data[0][8])) : ?>
                                    <img src="<?= $data[0][8] ?>" alt="<?= $data[0][2] ?>" title="<?= $data[0][2] ?>"/>
                                <?php else : ?>
                                    <img src="view/content/images/No_Image_Available.jpg" alt="<?= $data[0][2] ?>" title="<?= $data[0][2] ?>"/>
                                <?php endif; ?>

                        </a>
                    </div>
                </div>
            </div>


            <!-- Product Content -->
            <div class="col-lg-6">
                <div class="details_content">
                    <div class="details_name"><?php echo $data[0][2] ?></div>
                    <div class="details_price">Prix : <strong> <?php echo $data[0][5] ?> $</strong></div>

                    <!-- Product Description -->

                    <hr>

                    <div class="row">
                        <div class="col">
                            <div class="description_title_container">
                                <div class="description_title">Description</div>
                            </div>
                            <div class="description_text">
                                <p><?php echo $data[0][7] ?></p>
                            </div>
                            <a href=index.php?action=detailledProduct&product=<?= $data[0][0] ?>><input type="submit"
                                                                                                        class="details_button"
                                                                                                        value="Afficher plus"></a>
                        </div>
                    </div>

                    <!-- Product Quantity -->
                    <hr>

                    <form method="get" action="index.php?">
                        <div class="product_quantity_container">
                            <input type="text" name="action" value="addCart" hidden>
                            <input type="number" name="product" value="<?= $data[0][0] ?>" hidden>

                            <p>Quantité :</p>

                            <input class="QuantityButton QBLeft" type="button" value="-" onclick='decrementQuantity("quantityDisplay")'>
                            <input class="QuantityDisplay" id="quantityDisplay" name="quantity" type="number" max="10"
                                   min="1" value="1">
                            <input class="QuantityButton QBRight" type="button" value="+" onclick='incrementQuantity("quantityDisplay")'><br>


                            <input type="submit" class="cart_confirm_button" value="Ajouter au panier">

                        </div>
                    </form>


                    <!-- Share -->
                    <div class="details_share">
                        <span>Share:</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="application/javascript">


</script>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
