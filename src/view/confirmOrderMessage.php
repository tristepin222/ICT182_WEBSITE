<?php

$titre = "ITSHOP - Message de confirmation";
?>

<div style="text-align: center; margin-top: 300px; color: black; font-size: 35px">Merci pour votre commande.</div>
<div style="text-align: center;color: black; font-size: 20px">Votre commande a bien été pris en compte</div>
<div style="text-align: center; margin-top: 10px; color: #8d8d8d; font-size: 20px">Vous allez être redirigé à la page d'accueil dans <span id="counter">5</span> secondes.</div>

<script type="text/javascript">
    function countdown() {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML)<=1) {
            location.href = 'index.php?action=home';
        }
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
    setInterval(function(){ countdown(); },1000);
</script>

<?php

$contenu = ob_get_clean();
require 'gabarit.php';

?>
