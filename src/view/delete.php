<?php
/**
 * Created by PhpStorm
 * Project's name :
 * Use :
 * User : jessy.borcard
 * Date : 11.03.2020
 * Time : 14:12
 *
 *
 */
ob_start();
$titre = "RentASnow - delete";
require_once "model/ProductsManagement.php";
$data = $_POST["products"];
$key = $_GET["code"];
$key--;
$snow = $data[$key];

?>

<div class="thumbnail">
    <a href=<?php echo $snow[8] ?>><img src=<?php echo "view/content/images/" . substr($snow[8], -14, 4) . ".jpg"  ?> alt="Snow" title="Snow"/></a>
    <div class="caption">
        <h3><?php echo $snow[1] ?></h3>
        <p> Marque : <?php echo $snow[2] ?></p><br>
        <p> Modèle : <?php echo $snow[3] ?></p><br>
        <p> Longueur : <?php echo $snow[4] ?></p><br>
        <p> Prix : <?php echo $snow[5] ?></p><br>
        <p> disponibilité : <?php echo $snow[7] ?></p>
        <p> Descriptions : <?php echo $snow[6] ?></p>

        <a href="index.php?action=delete&code=<?=$snow[0];?>&codedelete=<?=$snow[1] ?>" onclick="addSnowToCart() " class="w-100"><button class="w-100">Supprimer</button></a>
    </div>
</div>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
