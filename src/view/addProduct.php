<?php
/**
 * Created by PhpStorm
 * Project's name :
 * Use :
 * User : jessy.borcard
 * Date : 11.03.2020
 * Time : 15:35
 *
 *
 */
ob_start();
$titre = "Itshop - Add an item";

require_once "model/ProductsManagement.php";


?>

<form method="post" action="index.php?action=addProduct">
    <label>Code :<input type="text" class="w-100" name="codeAdd"  required maxlength="4" ></label>
    <label>Marque :
    <input type="text" class="w-100" name="marque" required maxlength="20"></label>
    <label>Model :
    <input type="text" class="w-100" name="model" required maxlength="30"></label>
    <label>Longueur :
    <input type="number" class="w-100" name="longueur" required max="9999"></label>
    <label>Quantité :
        <input type="number" class="w-100" name="quantite" required max="9999"></label>
    <label>Descripton :
        <input type="text" class="w-100" name="descripton" required maxlength ="200"></label>
    <label>Prix :
        <input type="number" class="w-100" name="prix" required max="999999"></label>
    <label>Photo :
        <input type="file" class="w-100" name="photo" required maxlength ="20"></label>
    <label>Active :
        <input type="number" class="w-100" name="active" required maxlength ="1" min="0" max="1"></label>

    <button type="submit" class="w-100">Valider</button>

</form>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>