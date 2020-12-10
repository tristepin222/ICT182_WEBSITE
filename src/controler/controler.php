<?php
/**
 * @Author   : nicolas.glassey@cpnv.ch
 * @Project  : 151_2019_ForStudents
 * @Created  : 05.02.2019 - 18:40
 *
 * @Last update :    [11.11.2020 @author]
 *
 * @Git source  :    [https://github.com/ArthurBourgue/Projet_WebBDD_ITSHOP]
 */


session_start();

require  "model/model.php";



/**
 * @brief function for home
 */
function home()
{
    $_GET['action'] = "home";
    require "view/home.php";
}

/**
 * @brief  function in case of an error
 */
function error()
{

    $_GET['action'] = "error";
    require "view/error.php";
}

/**
 * @brief function to log in
 * @param array : An array with the password and the username of the user
 */
function login($in)
{
    $bool = 0;
    $password = @$in['password'];
    $username = @$in['login'];
    if(isset($password) && isset($username)) {
        $checkedpassword = checkPassword($username, $password);
    }
    if (!$password) {

        $_GET['action'] = "login";
        require "view/login.php";
    } else {

        if ($checkedpassword >= 1) {
            if($checkedpassword == 2){
                $_POST['vendor'] = 1;

            }else{

                $_POST['vendor'] = 0;

            }
            $bool = 1;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            $_SESSION['vendor'] = $_POST['vendor'];
            $_GET['action'] = "home";
            require "view/home.php";
        } else {
            $_SESSION['message'] = "erreur lors de la connection";
            $_GET['action'] = "login";
            require "view/login.php";
            $bool = 0;
        }

    }
}
function login2($in)
{
    $bool = 0;
    $password = @$in['password'];
    $username = @$in['login'];
    if(isset($password) && isset($username)) {
        $checkedpassword = checkPassword2($username, $password);
    }
    if (!$password) {

        $_GET['action'] = "login2";
        require "view/login2.php";
    } else {

        if ($checkedpassword >= 1) {
            if($checkedpassword == 2){
                $_POST['vendor'] = 1;

            }else{

                $_POST['vendor'] = 0;

            }
            $bool = 1;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            $_SESSION['vendor'] = $_POST['vendor'];
            $_GET['action'] = "home";
            require "view/home.php";
        } else {
            $_SESSION['message'] = "erreur lors de la connection";
            $_GET['action'] = "login2";
            require "view/login2.php";
            $bool = 0;
        }

    }
}

/**
 * @brief function to register
 * @param  array : An array with the password, the repeated password and the username of the user
 */
function register($in){
    if(isset($in['passwordregister'])) {
        $password = $in['passwordregister'];
        $username = $in['usernameregister'];
        $repeatpassword = $in['repeatpasswordregister'];

        if (isset($password) && isset($username)) {
            if($repeatpassword == $password) {
                $result = checkEmail($username);
            } else{
                $_SESSION['message2'] ="Erreur lors de registration de se compte";
                $_GET['action']="register";
                require "view/register.php";
            }
        }
    }

    if(!@$password && @$repeatpassword == @$password)
    {
        $_GET['action']="register";
        require "view/register.php";
    }

    if(isset($result)) {
        if ($result == TRUE) {
            $_SESSION['message2'] ="Erreur lors de registration de se compte";
            $_GET['action']="register";
            require "view/register.php";
        } else {
            if (isset($password)) {

                createUser($username, $password);

                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;

                $_GET['action'] = "home";
                require "view/home.php";
            }
        }
    }
}


/**
 * $brief function to display products or delete
 * @param string : it'll delete or display, depending on what the string is
 * @param int : the product's database's code
 */
function products($type, $code){

    if(isset($code) && isset($type)){


        if($type == "delete") {
            require_once "model/ProductsManagement.php";
            $snows = getProducts();
            foreach($snows as  $value) {



                if($code["codeAdd"] == $value["code"]){
                    if($value["active"] == 1){
                        $_GET['action'] = "products";
                        require "view/products.php";

                    }else{
                        require_once "model/ProductsManagement.php";
                        deleteSnow($code);
                    }
                }
            }


        }
    }

    require_once "model/ProductsManagement.php";
    $Products = getProducts();
    $_POST["products"] = $Products;
    $_GET['action'] = "products";
    require "view/products.php";

}

/**
 * @brief  function to display a product, change or delete
 * @param int : the product's database's code
 */
function aProduct($code){


    require_once "model/ProductsManagement.php";
    $product = getAProduct($code);
    $_GET["action"] = "aProduct";
    require "view/aProduct.php";


}

/**
 * @brief show detailled product
 * @param int : the product's database's code
 */
function detailledProduct($code){
    require_once "model/ProductsManagement.php";
    $product = getAProduct($code);
    $_GET["action"] = "detailledProduct";
    require "view/detailledProduct.php";
}

/**
 * @brief function to display the cart
 */
function cart(){
    $_GET["action"] = "cart";
    require "view/panier.php";
}

/**
 * @brief function to add products to the cart
 * @param int : the product's database's code
 * @param int : the product's database's quantity
 * @param bool : it'll delete the product if set to true
 */
function addCart($code, $quantity, $delete){
    $_SESSION["totalPrice"] = 0;
    $found = false;
    require_once "model/ProductsManagement.php";
    $_POST['quantity'] = $quantity;
    if($code != 0) {
        if (!isset($_SESSION['panier'])) {
            $arr = getAProduct($code);
            array_push($arr,$quantity );
            $_SESSION['panier'] = array($arr);
        } else {
            $arr = getAProduct($code);


            array_push($arr,$quantity );

            foreach ($_SESSION['panier'] as $key2=>$elements){

                if($elements[0][0] == $code){


                    $found = true;


                    break;
                }else{
                    $found = false;

                }

            }

            if($found){

                if($delete) {
                    unset($_SESSION['panier'][$key2]);

                }else {
                    if ($_SESSION['panier'][$key2][1] <= 0) {
                        $_SESSION['panier'][$key2][1] = 1;
                    } else {
                        $_SESSION['panier'][$key2][1] += $quantity;
                        if ($_SESSION['panier'][$key2][1] == 0) {
                            $_SESSION['panier'][$key2][1] = 1;
                        }

                    }
                }
            }else{
                array_push($_SESSION['panier'], $arr);
            }
            header("http://52.14.153.123/index.php?action=cart");
        }

        $_GET["action"] = "panier";
        require "view/panier.php";

    }else {


        $_GET["action"] = "panier";
        require "view/panier.php";
    }


}


/**
 * @brief function to edit products
 * @param int : the product's database's code
 */
function edit($code){
    if(isset($_SESSION['vendor'])) {
        require_once "model/ProductsManagement.php";
        $snows = getSnows();
        $_POST["snows"] = $snows;

        $_GET["action"] = "edit";
        require "view/edit.php";
    }else{
        $_GET["action"] = "home";
        require "view/home.php";
    }
}

/**
 * @brief function to edit products
 * @param int : the product's database's code
 */
function editProduct($in){


    if(isset($_SESSION['vendor'])) {

        $_GET["action"] = "editSnow";
        require_once "model/ProductsManagement.php";
        editASnow($in);

        $_GET["action"] = "home";
        require "view/home.php";
    }else{
        $_GET["action"] = "home";
        require "view/home.php";
    }
}

/**
 * @brief function to edit products
 * @param array : the product's informations when adding a new product
 */
function addProduct($in){
    if(isset($_SESSION['vendor'])) {
        require_once "model/ProductsManagement.php";
        $snows  = getSnows();

        if(isset($in["codeAdd"])){
            foreach($snows as  $value) {



                if($in["codeAdd"] == $value["code"]){

                    $something = true;
                    $_GET["action"] = "home";
                    require "view/home.php";
                }else{

                    $something = false;

                }
            }




        }else {

            require_once "model/ProductsManagement.php";
            addSnowModel($in);
            $_GET["action"] = "addProduct";
            require "view/addProduct.php";
        }

    }
    else {

        $_GET["action"] = "home";
        require "view/home.php";
    }
}

/**
 * @brief clear cart and redirt to the cart page
 */
function clearCart(){
    unset($_SESSION['panier']);
    $_SESSION["cartSize"] = 0;
    $_GET["action"] = "addCart";
    require "view/panier.php";
}

/**
 * @brief function to confirm order
 * @param array : the product's informations when adding a new product
 */
function confirmOrder($in){
    $is_stock_empty = true;
    $has_error = false;
    if(isset($in)) {
        foreach ($in as $key=>$elements) {
            require_once "model/ProductsManagement.php";
            $product = getAProduct($elements[0][0]);

            if ($product[0][6] < $elements[1]) {
                if($product[0][6] != 0){
                    $_SESSION['panier'][$key][1] = $product[0][6];

                }else{
                    $_SESSION['panier'][$key][1] = 1;
                }

                $is_stock_empty = true;
                $has_error = true;
                $_SESSION['empty']  = true;
            }else {

                    $product[0][6] = $product[0][6] - $elements[1];
                    require_once "model/ProductsManagement.php";
                    if (!$has_error) {
                        checkout($product);
                    }
                    $_SESSION['paid'] = false;
                    $is_stock_empty = false;

            }


            $_SESSION['panier'][$key][2] = $is_stock_empty;


        }
    }
    if(!$has_error) {

            checkoutPaypal();



    }else{

        $_GET["action"] = "cart";
        require "view/panier.php";
    }

}

/**
 * @brief call the page with the paypal checkout
 */
function checkoutPaypal(){
    $_GET["action"] = "checkoutPaypal";
    require "view/checkout.php";
}

/**
 * @brief once the checkout is done, emtpy cart and redirt to the confirmOrderMessage page
 */
function finalizeOrder(){
    unset($_SESSION['panier']);
    unset($_SESSION["empty"]);
    $_SESSION["cartSize"] = 0;
    $_GET["action"] = "confirmOrderMessage";
    require "view/confirmOrderMessage.php";
}

/**
 * @brief function to logout
 */
function logout(){

    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['vendor']);
    unset($_SESSION['code']);
    unset($_SESSION['panier']);
    unset($_SESSION["cartSize"]);
    unset($_SESSION["totalPrice"]);
    unset($_SESSION["empty"]);
    session_destroy();

    $_GET['action'] = "home";
    require "view/home.php";

}
?>
