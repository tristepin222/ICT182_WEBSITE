<?php
/**
 * Created by PhpStorm
 * Project's name :
 * Use :
 * User : jessy.borcard
 * Date : 11.03.2020
 * Time : 14:13
 *
 *
 */
ob_start();
$titre = "RentASnow - edit";
require_once "model/ProductsManagement.php";
$data = $_POST["products"];
$key = $_GET["code"];



foreach($data as  $value) {



    if($key == $value["id"]){

        $key2 = $value;
    }
}


$snow = $key2;
?>

<div class="thumbnail">
    <form method="post" action="index.php?action=editSnow&code=<?php echo $snow[1] ?>">
    <a href=<?php echo $snow[8] ?>><img src=<?php echo "view/content/images/" . substr($snow[8], -14, 4) . ".jpg"  ?> alt="Snow" title="Snow"/></a>
    <div class="caption">
        <label><input type="text" value="<?php echo $snow[0] ?>" name="id" hidden></label>
        <label> Code :<input type="text" value="<?php echo $snow[1] ?>" name="code"></label><br>
        <label> Marque :<input type="text" value="<?php echo $snow[2] ?>" name="marque"></label><br>
        <label> Modèle :<input type="text" value="<?php echo $snow[3] ?>"  name="model"></label><br>
        <label> Longueur :<input type="text" value="<?php echo $snow[4] ?>"  name="longueur"></label></p><br>
        <label> Quantité :<input type="text" value="<?php echo $snow[5] ?>"  name="quantite"></label></p><br>
        <label> prix :<input type="text" value="<?php echo $snow[7] ?>"  name="prix"></label></p>
        <label> description :<input type="text" value="<?php echo $snow[6] ?>"  name="description"></label></p>
        <button class="w-100" type="submit">Modifier</button>

    </div>
    </form>
</div>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
