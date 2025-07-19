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

    if(value.length == 0) {
        alert("Il campo non può essere vuoto");
        return;
    }
    else {
        fetch("/newsletter/subscribe", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // ← CORRETTO
            },
            body: JSON.stringify({
                email: value
            })
        }).then(onResponseNewsletter)
        .then(onJsonNewsletter);
    }
}

// FUNZIONI SEMPLICI PER RESET PASSWORD
function openResetModal() {
    document.getElementById('resetModal').style.display = 'block';
    document.getElementById('step1').style.display = 'block';
    document.getElementById('step2').style.display = 'none';
    document.getElementById('resetMessage').innerHTML = '';
}

function closeResetModal() {
    document.getElementById('resetModal').style.display = 'none';
}

function sendCode() {
    const email = document.getElementById('resetEmail').value;

    if (!email) {
        document.getElementById('resetMessage').innerHTML = '<div style="color:red;">Inserisci email</div>';
        return;
    }

    // Validazione formato email
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/;

    if (!emailRegex.test(email)) {
        document.getElementById('resetMessage').innerHTML = '<div style="color:red;">Email non valida</div>';
        return;
    }


    // Pulisci eventuali messaggi precedenti
    document.getElementById('resetMessage').innerHTML = '';

    // Mostra "Invio..." solo quando effettivamente inviamo
    document.getElementById('resetMessage').innerHTML = '<div style="color:blue;">Invio...</div>';

    fetch('/send-reset-code', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ email: email })
    }).then(onResponsePassword).then(onJsonPassword);
}function resetPassword() {
    const email = document.getElementById('resetEmail').value;
    const code = document.getElementById('resetCode').value;
    const password = document.getElementById('newPassword').value;

    if (!code || !password) {
        document.getElementById('resetMessage').innerHTML = '<div style="color:red;">Compila campi</div>';
        return;
    }

    // Pulisci eventuali messaggi precedenti
    document.getElementById('resetMessage').innerHTML = '';

    // Mostra "Aggiorno..." solo quando effettivamente inviamo
    document.getElementById('resetMessage').innerHTML = '<div style="color:blue;">Aggiorno...</div>';

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
    if (json.success) {
        document.getElementById('resetMessage').innerHTML = '<div style="color:green;">' + json.success + '</div>';

        if (json.success === 'Codice inviato!') {
            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'block';
        }

        if (json.success === 'Password aggiornata!') {
            setTimeout(() => {
                closeResetModal();
            }, 2000);
        }
    } else {
        document.getElementById('resetMessage').innerHTML = '<div style="color:red;">' + json.error + '</div>';
    }
}
