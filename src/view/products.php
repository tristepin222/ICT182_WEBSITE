<?php
/**
 * Created by PhpStorm
 * Project's name :
 * Use :
 * User : Jessy.BORCARD
 * Date : 26.02.2020
 * Time : 14:16
 */

ob_start();
$titre = "ITSHOP - Produits";
$products = $_POST["products"];
?>

<div class="super_container">
    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">

                            <?php
                            require_once "model/ProductsManagement.php";
                            $snows = $_POST["products"];

                            $index = 0;
                            $index2 = 0;
                            $index3 = 2;
                            $snow_index = 0;
                            @$vendor = $_SESSION['vendor'];
                            if (isset($vendor) && $vendor == 1) {
                                echo "<table style='width: 100%;'><thead><tr>
                                <th>Code</th>
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Longueur</th>
                                <th>Prix</th>
                                <th>Disponibilité</th>
                                <th>photo</th>
                                <th>Supprimer</th>
                                <th>Modifier</th>
                                </tr></thead><tbody>";


                            } ?>
                            <div class="product_grid">
                                <?php foreach ($products as $elements): ?>
                                    <?php if (isset($vendor) && $vendor == 1): ?>


                                        <tr>
                                            <td><?php echo "$elements[1]"; ?></td>
                                            <td><?php echo "$elements[2]"; ?></td>
                                            <td><?php echo "$elements[3]"; ?></td>
                                            <td><?php echo "$elements[4]"; ?></td>
                                            <td><?php echo "$elements[5]"; ?></td>
                                            <td><?php echo "$elements[7]"; ?></td>
                                            <td><img src=<?php echo $elements[8] ?> alt="Snow" title="product"/></td>
                                            <td> <?php if ($elements[9] == 1): ?><a
                                                        style="background-color: red;"><?php else: ?> <a
                                                            href="index.php?action=products&type=delete&code=<?php echo $elements[1] ?>">
                                                        <?php endif; ?>
                                                        <img src="view/content/images/delete2.png" alt="Product"
                                                             title="Product"/></a></td>
                                            <td><a href="index.php?action=edit&code=<?php echo $elements[0] ?>"><img
                                                            src="view/content/images/edit2.png" alt="Product"
                                                            title="Product"/></a>
                                            </td>
                                        </tr>


                                    <?php else: ?>
                                        <?php if ($index == $index2): ?>
                                            <div class="row-fluid">

                                            <div class="span12">

                                            <div class="yoxview">
                                            <div class="row-fluid">
                                            <ul class="thumbnails">
                                        <?php endif; ?>


                                        <!-- Product -->
                                        <div class="product">
                                            <div class="product_image">
                                                <a href=index.php?action=aProduct&product=<?= $elements[0] ?>>
                                                    <?php if (file_exists($elements[7])) : ?>
                                                        <img src="<?= $elements[7] ?>" alt="<?= $elements[2] ?>"
                                                             title="<?= $elements[2] ?>"/>
                                                    <?php else : ?>
                                                        <img src="view/content/images/No_Image_Available.jpg"
                                                             alt="<?= $elements[2] ?>" title="<?= $elements[2] ?>"/>
                                                    <?php endif; ?>
                                                </a></div>
                                            <div class="product_content">
                                                <div class="product_title">
                                                    <a href="index.php?action=aProduct&product=<?= $elements[0] ?>"><?php echo $elements[2] ?></a>
                                                    <div class="addCart">
                                                        <a class="addCartText"
                                                           href="index.php?action=addCart&product=<?php echo $elements[0] ?>&quantity=1">+</a>


                                                    </div>
                                                </div>
                                                <div class="product_price"><?php echo $elements[5] ?> $</div>
                                            </div>
                                        </div>

                                        <?php if ($index == $index3): ?>
                                            </ul>
                                            </div>


                                            </div>

                                            </div>

                                            </div>
                                            <?php $index2 = $index2 + 3;
                                            $index3 = $index3 + 3; endif; ?>


                                    <?php endif; ?>

                                    <?php
                                    $snow_index++;
                                    $index++; endforeach; ?>

                                <?php if (isset($vendor) && $vendor == 1) {
                                    echo "</tbody></table><a href='index.php?action=addProduct'><button class='w-100'>Ajouter un Produit</button></a>";
                                } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $contenu = ob_get_clean();

        require "gabarit.php";

        ?>
