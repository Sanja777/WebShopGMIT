// trigger when quantity of product is changed
function onQuantityChange(productID) {
    var price = document.getElementById("price" + productID).innerText;
    var elQuantity = document.getElementById("quantity" + productID);
    var elTotal = document.getElementById("total" + productID)
    var elOrderTotal = document.getElementById("orderTotal")
    // make sure the user enters only positive integer values
    quantity = Math.abs(Math.trunc(elQuantity.value));
    if (quantity != elQuantity.value) {
        // we need to fix the quantity value, this will trigger another changee event
        elQuantity.value = quantity;
        return;
    } else {
        // we don't need to fix the value 
        elTotal.innerText = parseFloat(quantity * price).toFixed(2);
    }
    // calculcate the order total
    // get the array of all the total label elements
    var orderTotal = 0;
    var arElTotal = document.querySelectorAll("label[id^='total']");
    for (var i = 0; i < arElTotal.length; i++) {
        var productTotal = parseFloat(arElTotal[i].innerText);
        if (productTotal > 0) {
            orderTotal += productTotal;
        }
    }
    elOrderTotal.innerText = parseFloat(orderTotal).toFixed(2);
    document.getElementById("OrderTotal").value = elOrderTotal.innerText;
}

// trigger when Purchase button is clicked
function onShowModal() {
    $('#loginModal').modal('show');

}

// executed when user clicks thesign in button
function onLogin() {
    var elUsername = document.getElementById("username");
    var elPassword = document.getElementById("password");
    var elError = document.getElementById("error");
    elError.innerHTML = "";
    // validate if username is missing
    if (elUsername.value == "") {
        elError.innerHTML += "Missing username<br>";
    } 
    // validate email format
    else if( !isValidEmail(elUsername.value) ){
        elError.innerHTML += "Email is not in correct format<br>";
    }
    // validate if password is missing
    if (elPassword.value == "") {
        elError.innerHTML += "Missing password<br>";
    }
    if (elError.innerHTML.length == 0) {
        // validate username and password - hardcoded
        if (elUsername.value != "user@gmit.com" || elPassword.value != "pass") {
            elError.innerHTML = "Wrong username or password<br>"
        } 
    }
    var isValid = elError.innerHTML.length == 0;
    elError.style.display = isValid ? "none" : ""
    if (isValid) {
        // submit form
        document.getElementById("orderForm").submit();
    }
    return elError.innerHTML.length == 0;
}

// utility function to validate email address
function isValidEmail(email) {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
}