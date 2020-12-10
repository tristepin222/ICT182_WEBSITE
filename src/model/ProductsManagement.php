<?php
/**
 * Created by PhpStorm
 * Project's name :
 * Use :
 * User : Jessy.BORCARD
 * Date : 26.02.2020
 * Time : 14:15
 *
 *
 */


function getProducts(){



    $query = 'SELECT id, code, brand, model, productSize, dailyPrice, qtyAvailable, photo, active, detailedDescription from products';
    require_once "dbConnector.php";
    $queryResult = executeQuery($query);
    return $queryResult;
}

function getAProduct($code){


    $query = "SELECT id, code, brand, model, productSize, dailyPrice, qtyAvailable, description, photo, detailedDescription from products where  id = {$code}";

    require_once "dbConnector.php";
    $queryResult = executeQuery($query);
    return $queryResult;


}


function addProductsModel($in){

    $photo = "view/content/images/" . substr($in["photo"], 0, 4) . ".jpg";

    $query = "INSERT INTO `snows` ( `code`, `brand`, `model`, `snowLength`, `qtyAvailable`, `description`, `dailyPrice`, `photo`, `active`) VALUES
	( '{$in["codeAdd"]}', '{$in["marque"]}', '{$in["model"]}', {$in["longueur"]}, {$in["quantite"]}, '{$in["descripton"]}', {$in["prix"]}, '{$photo}', {$in["active"]})";

    require_once "dbConnector.php";
    executeQuery($query);
}

function editASnow($in){

    $query = "UPDATE snows SET code =  '{$in["code"]}', brand =  '{$in["marque"]}', model = '{$in["model"]}', snowLength = {$in["longueur"]}, qtyAvailable = {$in["quantite"]}, description = '{$in["description"]}', dailyPrice =  {$in["prix"]} WHERE id = {$in["id"]} ";


    require_once "dbConnector.php";
    executeQuery($query);


}

function checkout($in){
    $query = "UPDATE products SET  qtyAvailable = {$in[0][6]} WHERE id = {$in[0][0]} ";
    require_once "dbConnector.php";
    executeQuery($query);

}
?>