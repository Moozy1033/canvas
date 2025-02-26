function cardContinue(){
    const cardHolder = document.getElementById("cardholder")
    const cardNumber = document.getElementById("cardnumber")
    const expiry = document.getElementById("expiry")
    const cvv = document.getElementById("cvv")
    const zip = document.getElementById('zipcode')

    if(cardHolder.value == "" || cardNumber.value == "" || expiry.value == "" || cvv.value == "" ||zip.value == ""){
        document.getElementById("cardError").style.display = "block"
        document.getElementById("cardnumberError").style.display = "block"
        document.getElementById("expiryError").style.display = "block"
        document.getElementById("cvvError").style.display = "block"
        document.getElementById("zipError")
    }else{
        document.getElementById("cardError").style.display = "none"
        document.getElementById("cardnumberError").style.display = "none"
        document.getElementById("expiryError").style.display = "none"
        document.getElementById("cvvError").style.display = "none"
    }
}