const subMenButton=document.querySelector(".toggle-btn");
subMenButton.addEventListener("click",showSectionSubmenu);

function showSectionSubmenu(event) {
    event.preventDefault();
    const subMenu=document.querySelector(".submenu");
    const subMenuDisplay=window.getComputedStyle(subMenu).display;

    if(subMenuDisplay=="none")
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


function checkForm(event)
{

    const inputEmail=document.querySelector("#email");
    const inputUsername=document.querySelector("#username");
    const inputPassword=document.querySelector("#password");
    const inputConfirmPassword=document.querySelector("#conferma_password");


    if(inputEmail.value.trim().length===0||inputUsername.value.trim().length===0||
       inputPassword.value.trim().length===0||inputConfirmPassword.value.trim().length===0)
    {
        alert("Tutti i campi sono obbligatori");
        event.preventDefault(); // blocco l'invio del form
        return;
    }


    const errorSpans=document.querySelectorAll('span[style*="display: block"]'); /* seleziono
    tutti gli span che sono visibili */

    if(errorSpans.length > 0) /* se ci sono errori */
    {
        alert("Ci sono errori nel form, correggili prima di inviare");
        event.preventDefault(); // blocco l'invio del form
        return;
    }


}


const form=document.forms['form-register'];

form.addEventListener("submit",checkForm); /* invece di usare submit,uso il blur per evitare che il form venga inviato se ci sono errori */

/* l'evento blur consiste praticamente nel fatto che ad esempio quando l'utente finisce di scrivere
l'email e esce dal campo email, viene attivato l'evento blur e quindi viene chiamata la funzione checkEmail() */

function onResponseEmail(response) {
    return response.json();
}

function onJsonEmail(data) {
    const input = document.querySelector("#email");
    const errorSpan = input.nextElementSibling;

    if(data.error) {
        console.error("Errore dal server:", data.error);
        errorSpan.textContent="Errore durante la verifica dell'email";
        errorSpan.style.display="block";
    }
    else if(data.flag) {
        errorSpan.textContent=data.message;
        errorSpan.style.display="block";
    }
    else {
        errorSpan.style.display="none";
    }
}

function checkEmail() {
    const input=document.querySelector("#email");
    const errorSpan=input.nextElementSibling;
    const inputEmail=input.value.trim();

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/;

    if(!emailRegex.test(inputEmail)) {
        errorSpan.textContent="L'email non rispetta un formato valido";
        errorSpan.style.display="block";
        return;
    }
    else {
        errorSpan.style.display="none";
    }

    fetch("/api/check_email?email="+encodeURIComponent(inputEmail))
        .then(onResponseEmail)
        .then(onJsonEmail)
        .catch(error => {
            console.error("Errore durante la verifica dell'email:", error);
            errorSpan.textContent="Errore durante la verifica dell'email";
            errorSpan.style.display="block";
        });
}

document.querySelector("#email").addEventListener("blur", checkEmail); /* controllo l'email quando l'utente esce dal campo email */


function onResponseUsername(response) {
    return response.json();
}

function onJsonUsername(data) {
    const input = document.querySelector("#username");
    const errorSpan = input.nextElementSibling;

    if(data.error) {
        errorSpan.textContent=data.error;
        errorSpan.style.display="block";
    }
    else if(data.flag) {
        errorSpan.textContent=data.message;
        errorSpan.style.display="block";
    }
    else {
        errorSpan.style.display="none";
    }
}

function checkUsername() {
    const input=document.querySelector("#username");
    const errorSpan=input.nextElementSibling;
    const inputUsername=input.value.trim();

    if(inputUsername.length <4) {
        errorSpan.textContent="Il nome utente deve essere lungo almeno 4 caratteri";
        errorSpan.style.display="block";
        return;
    }
    else {
        errorSpan.style.display="none";
    }

    if(/[\W_]/.test(inputUsername)) {
        errorSpan.textContent="Il nome utente non può contenere caratteri speciali";
        errorSpan.style.display="block";
        return;
    }
    else {
        errorSpan.style.display="none";
    }

    fetch("/api/check_username?username="+encodeURIComponent(inputUsername))
        .then(onResponseUsername)
        .then(onJsonUsername)
        .catch(error => {
            console.error("Errore durante la verifica del nome utente:", error);
            errorSpan.textContent="Errore durante la verifica del nome utente";
            errorSpan.style.display="block";
        });
}

document.querySelector("#username").addEventListener("blur", checkUsername); /* controllo il nome utente quando l'utente esce dal campo username */


function checkPassword()
{
    const input=document.querySelector("#password");
    const errorSpan=input.nextElementSibling;/* serve a selezionare lo span che segue l'input */
    const inputPassword=input.value.trim(); /* rimuovo gli spazi iniziali e finali dela stringa */

    if(inputPassword.length<8)
    {
        errorSpan.textContent="La password deve essere lunga almeno 8 caratteri";
        errorSpan.style.display="block";
        return;
    }
    else
    {
        errorSpan.style.display="none"; // nascondo lo span di errore
    }



    if(!/[A-Z]/.test(inputPassword))
    {
        errorSpan.textContent="La password deve contenere almeno una lettera maiuscola";
        errorSpan.style.display="block";
        return;
    }

    if(!/[a-z]/.test(inputPassword))
    {
        errorSpan.textContent="La password deve contenere almeno una lettera minuscola";
        errorSpan.style.display="block";
        return;
    }

    if(!/[0-9]/.test(inputPassword))
    {
        errorSpan.textContent="La password deve contenere almeno un numero";
        errorSpan.style.display="block";
        return;
    }

    if(!/[\W_]/.test(inputPassword))
    {
        errorSpan.textContent="La password deve contenere almeno un carattere speciale";
        errorSpan.style.display="block";
        return;
    }

    errorSpan.style.display="none"; // nascondo lo span di errore


}

document.querySelector("#password").addEventListener("blur", checkPassword); /* controllo la password quando l'utente esce dal campo password */

function checkConfirmPassword()
{
    const input=document.querySelector("#conferma_password");
    const errorSpan=input.nextElementSibling;/* serve a selezionare lo span che segue l'input */
    const inputConfirmPassword=input.value.trim(); /* rimuovo gli spazi iniziali e finali dela stringa */

    const passWordInput=document.querySelector("#password");
    const inputPassword=passWordInput.value.trim(); /* rimuovo gli spazi iniziali e finali dela stringa */

    if(inputConfirmPassword !== inputPassword)
    {
        errorSpan.textContent="Le password non corrispondono";
        errorSpan.style.display="block";
        return;
    }
    else{
        errorSpan.style.display="none"; // nascondo lo span di errore
    }
}


document.querySelector("#conferma_password").addEventListener("blur", checkConfirmPassword); /* controllo la conferma della password quando l'utente esce dal campo conferma password */




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



// Blocco accesso carrello in registrazione
const cartLink = document.querySelector(".cart-link");

    cartLink.addEventListener("click", bloccaCarrello);


function bloccaCarrello(event) {
    if (!window.flag) {
        event.preventDefault();
        alert("Devi essere loggato per accedere al carrello");
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
