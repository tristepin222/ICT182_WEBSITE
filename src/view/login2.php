<?php
/**
 * Created by PhpStorm
 * Project's name :
 * Use :
 * User : Jessy.BORCARD
 * Date : 06.01.2020
 * Time : 09:18
 *
 *
 */

ob_start();
$titre = "ITSHOP - login2";


?>
    <body>
    <form method="post" action="index.php?action=login">

        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="login_register_form">
                    <h1 class="text-center">Login sans hash</h1>
                    <hr>
                    <div class="form-group logReg_center">
                        <label class="text-left logReg_text">Username :</label><br>
                        <input class="LogReg_input_text" type="email" name="login" required><br>
                    </div>
                    <div class="form-group logReg_center">
                        <label class="text-left logReg_text">password :</label><br>
                        <input class="LogReg_input_text" type="password" name="password" required><br>
                    </div>
                    <div class="form-group text-center">
                        <input type="checkbox" name="bool" hidden="">
                        <input type="submit" class="btn btn-info border" value="se connecter"> <input type="reset" class="btn btn-danger border" value="vider les champs">
                    </div>
                    <p style="color: red" class="text-center">
                        <?php if (isset($_SESSION['message'])):
                            echo $_SESSION['message'];
                            unset ($_SESSION['message']);
                        endif; ?>
                    </p>
                    <div class="text-center">
                        <a class="create-account" href="index.php?action=register">Créer un compte</a>
                    </div>
                </div>


                <div class="col-sm">
                </div>


            </div>
        </div>
    </form>
    </body>
    <a href="index.php?action=login">login avec hash</a>
<?php
$contenu = ob_get_clean();

require "gabarit.php";

?>
<?php
