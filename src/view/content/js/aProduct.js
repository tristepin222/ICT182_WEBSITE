



function incrementQuantity( id) {
    var quantity = document.getElementById(id).value;

    if (quantity <= 9) {
        quantity++;
    }

        document.getElementById(id).value = quantity;


    return document.getElementById(id).value;
}

function decrementQuantity(id) {
    var quantity = document.getElementById(id).value;



    if (quantity >= 2) {
            quantity--;
    }
    document.getElementById(id).value = quantity;


    return document.getElementById(id).value;
}

function loading(){

    var div = document.createElement("div");
    var parent = document.getElementById("parent");
    div.textContent = "loading element";
    parent.appendChild(div);
}