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

@$titre = "article détaillé";


require_once "model/ProductsManagement.php";
$data = $product;
?>

<div class="super_container">

    <!-- Product Details -->
    <div class="product_details">
        <div class="container">
            <h2>Article détaillé</h2>
            <hr>
            <div class="row details_row">

                <!-- Product Content -->
                <div class="col-lg-6">

                    <div class="details_name">Produit :</div>
                    <div class="details_price"><?php echo $data[0][2] ?></div>

                    <hr>

                    <div class="details_name">Modèle :</div>
                    <div class="details_price"><?php echo $data[0][3] ?></div>

                    <hr>

                    <div class="details_name">Prix :</div>
                    <div class="details_price"><?php echo $data[0][5] ?> $</div>

                    <hr>

                    <div class="details_name">Code :</div>
                    <div class="details_price"><?php echo $data[0][1] ?></div>

                    <hr>

                    <div class="details_name">Taille :</div>
                    <div class="details_price"><?php echo $data[0][4] ?> cm</div>

                    <hr>

                    <div class="details_name">Quantité disponible :</div>
                    <div class="details_price"><?php echo $data[0][6] ?></div>

                    <hr>

                </div>

                <!-- Product Description -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name">Description :</div>
                        <div class="details_price"><?php echo $data[0][9] ?></div>
                        <hr>
                        <div class="details_name">Image :</div>
                        <?php if(file_exists($data[0][8])) : ?>
                            <img src="<?= $data[0][8] ?>" width="450px" alt="<?= $data[0][2] ?>" title="<?= $data[0][2] ?>"/>
                        <?php else : ?>
                            <img src="view/content/images/No_Image_Available.jpg" width="450px" alt="<?= $data[0][2] ?>" title="<?= $data[0][2] ?>"/>
                        <?php endif; ?>
                    </div>
                    <br><br>
                </div>

            </div>
        </div>
    </div>
</div>





<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
