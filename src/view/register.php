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
$titre = "ITSHOP - register";


?>
    <body>
    <form method="post" action="index.php?action=register">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="login_register_form">
                    <h1 class="text-center">Register</h1>
                    <hr>
                    <div class="form-group logReg_center">
                        <label class="text-left logReg_text">Username :</label><br>
                        <input class="LogReg_input_text" type="email" name="usernameregister" required><br>
                    </div>
                    <div class="form-group logReg_center">
                        <label class="text-left logReg_text">password :</label><br>
                        <input class="LogReg_input_text" type="password" name="passwordregister" required><br>
                    </div>
                    <div class="form-group text-center">
                        <label class="text-left logReg_text">repeat password :</label><br>
                        <input class="LogReg_input_text" type="password" name="repeatpasswordregister" required><br>
                    </div><br>
                    <div class="form-group text-center">
                        <input type="checkbox" name="bool" hidden="">
                        <input type="submit" class="btn btn-info border" value="créer un compte">
                        <input type="reset" class="btn btn-danger border" value="vider les champs">
                    </div>
                    <p style="color: red" class="text-center">
                        <?php if (isset($_SESSION['message2'])):
                            echo $_SESSION['message2'];
                            unset ($_SESSION['message2']);
                        endif; ?>
                    </p>
                    <div class="text-center">
                        <a class="create-account" href="index.php?action=login">Déjà un compte ?</a>
                    </div>
                </div>
                <div class="col-sm">
                </div>


            </div>

        </div>
    </form>
    </body>


<?php
$contenu = ob_get_clean();

require "gabarit.php";

?>
