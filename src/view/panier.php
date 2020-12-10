<?php
/**
 * Created by PhpStorm
 * Project's name :
 * Use :
 * User : jessy.borcard
 * Date : 06.03.2020
 * Time : 11:48
 *
 *
 */


ob_start();
$titre = "Itshop - Cart";
$_SESSION["cartSize"] = 0;
$size = 0;
$total = 0;
if(isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
}

?>

<div class="super_container">
    <!-- Home -->

    <div class="home_1">

    </div>

<?php
    if (isset($_SESSION["panier"])) {
    $data = $_SESSION["panier"];
    } else { ?>

        <!-- Cart Info -->

        <div class="cart_info">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!-- Column Titles -->
                        <div class="cart_info_columns clearfix">
                        </div>
                    </div>
                </div>
                <div class="row cart_items_row">
                    <div class="col">

                            <!-- Cart Item -->
                            <div style="font-size: 30px; color: black" class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">


                            Votre panier est Vide.

                            </div>
                    </div>
                </div>

                <div class="row row_cart_buttons">
                    <div class="col">
                        <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                            <div class="button continue_shopping_button"><a href="index.php?action=products">Voir les produits</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


<?php
}
?>

<?php if (isset($data)):
$_SESSION["totalPrice"] = 0?>



    <!-- Cart Info -->

    <div class="cart_info">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Product</div>
                        <div class="cart_info_col cart_info_col_price">Price</div>
                        <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                        <div class="cart_info_col cart_info_col_total">Total</div>
                    </div>
                </div>
            </div>
            <div class="row cart_items_row">
                <div class="col">

                    <?php foreach ($data as $elements):
                    $_SESSION["totalPrice"] += ($elements[0][5] * $elements[1]);
                    ?>



                    <!-- Cart Item -->
                    <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

                        <!-- Name -->
                        <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_item_image">
                                <div>
                                    <?php if(file_exists($elements[0][8])) : ?>
                                        <img src="<?= $elements[0][8] ?>" alt="<?= $elements[0][2] ?>" title="<?= $elements[0][2] ?>"/>
                                    <?php else : ?>
                                        <img src="view/content/images/No_Image_Available.jpg" alt="<?= $elements[0][2] ?>" title="<?= $elements[0][2] ?>"/>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="cart_item_name_container">
                                <div class="cart_item_name"><a href="index.php?action=aProduct&product=<?= $elements[0][0] ?>"><?php echo $elements[0][2] ?></a></div>
                                <?php if (isset($elements[2])): ?><?php if($elements[2]): ?><p style="color: red ">Il n'y en a pas assez en stock</p><?php endif;?><?php endif;?>
                            </div>
                        </div>


                        <!-- Price -->
                        <div class="cart_item_price">$<?php echo $elements[0][5] ?></div>
                        <!-- Quantity -->
                        <div class="cart_item_quantity">
                                <div class="product_quantity clearfix">
                                    <span>Qty</span>
                                    <input id="quantityDisplay<?=$elements[0][0]?>" type="number" max="10" min="1" value="<?php echo $elements[1] ?>" name="quantity">
                                    <div class="quantity_buttons">
                                        <a href="index.php?action=addCart&product=<?= $elements[0][0] ?>&quantity=1" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
                                        <a href="index.php?action=addCart&product=<?= $elements[0][0] ?>&quantity=-1" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                        </div>

                        <!-- Total -->
                        <div class="cart_item_total">$<?php echo $elements[0][5] * $elements[1];  ?></div>

                        <a style="float: right" href="index.php?action=addCart&product=<?= $elements[0][0] ?>&delete=true"><input style="background-color: transparent; font-size: 50px; height: 50px; margin-left: 10px; color: red" class="QuantityButton" type="button" value="˟" ></a>

                    </div>

                        <?php $size = $size + $elements[1]; endforeach; ?>

                </div>
            </div>

            <div class="row row_cart_buttons">
                <div class="col">
                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="button continue_shopping_button"><a href="index.php?action=products">Continuer vos achats</a></div>
                        <div class="cart_buttons_right ml-lg-auto">
                            <div class="button clear_cart_button"><a href="index.php?action=clearCart">Vider le panier</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_extra">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-6 offset-lg-2">
                    <div class="cart_total">
                        <div class="section_title">Total du panier</div>
                        <div class="cart_total_container">
                            <ul>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Total</div>
                                    <div class="cart_total_value ml-auto">$<?php echo  $_SESSION["totalPrice"] ?></div>
                                </li>
                            </ul>
                        </div>
                        <div class="button checkout_button"><a href="index.php?action=confirmOrder">Confirmer l'achat</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="view/content/js/cart.js"></script>

<?php   $_SESSION["cartSize"] = $size; endif; ?>

<?php
$contenu = ob_get_clean();
require "gabarit.php";
?>
