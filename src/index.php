
<?php

require "controler/controler.php";
if(isset($_GET['action'])){
$action = $_GET['action'];


switch ($action){
case 'home':
home();
break;
case 'login':
login($_POST);
break;
    case 'login2':
        login2($_POST);
        break;
case 'logout':
logout();
break;
case 'register':
register($_POST);
break;
case 'products':
products(@$_GET["type"],@$_GET["code"] );
break;
case 'error':
error();
break;
    case 'aProduct':
        aProduct($_GET["product"]);
        break;
    case 'detailledProduct':
        detailledProduct($_GET["product"]);
        break;
    case 'edit':
        edit($_GET["code"]);
        break;
    case 'addProduct':
        addProduct($_POST);
        break;
    case 'editProduct':
        editProduct($_POST);
        break;
    case 'addCart':
        addCart(@$_GET["product"], @$_GET['quantity'], @$_GET['delete']);
        break;
    case 'confirmOrder':
        confirmOrder(@$_SESSION["panier"]);
        break;
    case 'cart':
        cart();
        break;
    case 'clearCart':
        clearCart();
        break;
    case 'checkoutPaypal':
        checkoutPaypal();
        break;
    case 'finalizeOrder':
        finalizeOrder();
        break;
default:
home();

}

}else{

home();

}


?>
