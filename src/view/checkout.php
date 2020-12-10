<?php

$titre = "ITSHOP - Checkout Paypal";

?>
<script src="https://www.paypal.com/sdk/js?client-id=AaghH19nEDbewTIAy_g3YOT41xzEB6kGdkWPx8BWsHqbU3YNTRvwH_y4gGoMDmJ6_nJlCcr-8_q7mL1O"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
</script>

    <div class="container"><div class="row"  >
            <div class="col-sm"></div>
            <div class="col-sm-10">
<div class="paypal_form" id="parent">
<div id="paypal-button-container"></div>
</div>
            </div>
            <div class="col-sm"></div>
    </div>
</div>
<!-- Add the checkout buttons, set up the order and approve the order -->
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?=$_SESSION["totalPrice"] ?>'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
            window.location.replace("http://52.14.153.123/index.php?action=finalizeOrder")
            });
        }
    }).render('#paypal-button-container'); // Display payment options on your web page
</script>
<?php

$contenu = ob_get_clean();
require 'gabarit.php';

?>
