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


function checkForm(event)
{

    const inputEmail=document.querySelector("#email");
    const inputPassword=document.querySelector("#password");


    if(inputEmail.value.trim().length===0||inputPassword.value.trim().length==0)
    {
        alert("Tutti i campi sono obbligatori");
        event.preventDefault(); // blocco l'invio del form
        return;
    }


}



const form=document.forms["form-login"];
form.addEventListener("submit",checkForm);



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


// prendiamo la risposta del server e laconvertiamo in formato json
function onResponseNewsletter(response) {
    return response.json();
}



const newsletterForm = document.querySelector(".newsletter-container form");
newsletterForm.addEventListener("submit", bloccaButtonFooter);

function bloccaButtonFooter(event) {
    event.preventDefault();

    const temp = document.querySelector("#footer-input");
    const value = temp.value.trim();

    if(value.length == 0) {
        alert("Il campo non può essere vuoto");
        return;
    }
    else {
        fetch("/newsletter/subscribe", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                email: value
            })
        }).then(onResponseNewsletter)
        .then(onJsonNewsletter);
    }
}




buttonClose=document.querySelector(".btn.btn-secondary");
buttonClose.addEventListener("click", closeResetModal);

function closeResetModal() {
    document.querySelector('#resetModal').style.display = 'none';
}




function openResetModal() {
    document.querySelector('#resetModal').style.display = 'block';
    document.querySelector('#step1').style.display = 'block';
    document.querySelector('#step2').style.display = 'none';


    const resetMessage = document.querySelector('#resetMessage');
    resetMessage.textContent = '';
}




    const buttonSendCode = document.querySelector('.btn.btn-primary');
    buttonSendCode.addEventListener('click', sendCode);

function sendCode() {
    const email = document.querySelector('#resetEmail').value;

    if (!email) {
        const resetMessage = document.querySelector('#resetMessage');
        resetMessage.textContent = 'Inserisci email';
        resetMessage.style.color = 'red';
        return;
    }

    // Validazione formato email
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/;

    if (!emailRegex.test(email)) {
        const resetMessage = document.querySelector('#resetMessage');
        resetMessage.textContent = 'Email non valida';
        resetMessage.style.color = 'red';
        return;
    }

    // Pulisci eventuali messaggi precedenti
    const resetMessage = document.querySelector('#resetMessage');
    resetMessage.textContent = '';

    // Mostra "Invio..." solo quando effettivamente inviamo
    resetMessage.textContent = 'Invio...';
    resetMessage.style.color = 'blue';

    fetch('/send-reset-code', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ email: email })
    }).then(onResponsePassword).then(onJsonPassword);

}


const buttonResetPassword=document.querySelector('.btn.btn-success');
buttonResetPassword.addEventListener('click', resetPassword);

function resetPassword() {
    const email = document.querySelector('#resetEmail').value;
    const code = document.querySelector('#resetCode').value;
    const password = document.querySelector('#newPassword').value;

    if (!code || !password) {
        const resetMessage = document.querySelector('#resetMessage');
        resetMessage.textContent = 'Compila campi';
        resetMessage.style.color = 'red';
        return;
    }


    // Pulisci eventuali messaggi precedenti
    const resetMessage = document.querySelector('#resetMessage');
    resetMessage.textContent = '';


    // Mostra "Aggiorno..." solo quando effettivamente inviamo
    resetMessage.textContent = 'Aggiorno...';
    resetMessage.style.color = 'blue';

    fetch('/reset-password', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            email: email,
            code: code,
            password: password
        })
    }).then(onResponsePassword).then(onJsonPassword);
}




function onResponsePassword(response) {
    return response.json();
}

function onJsonPassword(json) {
    const resetMessage = document.querySelector('#resetMessage');

    if (json.success) {
        resetMessage.textContent = json.success;
        resetMessage.style.color = 'green';

        if (json.success === 'Codice inviato!') {
            document.querySelector('#step1').style.display = 'none';
            document.querySelector('#step2').style.display = 'block';
        }

        if (json.success === 'Password aggiornata!') {
            setTimeout(() => {
                closeResetModal();
            }, 2000);
        }
    } else {
        resetMessage.textContent = json.error;
        resetMessage.style.color = 'red';
    }
}
