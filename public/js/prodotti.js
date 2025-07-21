const subMenButton=document.querySelector(".toggle-btn");
subMenButton.addEventListener("click",showSectionSubmenu);

function showSectionSubmenu(event) {
    event.preventDefault();
    const subMenu=document.querySelector(".submenu");
    const subMenuDisplay = subMenu.style.display;

    if(subMenuDisplay === "none" || subMenuDisplay === "")
    {
        subMenu.style.display="block";
        subMenButton.textContent="-";
    }
    else
    {
        subMenu.style.display="none";
        subMenButton.textContent="+";
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



// prendiamo la risposta del server e la convertiamo in oggetto javascript
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
