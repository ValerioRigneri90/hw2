function mostraImmagini() {
const miniature = document.querySelectorAll('.thumbnail');

for (let item of miniature)
{
    item.addEventListener("click", cambiaImmagine);
}


}

document.addEventListener("DOMContentLoaded", mostraImmagini);

function cambiaImmagine(event) {
const mainImage = document.querySelector('.main-image img');
const miniature = document.querySelectorAll('.thumbnail');
const clickedImg = this.querySelector("img");
if (clickedImg)
{
    mainImage.src = clickedImg.src;

}

for(let item of miniature)
{
    item.classList.remove("active");
}

this.classList.add("active");
}

function onResponse(response) {
    if (!response.ok) {
        console.error('Errore nella risposta del server: ' + response.status);
        return { success: false, message: 'Errore nella risposta del server: ' + response.status };
    }
    return response.json();
}

function onJson(data) {
    if (data.success) {
        alert('Prodotto aggiunto al carrello!');
        const button = document.querySelector('.add-to-cart-btn');
        button.style.backgroundColor = '#27ae60';
        button.textContent = 'Aggiunto!';
        setTimeout(function() {
            button.style.backgroundColor = '';
            button.textContent = 'Aggiungi al carrello';
        }, 2000);
    } else {
        alert('Errore: ' + (data.message || 'Errore sconosciuto'));
    }
}

function onError(error) {
    console.error('Fetch error:', error);
    alert('Errore durante aggiunta al carrello: ' + error.message);
}

function aggiungiAlCarrello() {
    // Controlla se l'utente è loggato prima di tutto
    if (!window.flag) {
        alert("Devi essere loggato per aggiungere prodotti al carrello");
        return;
    }

    const quantita = document.querySelector('#quantity').value;
    const prodottoId = document.querySelector('.add-to-cart-btn').dataset.productId;

    if (!prodottoId) {
        alert('Errore: ID prodotto non trovato');
        return;
    }

    const formData = new FormData();
    formData.append('azione', 'aggiungi');
    formData.append('prodotto_id', prodottoId);
    formData.append('quantita', quantita);
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    fetch('/cart/action', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(onResponse)
    .then(onJson);
}

function inizializza() {
    mostraImmagini();

    const button = document.querySelector('.add-to-cart-btn');
    if (button) {
        button.addEventListener('click', aggiungiAlCarrello);
    }


}


window.onload = inizializza;





function ricercaElemento(event)
{
    const inputRicerca=formRicerca.search.value;


    if(inputRicerca.trim().length===0)
    {
        alert("Il campo di ricerca non può essere vuoto");
        event.preventDefault(); // blocco l'invio del form
        return;
    }



}



function ricercaElemento(event)
{
    const inputRicerca=formRicerca.search.value;


    if(inputRicerca.trim().length===0)
    {
        alert("Il campo di ricerca non può essere vuoto");
        event.preventDefault(); // blocco l'invio del form
        return;
    }



}




const formRicerca=document.forms["ricerca-form"];

formRicerca.addEventListener("submit",ricercaElemento);


// Blocco accesso carrello se non loggato
const cartLink = document.querySelector(".cart-link");

    cartLink.addEventListener("click", bloccaCarrello);


function bloccaCarrello(event) {
    if (!window.flag) {
        event.preventDefault();
        alert("Devi essere loggato per accedere al carrello");
        window.location.href = window.loginUrl;
        return;
    }
}







function onJsonNewsletter(json)
{

    if(!json.flag && json.error==="non_loggato")
    {
        alert(json.message);
        const temp = document.querySelector("#footer-input");
        temp.value = ""; // pulisco il campo di input
        window.location.href=window.loginUrl;
        return;
    }

    if(!json.flag && json.error==="iscritto")
    {
        alert(json.message);
        const temp = document.querySelector("#footer-input");
        temp.value = ""; // pulisco il campo di input
        return;
    }


    if(json.flag && json.success=="iscrizione_corretta")
    {
        alert(json.message);
        const temp = document.querySelector("#footer-input");
        temp.value = ""; // pulisco il campo di input
        return;
    }

    if(!json.flag && json.error==="email_non_valida")
    {
        alert(json.message);
        const temp = document.querySelector("#footer-input");
        temp.value = ""; // pulisco il campo di input
        return;
    }
}



// prendiamo la risposta del server e laconvertiamo in oggetto javascript
function onResponseNewsletter(response) {
    return response.json();
}



const butttonFooter=document.querySelector("#footer-button");
butttonFooter.addEventListener("click",bloccaButtonFooter);


function bloccaButtonFooter(event) {
    event.preventDefault();

    const temp = document.querySelector("#footer-input");
    const value = temp.value.trim();

    if(value.length == 0)
        {
        alert("Il campo non può essere vuoto");
        return;
    }
    else
    {

            fetch("/newsletter/subscribe",{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ // convertiamo l'oggetto in una stringa JSON
                    email: value
                })
            }).then(onResponseNewsletter)
            .then(onJsonNewsletter);
    }
}
