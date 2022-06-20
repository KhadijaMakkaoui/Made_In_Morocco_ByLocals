var quantite_stock = document.getElementById('quantite_produit').innerHTML;
var quantite_choisie = document.getElementById('hide_quantite');

function increaseCount(a, b) {
    var input = b.previousElementSibling;
    var value = parseInt(input.innerText, 10);
    if (value < quantite_stock) {
        value = isNaN(value) ? 0 : value;
        value++;
        input.innerText = value;
        quantite_choisie.value = value;
    }
}

function decreaseCount(a, b) {
    var input = b.nextElementSibling;
    var value = parseInt(input.innerText, 10);
    if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value--;
        input.innerText = value;
        quantite_choisie.value = value;

    }
}