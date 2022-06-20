var quantite_stock = document.getElementById('quantite_produit').innerHTML;
// alert(quantite_stock);

function increaseCount(a, b) {
    var input = b.previousElementSibling;
    var value = parseInt(input.innerText, 10);
    if (value < quantite_stock) {
        value = isNaN(value) ? 0 : value;
        value++;
        input.innerText = value;
    }
}

function decreaseCount(a, b) {
    var input = b.nextElementSibling;
    var value = parseInt(input.innerText, 10);
    if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value--;
        input.innerText = value;
    }
}